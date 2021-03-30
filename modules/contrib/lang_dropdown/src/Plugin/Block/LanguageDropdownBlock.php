<?php

namespace Drupal\lang_dropdown\Plugin\Block;

use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Asset\LibraryDiscovery;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Url;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Form\FormBuilderInterface;
use Drupal\lang_dropdown\Form\LanguageDropdownForm;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'Language dropdown switcher' block.
 *
 * @Block(
 *   id = "language_dropdown_block",
 *   admin_label = @Translation("Language dropdown switcher"),
 *   category = @Translation("System"),
 *   deriver = "Drupal\lang_dropdown\Plugin\Derivative\LanguageDropdownBlock"
 * )
 */
class LanguageDropdownBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * The path matcher.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * The module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The library discovery service.
   *
   * @var \Drupal\Core\Asset\LibraryDiscovery
   */
  protected $libraryDiscovery;

  /**
   * The current user account.
   *
   * @var \Drupal\Core\Session\AccountProxyInterface
   */
  protected $currentUser;

  /**
   * The form builder service.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * Constructs an LanguageBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Path\PathMatcherInterface $path_matcher
   *   The path matcher.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Asset\LibraryDiscovery $library_discovery
   *   The library discovery service.
   * @param \Drupal\Core\Session\AccountProxyInterface $current_user
   *   The current user account.
   * @param \Drupal\Core\Form\FormBuilderInterface $form_builder
   *   The form builder service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, LanguageManagerInterface $language_manager, PathMatcherInterface $path_matcher, ModuleHandlerInterface $module_handler, LibraryDiscovery $library_discovery, AccountProxyInterface $current_user, FormBuilderInterface $form_builder) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->languageManager = $language_manager;
    $this->pathMatcher = $path_matcher;
    $this->moduleHandler = $module_handler;
    $this->libraryDiscovery = $library_discovery;
    $this->currentUser = $current_user;
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('language_manager'),
      $container->get('path.matcher'),
      $container->get('module_handler'),
      $container->get('library.discovery'),
      $container->get('current_user'),
      $container->get('form_builder')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'showall' => 0,
      'tohome' => 0,
      'width' => 165,
      'display' => LANGDROPDOWN_DISPLAY_NATIVE,
      'widget' => LANGDROPDOWN_SIMPLE_SELECT,
      'msdropdown' => [
        'visible_rows' => 5,
        'rounded' => 1,
        'animation' => 'slideDown',
        'event' => 'click',
        'skin' => 'ldsSkin',
        'custom_skin' => '',
      ],
      'chosen' => [
        'disable_search' => 1,
        'no_results_text' => $this->t('No language match'),
      ],
      'ddslick' => [
        'ddslick_height' => 0,
        'showSelectedHTML' => 1,
        'imagePosition' => LANGDROPDOWN_DDSLICK_LEFT,
        'skin' => 'ddsDefault',
        'custom_skin' => '',
      ],
      'languageicons' => [
        'flag_position' => LANGDROPDOWN_FLAG_POSITION_AFTER,
      ],
      'hidden_languages' => [],
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function blockAccess(AccountInterface $account) {
    $access = $this->languageManager->isMultilingual() ? AccessResult::allowed() : AccessResult::forbidden();
    return $access->addCacheTags(['config:configurable_language_list']);
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form['lang_dropdown'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Language switcher dropdown settings'),
      '#weight' => 1,
      '#tree' => TRUE,
    ];

    $form['lang_dropdown']['showall'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show all enabled languages'),
      '#description' => $this->t('Show all languages in the switcher no matter if there is a translation for the node or not. For languages without translation the switcher will redirect to homepage.'),
      '#default_value' => $this->configuration['showall'],
    ];

    $form['lang_dropdown']['tohome'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Redirect to home on switch'),
      '#description' => $this->t('When you change language the switcher will redirect to homepage.'),
      '#default_value' => $this->configuration['tohome'],
    ];

    $form['lang_dropdown']['width'] = [
      '#type' => 'number',
      '#title' => $this->t('Width of dropdown element'),
      '#size' => 8,
      '#maxlength' => 3,
      '#required' => TRUE,
      '#field_suffix' => 'px',
      '#default_value' => $this->configuration['width'],
    ];

    $form['lang_dropdown']['display'] = [
      '#type' => 'select',
      '#title' => $this->t('Display format'),
      '#options' => [
        LANGDROPDOWN_DISPLAY_TRANSLATED => $this->t('Translated into Current Language'),
        LANGDROPDOWN_DISPLAY_NATIVE => $this->t('Language Native Name'),
        LANGDROPDOWN_DISPLAY_LANGCODE => $this->t('Language Code'),
      ],
      '#default_value' => $this->configuration['display'],
    ];

    $form['lang_dropdown']['widget'] = [
      '#type' => 'select',
      '#title' => $this->t('Output type'),
      '#options' => [
        LANGDROPDOWN_SIMPLE_SELECT => $this->t('Simple HTML select'),
        LANGDROPDOWN_MSDROPDOWN => $this->t('Marghoob Suleman Dropdown jquery library'),
        LANGDROPDOWN_CHOSEN => $this->t('Chosen jquery library'),
        LANGDROPDOWN_DDSLICK => $this->t('ddSlick library'),
      ],
      '#default_value' => $this->configuration['widget'],
    ];

    $form['lang_dropdown']['msdropdown'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Marghoob Suleman Dropdown Settings'),
      '#weight' => 1,
      '#states' => [
        'visible' => [
          ':input[name="settings[lang_dropdown][widget]"]' => ['value' => LANGDROPDOWN_MSDROPDOWN],
        ],
      ],
    ];

    if (!$this->moduleHandler->moduleExists('languageicons')) {
      $form['lang_dropdown']['msdropdown']['#description'] = $this->t('This looks better with <a href=":link">language icons</a> module.', [':link' => LANGDROPDOWN_LANGUAGEICONS_MOD_URL]);
    }

    $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ms-dropdown');
    if (!empty($library)) {
      $num_rows = [
        2,
        3,
        4,
        5,
        6,
        7,
        8,
        9,
        10,
        11,
        12,
        13,
        14,
        15,
        16,
        17,
        18,
        19,
        20,
      ];
      $form['lang_dropdown']['msdropdown']['visible_rows'] = [
        '#type' => 'select',
        '#title' => $this->t('Maximum number of visible rows'),
        '#options' => array_combine($num_rows, $num_rows),
        '#default_value' => $this->configuration['msdropdown']['visible_rows'],
      ];

      $form['lang_dropdown']['msdropdown']['rounded'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Rounded corners.'),
        '#default_value' => $this->configuration['msdropdown']['rounded'],
      ];

      $form['lang_dropdown']['msdropdown']['animation'] = [
        '#type' => 'select',
        '#title' => $this->t('Animation style for dropdown'),
        '#options' => [
          'slideDown' => $this->t('Slide down'),
          'fadeIn' => $this->t('Fade in'),
          'show' => $this->t('Show'),
        ],
        '#default_value' => $this->configuration['msdropdown']['animation'],
      ];

      $form['lang_dropdown']['msdropdown']['event'] = [
        '#type' => 'select',
        '#title' => $this->t('Event that opens the menu'),
        '#options' => ['click' => $this->t('Click'), 'mouseover' => $this->t('Mouse Over')],
        '#default_value' => $this->configuration['msdropdown']['event'],
      ];

      $msdSkinOptions = [];
      foreach (_lang_dropdown_get_msdropdown_skins() as $key => $value) {
        $msdSkinOptions[$key] = $value['text'];
      }
      $form['lang_dropdown']['msdropdown']['skin'] = [
        '#type' => 'select',
        '#title' => $this->t('Skin'),
        '#options' => $msdSkinOptions,
        '#default_value' => $this->configuration['msdropdown']['skin'],
      ];

      $form['lang_dropdown']['msdropdown']['custom_skin'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Custom skin name'),
        '#size' => 80,
        '#maxlength' => 55,
        '#default_value' => $this->configuration['msdropdown']['custom_skin'],
        '#states' => [
          'visible' => [
            ':input[name="settings[lang_dropdown][msdropdown][skin]"]' => ['value' => 'custom'],
          ],
        ],
      ];
    }
    else {
      $form['lang_dropdown']['msdropdown']['#description'] = $this->t('You need to download the <a href=":link">Marghoob Suleman Dropdown JavaScript library</a> and extract the entire contents of the archive into the %path directory on your server.', [':link' => LANGDROPDOWN_MSDROPDOWN_URL, '%path' => 'drupal_root/libraries']);
      $form['lang_dropdown']['msdropdown']['visible_rows'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['visible_rows'],
      ];
      $form['lang_dropdown']['msdropdown']['rounded'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['rounded'],
      ];
      $form['lang_dropdown']['msdropdown']['animation'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['animation'],
      ];
      $form['lang_dropdown']['msdropdown']['event'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['event'],
      ];
      $form['lang_dropdown']['msdropdown']['skin'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['skin'],
      ];
      $form['lang_dropdown']['msdropdown']['custom_skin'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['msdropdown']['custom_skin'],
      ];
    }

    $form['lang_dropdown']['languageicons'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Language icons settings'),
      '#weight' => 1,
      '#states' => [
        'visible' => [
          ':input[name="settings[lang_dropdown][widget]"]' => ['value' => LANGDROPDOWN_SIMPLE_SELECT],
        ],
      ],
    ];

    if ($this->moduleHandler->moduleExists('languageicons')) {
      $form['lang_dropdown']['languageicons']['flag_position'] = [
        '#type' => 'select',
        '#title' => $this->t('Position of the flag when the dropdown is show just as a select'),
        '#options' => [
          LANGDROPDOWN_FLAG_POSITION_BEFORE => $this->t('Before'),
          LANGDROPDOWN_FLAG_POSITION_AFTER => $this->t('After'),
        ],
        '#default_value' => $this->configuration['languageicons']['flag_position'],
      ];
    }
    else {
      $form['lang_dropdown']['languageicons']['#description'] = $this->t('Enable <a href=":link">language icons</a> module to show a flag of the selected language before or after the select box.', [':link' => LANGDROPDOWN_LANGUAGEICONS_MOD_URL]);
      $form['lang_dropdown']['languageicons']['flag_position'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['languageicons']['flag_position'],
      ];
    }

    $form['lang_dropdown']['chosen'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Chosen settings'),
      '#weight' => 2,
      '#states' => [
        'visible' => [
          ':input[name="settings[lang_dropdown][widget]"]' => ['value' => LANGDROPDOWN_CHOSEN],
        ],
      ],
    ];

    $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'chosen');
    if (!empty($library) && !$this->moduleHandler->moduleExists('chosen')) {
      $form['lang_dropdown']['chosen']['disable_search'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Disable search box'),
        '#default_value' => $this->configuration['chosen']['disable_search'],
      ];

      $form['lang_dropdown']['chosen']['no_results_text'] = [
        '#type' => 'textfield',
        '#title' => $this->t('No Result Text'),
        '#description' => $this->t('Text to show when no result is found on search.'),
        '#default_value' => $this->configuration['chosen']['no_results_text'],
        '#states' => [
          'visible' => [
            ':input[name="settings[lang_dropdown][chosen][disable_search]"]' => ['checked' => FALSE],
          ],
        ],
      ];
    }
    else {
      $form['lang_dropdown']['chosen']['disable_search'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['chosen']['disable_search'],
      ];
      $form['lang_dropdown']['chosen']['no_results_text'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['chosen']['no_results_text'],
      ];
      if ($this->moduleHandler->moduleExists('chosen')) {
        $form['lang_dropdown']['chosen']['#description'] = $this->t('If you are already using the !chosenmod you must just choose to output language dropdown as a simple HTML select and allow <a href=":link">Chosen module</a> to turn it into a chosen style select.', [':link' => LANGDROPDOWN_CHOSEN_MOD_URL]);
      }
      else {
        $form['lang_dropdown']['chosen']['#description'] = $this->t('You need to download the <a href=":link">Chosen library</a> and extract the entire contents of the archive into the %path directory on your server.', [':link' => LANGDROPDOWN_CHOSEN_WEB_URL, '%path' => 'drupal_root/libraries']);
      }
    }

    $form['lang_dropdown']['ddslick'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('ddSlick settings'),
      '#weight' => 3,
      '#states' => [
        'visible' => [
          ':input[name="settings[lang_dropdown][widget]"]' => ['value' => LANGDROPDOWN_DDSLICK],
        ],
      ],
    ];

    $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ddslick');
    if (!empty($library)) {
      $form['lang_dropdown']['ddslick']['ddslick_height'] = [
        '#type' => 'number',
        '#title' => $this->t('Height'),
        '#description' => $this->t('Height in px for the drop down options i.e. 300. The scroller will automatically be added if options overflows the height. Use 0 for full height.'),
        '#size' => 8,
        '#maxlength' => 3,
        '#field_suffix' => 'px',
        '#default_value' => $this->configuration['ddslick']['ddslick_height'],
      ];

      if ($this->moduleHandler->moduleExists('languageicons')) {
        $form['lang_dropdown']['ddslick']['showSelectedHTML'] = [
          '#type' => 'checkbox',
          '#title' => $this->t('Show Flag'),
          '#default_value' => $this->configuration['ddslick']['showSelectedHTML'],
        ];

        $form['lang_dropdown']['ddslick']['imagePosition'] = [
          '#type' => 'select',
          '#title' => $this->t('Flag Position'),
          '#options' => [
            LANGDROPDOWN_DDSLICK_LEFT => $this->t('left'),
            LANGDROPDOWN_DDSLICK_RIGHT => $this->t('right'),
          ],
          '#default_value' => $this->configuration['ddslick']['imagePosition'],
          '#states' => [
            'visible' => [
              ':input[name="settings[lang_dropdown][ddslick][showSelectedHTML]"]' => ['checked' => TRUE],
            ],
          ],
        ];
      }
      else {
        $form['lang_dropdown']['ddslick']['showSelectedHTML'] = [
          '#type' => 'hidden',
          '#value' => $this->configuration['ddslick']['showSelectedHTML'],
        ];
        $form['lang_dropdown']['ddslick']['imagePosition'] = [
          '#type' => 'hidden',
          '#value' => $this->configuration['ddslick']['imagePosition'],
        ];
      }

      $ddsSkinOptions = [];
      foreach (_lang_dropdown_get_ddslick_skins() as $key => $value) {
        $ddsSkinOptions[$key] = $value['text'];
      }
      $form['lang_dropdown']['ddslick']['skin'] = [
        '#type' => 'select',
        '#title' => $this->t('Skin'),
        '#options' => $ddsSkinOptions,
        '#default_value' => $this->configuration['ddslick']['skin'],
      ];

      $form['lang_dropdown']['ddslick']['custom_skin'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Custom skin name'),
        '#size' => 80,
        '#maxlength' => 55,
        '#default_value' => $this->configuration['ddslick']['custom_skin'],
        '#states' => [
          'visible' => [
            ':input[name="settings[lang_dropdown][ddslick][skin]"]' => ['value' => 'custom'],
          ],
        ],
      ];

    }
    else {
      $form['lang_dropdown']['ddslick']['ddslick_height'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['ddslick']['ddslick_height'],
      ];
      $form['lang_dropdown']['ddslick']['showSelectedHTML'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['ddslick']['showSelectedHTML'],
      ];
      $form['lang_dropdown']['ddslick']['imagePosition'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['ddslick']['imagePosition'],
      ];
      $form['lang_dropdown']['ddslick']['skin'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['ddslick']['skin'],
      ];
      $form['lang_dropdown']['ddslick']['custom_skin'] = [
        '#type' => 'hidden',
        '#value' => $this->configuration['ddslick']['custom_skin'],
      ];
    }

    // Configuration options that allow to hide a specific language
    // to specific roles.
    $form['lang_dropdown']['hideout'] = [
      '#type' => 'details',
      '#open' => TRUE,
      '#title' => $this->t('Hide language settings'),
      '#description' => $this->t('Select which languages you want to hide to specific roles.'),
      '#weight' => 4,
    ];

    $languages = $this->languageManager->getLanguages();
    $roles = user_roles();

    $role_names = [];
    $role_languages = [];
    foreach ($roles as $rid => $role) {
      // Retrieve role names for columns.
      $role_names[$rid] = new FormattableMarkup($role->label(), []);
      // Fetch languages for the roles.
      $role_languages[$rid] = !empty($this->configuration['hidden_languages'][$rid]) ? $this->configuration['hidden_languages'][$rid] : [];
    }

    // Store $role_names for use when saving the data.
    $form['lang_dropdown']['hideout']['role_names'] = [
      '#type' => 'value',
      '#value' => $role_names,
    ];

    $form['lang_dropdown']['hideout']['languages'] = [
      '#type' => 'table',
      '#header' => [$this->t('Languages')],
      '#id' => 'hidden_languages_table',
      '#sticky' => TRUE,
    ];

    foreach ($role_names as $name) {
      $form['lang_dropdown']['hideout']['languages']['#header'][] = [
        'data' => $name,
        'class' => ['checkbox'],
      ];
    }

    foreach ($languages as $code => $language) {
      $form['lang_dropdown']['hideout']['languages'][$code]['language'] = [
        '#type' => 'item',
        '#markup' => $language->getName(),
      ];

      foreach ($role_names as $rid => $role) {
        $form['lang_dropdown']['hideout']['languages'][$code][$rid] = [
          '#title' => $rid . ': ' . $language->getName(),
          '#title_display' => 'invisible',
          '#wrapper_attributes' => [
            'class' => ['checkbox'],
          ],
          '#type' => 'checkbox',
          '#default_value' => in_array($code, $role_languages[$rid], FALSE) ? 1 : 0,
          '#attributes' => ['class' => ['rid-' . $rid]],
        ];
      }
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    $widget = $form_state->getValue('lang_dropdown')['widget'];
    switch ($widget) {
      case LANGDROPDOWN_MSDROPDOWN:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ms-dropdown');
        if (empty($library) || (isset($library['js']) && !file_exists($library['js'][0]['data']))) {
          $form_state->setErrorByName('settings', $this->t('You can\'t use <a href=":link">Marghoob Suleman Dropdown</a> output. You don\'t have the library installed.', [':link' => LANGDROPDOWN_MSDROPDOWN_URL]));
        }
        break;

      case LANGDROPDOWN_CHOSEN:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'chosen');
        if (empty($library) || (isset($library['js']) && !file_exists($library['js'][0]['data']))) {
          $form_state->setErrorByName('settings', $this->t('You can\'t use <a href=":link">Chosen</a> output. You don\'t have the library installed.', [':link' => LANGDROPDOWN_CHOSEN_MOD_URL]));
        }
        break;

      case LANGDROPDOWN_DDSLICK:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ddslick');
        if (empty($library) || (isset($library['js']) && !file_exists($library['js'][0]['data']))) {
          $form_state->setErrorByName('settings', $this->t('You can\'t use <a href=":link">ddSlick</a> output. You don\'t have the library installed.', [':link' => LANGDROPDOWN_DDSLICK_WEB_URL]));
        }
        break;

      default:
        break;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    /** @var array[][] $lang_dropdown */
    $lang_dropdown = $form_state->getValue('lang_dropdown');
    $this->configuration['showall'] = $lang_dropdown['showall'];
    $this->configuration['tohome'] = $lang_dropdown['tohome'];
    $this->configuration['width'] = $lang_dropdown['width'];
    $this->configuration['display'] = $lang_dropdown['display'];
    $this->configuration['widget'] = $lang_dropdown['widget'];
    $this->configuration['msdropdown'] = [
      'visible_rows' => $lang_dropdown['msdropdown']['visible_rows'],
      'rounded' => $lang_dropdown['msdropdown']['rounded'],
      'animation' => $lang_dropdown['msdropdown']['animation'],
      'event' => $lang_dropdown['msdropdown']['event'],
      'skin' => $lang_dropdown['msdropdown']['skin'],
      'custom_skin' => $lang_dropdown['msdropdown']['custom_skin'],
    ];
    $this->configuration['chosen'] = [
      'disable_search' => $lang_dropdown['chosen']['disable_search'],
      'no_results_text' => $lang_dropdown['chosen']['no_results_text'],
    ];
    $this->configuration['ddslick'] = [
      'ddslick_height' => $lang_dropdown['ddslick']['ddslick_height'],
      'showSelectedHTML' => $lang_dropdown['ddslick']['showSelectedHTML'],
      'imagePosition' => $lang_dropdown['ddslick']['imagePosition'],
      'skin' => $lang_dropdown['ddslick']['skin'],
      'custom_skin' => $lang_dropdown['ddslick']['custom_skin'],
    ];
    $this->configuration['languageicons'] = [
      'flag_position' => $lang_dropdown['languageicons']['flag_position'],
    ];

    $this->configuration['hidden_languages'] = [];
    /** @var string $code */
    /** @var array $values */

    if (isset($lang_dropdown['hideout']['languages']) && is_array($lang_dropdown['hideout']['languages'])) {
      foreach ($lang_dropdown['hideout']['languages'] as $code => $values) {
        unset($values['language']);
        foreach ($values as $rid => $value) {
          if ($value) {
            $this->configuration['hidden_languages'][$rid][] = $code;
          }
        }
      }
    }

  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $library = [];
    switch ($this->configuration['widget']) {
      case LANGDROPDOWN_MSDROPDOWN:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ms-dropdown');
        break;

      case LANGDROPDOWN_CHOSEN:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'chosen');
        break;

      case LANGDROPDOWN_DDSLICK:
        $library = $this->libraryDiscovery->getLibraryByName('lang_dropdown', 'ddslick');
        break;
    }

    if (empty($library) && ($this->configuration['widget'] != LANGDROPDOWN_SIMPLE_SELECT)) {
      return [];
    }

    $route = $this->pathMatcher->isFrontPage() ? '<front>' : '<current>';
    $url = Url::fromRoute($route);
    list(, $type) = explode(':', $this->getPluginId());
    /** @var \stdClass $languages */
    $languages = $this->languageManager->getLanguageSwitchLinks($type, $url);
    $roles = $this->currentUser->getRoles();

    foreach ($languages->links as $langcode => $link) {
      $hide_language = TRUE;

      foreach ($roles as $role) {
        if (!isset($this->configuration['hidden_languages'][$role]) || !in_array($langcode, $this->configuration['hidden_languages'][$role], FALSE)) {
          $hide_language = FALSE;
          break;
        }
      }

      if ($hide_language) {
        unset($languages->links[$langcode]['href']);
        $languages->links[$langcode]['attributes']['class'][] = 'locale-untranslated';
      }
      $languages->links[$langcode]['language'] = $this->languageManager->getLanguage($langcode);
    }

    if (empty($languages->links)) {
      return [];
    }

    $form = $this->formBuilder->getForm(LanguageDropdownForm::class, $languages->links, $type, $this->configuration);

    return [
      'lang_dropdown_form' => $form,
      '#cache' => ['max-age' => 0],
    ];
  }

}
