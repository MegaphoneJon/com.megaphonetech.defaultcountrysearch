<?php

require_once 'defaultcountrysearch.civix.php';
use CRM_Defaultcountrysearch_ExtensionUtil as E;


/**
 * Implements hook_civicrm_buildForm().
 *
 * Set a default country on profile search forms if one exists.
 *
 */
function defaultcountrysearch_civicrm_buildForm($formName, &$form) {
  if ($formName == 'CRM_Profile_Form_Search') {
    foreach ($form->_elementIndex as $k => $element) {
      if (strpos($k, 'country') === 0) {
        // Country field exists; check for a default country setting.
        $defaultCountry = civicrm_api3('Setting', 'get', [
          'return' => ["defaultContactCountry"],
          'sequential' => 1,
        ]);
        if ($defaultCountry['count']) {
          $defaults[$k] = $defaultCountry['values'][0]['defaultContactCountry'];
          $form->setDefaults($defaults);
        }
      }
    }
  }
}

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function defaultcountrysearch_civicrm_config(&$config) {
  _defaultcountrysearch_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function defaultcountrysearch_civicrm_xmlMenu(&$files) {
  _defaultcountrysearch_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function defaultcountrysearch_civicrm_install() {
  _defaultcountrysearch_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function defaultcountrysearch_civicrm_postInstall() {
  _defaultcountrysearch_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function defaultcountrysearch_civicrm_uninstall() {
  _defaultcountrysearch_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function defaultcountrysearch_civicrm_enable() {
  _defaultcountrysearch_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function defaultcountrysearch_civicrm_disable() {
  _defaultcountrysearch_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function defaultcountrysearch_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _defaultcountrysearch_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function defaultcountrysearch_civicrm_managed(&$entities) {
  _defaultcountrysearch_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function defaultcountrysearch_civicrm_caseTypes(&$caseTypes) {
  _defaultcountrysearch_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function defaultcountrysearch_civicrm_angularModules(&$angularModules) {
  _defaultcountrysearch_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function defaultcountrysearch_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _defaultcountrysearch_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function defaultcountrysearch_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function defaultcountrysearch_civicrm_navigationMenu(&$menu) {
  _defaultcountrysearch_civix_insert_navigation_menu($menu, NULL, array(
    'label' => E::ts('The Page'),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _defaultcountrysearch_civix_navigationMenu($menu);
} // */
