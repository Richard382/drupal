<?php

namespace Drupal\lang_dropdown\Form;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Component\Utility\Html;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Language\Language;
use Drupal\Core\Url;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Language Switch Form.
 */
class LanguageDropdownForm extends FormBase {

  protected $languages;
  protected $type;
  protected $settings;

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The request object.
   *
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * The path matcher.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * The route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'lang_dropdown_form';
  }

  /**
   * Constructs a \Drupal\lang_dropdown\Form\LanguageDropdownForm object.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Symfony\Component\HttpFoundation\RequestStack $request_stack
   *   The request stack object.
   * @param \Drupal\Core\Path\PathMatcherInterface $path_matcher
   *   The path matcher service.
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   */
  public function __construct(LanguageManagerInterface $language_manager, RequestStack $request_stack, PathMatcherInterface $path_matcher, RouteMatchInterface $route_match, ModuleHandlerInterface $module_handler) {
    $this->languageManager = $language_manager;
    $this->requestStack = $request_stack;
    $this->pathMatcher = $path_matcher;
    $this->routeMatch = $route_match;
    $this->moduleHandler = $module_handler;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('language_manager'),
      $container->get('request_stack'),
      $container->get('path.matcher'),
      $container->get('current_route_match'),
      $container->get('module_handler')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, array $languages = [], $type = '', array $settings = []) {
    $this->languages = $languages;
    $this->type = $type;
    $this->settings = $settings;

    $language_url = $this->languageManager->getCurrentLanguage(Language::TYPE_URL);

    $unique_id = Html::getId('lang_dropdown_form');

    $options = $hidden_elements = [];
    $js_settings = [
      'key' => $unique_id,
    ];

    $selected_option_language_icon = $language_selected = $language_session_selected = '';

    $form['lang_dropdown_type'] = [
      '#type' => 'value',
      '#default_value' => $this->type,
    ];
    $form['lang_dropdown_tohome'] = [
      '#type' => 'value',
      '#default_value' => $this->settings['tohome'],
    ];

    // Iterate on $languages to build the needed options for the select element.
    foreach ($this->languages as $lang_code => $lang_options) {
      /** @var \Drupal\Core\Language\LanguageInterface $language */
      $language = $lang_options['language'];

      // There is no translation for this language
      // and not all languages are shown.
      if (!$this->settings['showall'] && in_array('locale-untranslated', $lang_options['attributes']['class'], TRUE)) {
        continue;
      }

      // Build the options in an associative array,
      // so it will be ready for #options in select form element.
      switch ($this->settings['display']) {
        case LANGDROPDOWN_DISPLAY_TRANSLATED:
        default:
          $options += [$lang_code => $this->t($language->getName())];
          break;

        case LANGDROPDOWN_DISPLAY_NATIVE:
          $native_language = $this->languageManager->getNativeLanguages()[$lang_code];
          $options += [$lang_code => $native_language->getName()];
          break;

        case LANGDROPDOWN_DISPLAY_LANGCODE:
          $options += [$lang_code => $lang_code];
          break;
      }

      // Identify selected language.
      if (isset($lang_options['url'])) {
        /** @var \Drupal\Core\Url $url */
        $url = $lang_options['url'];
        if ($url->isRouted()) {
          $route_name = $url->getRouteName();
          $is_current_path = ($route_name === '<current>') || ($route_name == $this->routeMatch->getRouteName()) || ($route_name === '<front>' && $this->pathMatcher->isFrontPage());
          $is_current_language = (empty($language) || $language->getId() == $language_url->getId());
          if ($is_current_path && $is_current_language) {
            $language_selected = $lang_code;
          }
        }
      }

      // Identify if session negotiation had set session-active class.
      if (in_array('session-active', $lang_options['attributes']['class'], TRUE)) {
        $language_session_selected = $lang_code;
      }

      // Now we build our hidden form inputs to handle the redirections.
      $url = (isset($lang_options['url']) && $this->settings['tohome'] == 0) ? $lang_options['url'] : Url::fromRoute('<front>');
      if (!isset($lang_options['query'])) {
        $lang_options['query'] = $this->requestStack->query->all();
      }
      $hidden_elements[$lang_code] = [
        '#type' => 'hidden',
        '#value' => $url->setOptions($url->getOptions() + $lang_options)->toString(),
      ];

      // Handle flags with Language icons module using JS widget.
      if (isset($this->settings['widget']) && $this->moduleHandler->moduleExists('languageicons')) {
        $languageicons_config = $this->configFactory()->get('languageicons.settings');
        $languageicons_path = $languageicons_config->get('path');
        $js_settings['languageicons'][$lang_code] = file_create_url(str_replace('*', $lang_code, $languageicons_path));
      }
    }

    // If session-active is set that's the selected language
    // otherwise rely on $language_selected.
    $selected_option = ($language_session_selected === '') ? $language_selected : $language_session_selected;

    // Icon for the selected language.
    if (!$this->settings['widget'] && $this->moduleHandler->moduleExists('languageicons')) {
      /** @var \Drupal\Core\Language\LanguageInterface $language */
      $language = $this->languages[$selected_option]['language'];
      $selected_option_language_icon = [
        '#theme' => 'languageicons_link_content',
        '#language' => $language,
        '#title' => $language->getName(),
      ];
      $selected_option_language_icon = \Drupal::service('renderer')->renderPlain($selected_option_language_icon);
    }

    // Add required files and settings for JS widget.
    if ($this->settings['widget'] == LANGDROPDOWN_MSDROPDOWN) {
      $js_settings += [
        'widget' => 'msdropdown',
        'visibleRows' => $this->settings['msdropdown']['visible_rows'],
        'roundedCorner' => $this->settings['msdropdown']['rounded'],
        'animStyle' => $this->settings['msdropdown']['animation'],
        'event' => $this->settings['msdropdown']['event'],
      ];

      $selected_skin = $this->settings['msdropdown']['skin'];
      if ($selected_skin === 'custom') {
        $custom_skin = Html::escape($this->settings['msdropdown']['custom_skin']);
        $form['#attached']['library'][] = 'lang_dropdown/ms-dropdown';
        $js_settings += [
          'mainCSS' => $custom_skin,
        ];
      }
      else {
        $skins = _lang_dropdown_get_msdropdown_skins();
        $skin_data = $skins[$selected_skin];
        $form['#attached']['library'][] = 'lang_dropdown/' . $selected_skin;
        $js_settings += [
          'mainCSS' => $skin_data['mainCSS'],
        ];
      }
      $form['#attached']['library'][] = 'lang_dropdown/ms-dropdown';
      $form['#attached']['drupalSettings']['lang_dropdown'][$unique_id] = $js_settings;
    }
    elseif ($this->settings['widget'] == LANGDROPDOWN_CHOSEN) {
      $js_settings += [
        'widget' => 'chosen',
        'disable_search' => $this->settings['chosen']['disable_search'],
        'no_results_text' => $this->settings['chosen']['no_results_text'],
      ];

      $form['#attached']['library'][] = 'lang_dropdown/chosen';
      $form['#attached']['drupalSettings']['lang_dropdown'][$unique_id] = $js_settings;
    }
    elseif ($this->settings['widget'] == LANGDROPDOWN_DDSLICK) {
      $form['#attached']['library'][] = 'lang_dropdown/ddslick';
      $selected_skin = $this->settings['ddslick']['skin'];
      $js_settings += [
        'widget' => 'ddslick',
        'width' => $this->settings['width'],
        'height' => $this->settings['ddslick']['ddslick_height'],
        'showSelectedHTML' => $this->settings['ddslick']['showSelectedHTML'],
        'imagePosition' => $this->settings['ddslick']['imagePosition'],
      ];
      $form['#attributes']['class'][] = ($selected_skin === 'custom') ?
        Html::escape($this->settings['ddslick']['custom_skin']) : $selected_skin;
      $form['#attached']['library'][] = 'lang_dropdown/' . $selected_skin;
      $form['#attached']['drupalSettings']['lang_dropdown'][$unique_id] = $js_settings;
    }
    else {
      $form['#attached']['drupalSettings']['lang_dropdown']['lang-dropdown-form'] = $js_settings;
    }
    $flag_position = $this->settings['languageicons']['flag_position'] ? '#suffix' : '#prefix';

    // Now we build the $form array.
    $form['lang_dropdown_select'] = [
      '#title' => $this->t('Select your language'),
      '#title_display' => 'invisible',
      '#type' => 'select',
      '#default_value' => $selected_option ? $selected_option : key($options),
      '#options' => $options,
      '#attributes' => [
        'style' => 'width:' . $this->settings['width'] . 'px',
        'class' => ['lang-dropdown-select-element'],
        'data-lang-dropdown-id' => $unique_id,
      ],
      '#attached' => [
        'library' => ['lang_dropdown/lang-dropdown-form'],
      ],
    ];

    if (empty($hidden_elements)) {
      return [];
    }

    $form += $hidden_elements;
    if ($this->moduleHandler->moduleExists('languageicons')) {
      $form['lang_dropdown_select'][$flag_position] = $selected_option_language_icon;
    }

    $form['#attributes']['class'][] = 'lang_dropdown_form';
    $form['#attributes']['class'][] = 'clearfix';
    $form['#attributes']['class'][] = $this->type;
    $form['#attributes']['id'] = 'lang_dropdown_form_' . $unique_id;
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Go'),
      '#noscript' => TRUE,
      // The below prefix & suffix for graceful fallback
      // if JavaScript was disabled.
      '#prefix' => new FormattableMarkup('<noscript><div>', []),
      '#suffix' => new FormattableMarkup('</div></noscript>', []),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $language_code = $form_state->getValue('lang_dropdown_select');
    $type = $form_state->getValue('lang_dropdown_type');
    $tohome = $form_state->getValue('lang_dropdown_tohome');

    $language_codes = $this->languageManager->getLanguages();
    if (!array_key_exists($language_code, $language_codes)) {
      return;
    }

    $types = $this->languageManager->getDefinedLanguageTypesInfo();
    if (!array_key_exists($type, $types)) {
      return;
    }

    $route = $this->pathMatcher->isFrontPage() ? '<front>' : '<current>';
    $url = Url::fromRoute($route);
    $languages = $this->languageManager->getLanguageSwitchLinks($type, $url);

    $language = $languages->links[$language_code];

    $newurl = (isset($language['url']) && $tohome == 0) ? $language['url'] : Url::fromRoute('<front>');

    if (!isset($language['query'])) {
      $language['query'] = $this->requestStack->query->all();
    }

    $url = new Url($newurl->getRouteName(), $newurl->getRouteParameters(), $language);
    $form_state->setResponse(new TrustedRedirectResponse($url->toString(), Response::HTTP_SEE_OTHER));
  }

}
