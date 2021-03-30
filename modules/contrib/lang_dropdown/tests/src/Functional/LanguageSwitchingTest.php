<?php

namespace Drupal\Tests\lang_dropdown\Functional;

use Drupal\Core\Language\LanguageInterface;
use Drupal\Tests\BrowserTestBase;

/**
 * Functional tests for the language switching feature.
 *
 * @group lang_dropdown
 */
class LanguageSwitchingTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stable';

  /**
   * {@inheritdoc}
   */
  public static $modules = [
    'block',
    'language',
    'lang_dropdown',
    'locale',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create and log in user.
    $admin_user = $this->drupalCreateUser([
      'administer blocks',
      'administer languages',
      'access administration pages',
    ]);
    $this->drupalLogin($admin_user);
  }

  /**
   * Tests language switcher links for session based negotiation.
   */
  public function testLanguageSessionSwitchLinks() {
    // Add language.
    $edit = [
      'predefined_langcode' => 'fr',
    ];
    $this->drupalPostForm('admin/config/regional/language/add', $edit, t('Add language'));

    // Enable session language detection and selection.
    $edit = [
      'language_interface[enabled][language-url]' => FALSE,
      'language_interface[enabled][language-session]' => TRUE,
    ];
    $this->drupalPostForm('admin/config/regional/language/detection', $edit, t('Save settings'));

    // Enable the language switching block.
    $this->drupalPlaceBlock('language_dropdown_block:' . LanguageInterface::TYPE_INTERFACE, [
      'id' => 'test_language_dropdown_block',
    ]);

    // Go to the homepage.
    $this->drupalGet('');
    // Make sure default language selected is English.
    $this->assertEqual(1, count($this->cssSelect('#edit-lang-dropdown-select option[selected=selected]:contains(English)')));
    // Go to the homepage for French language.
    $this->drupalGet('', ['query' => ['language' => 'fr']]);
    // Make sure default language selected is French.
    $this->assertEqual(1, count($this->cssSelect('#edit-lang-dropdown-select option[selected=selected]:contains(French)')));
    // @todo Add Ajax testing of language switching.
  }

}
