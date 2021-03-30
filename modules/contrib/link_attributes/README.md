CONTENTS OF THIS FILE
---------------------

 * Introduction
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

The link attributes module provides a widget that allows users to add
attributes to links. It overtakes the core default widget for menu link
content entities, allowing you to set attributes on menu links.

 * For a full description of the module, visit the project page:
   https://www.drupal.org/project/link_attributes


REQUIREMENTS
------------

This module requires no modules outside of Drupal core.


INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. Visit:
   https://www.drupal.org/documentation/install/modules-themes/modules-8 for
   further information.


CONFIGURATION
-------------

The module has no menu or modifiable settings. There is no configuration. Once
enabled, the module will add class, rel and target attributes to menu link
content entities by default.

In order to use this functionality, follow the following steps:

 * Enable the module like normal
 * It will immediately take effect on *menu link content* entities.
 * For other link fields, edit the widget using 'Manage form display'
   and select the 'Link (with attributes)' widget

You can also follow along with this [screencast](https://vimeo.com/233507094) to
configure the field settings.


MAINTAINERS
-----------

 * Lee Rowlands (larowlan) - https://www.drupal.org/u/larowlan
