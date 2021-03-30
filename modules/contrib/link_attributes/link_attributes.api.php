<?php

/**
 * @file
 * Hooks related to the Link Attributes module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Modify the definitions of link attribute plugins.
 *
 * @param array[] $plugins
 *   Link attribute plugin definitions.
 */
function hook_link_attributes_plugin_alter(array &$plugins) {
  // Set a default value for the target attribute.
  $plugins['target']['default_value'] = '_blank';
}

/**
 * @} End of "addtogroup hooks".
 */
