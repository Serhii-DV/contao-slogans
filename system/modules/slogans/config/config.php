<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * PHP version 5
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Slogans
 * @license    LGPL
 * @filesource
 */

/**
 * Back end modules
 */

$GLOBALS['BE_MOD']['content']['slogans'] = array
(
  'tables'           => array('tl_slogans_archive', 'tl_slogans'),
  'icon'             => 'system/modules/slogans/html/slogans.png'
);

/**
 * Front end modules
 */
$GLOBALS['FE_MOD']['application']['random_slogan'] = 'ModuleRandomSlogan';

?>