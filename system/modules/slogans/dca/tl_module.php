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

$dca =& $GLOBALS['TL_DCA']['tl_module'];
$lang =& $GLOBALS['TL_LANG']['tl_module'];

/**
 * Add palettes to tl_module
 */
$dca['palettes']['random_slogan']	= '{title_legend},name,type;{config_legend},slogans_archives;{expert_legend:hide},cssID';


/**
 * Add fields to tl_module
 */
$dca['fields']['slogans_archives'] = array
(
	'label'                   => &$lang['slogans_archives'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_slogans', 'getArchives'),
	'eval'                    => array('multiple'=>true, 'mandatory'=>true)
);

unset($dca, $lang);

/**
 * Class tl_module_slogans
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Slogans
 */
class tl_module_slogans extends CustomDCAHelper
{
	/**
	 * Get all archives and return them as array
	 * @return array
	 */
	public function getArchives()
	{
		if (!$this->User->isAdmin)
		{
			return array();
		}

		$arrArchives = array();
		$objArchives = $this->Database->execute("SELECT id, title FROM tl_slogans_archive ORDER BY title");

		while ($objArchives->next())
		{
			$arrArchives[$objArchives->id] = $objArchives->title;
		}

		return $arrArchives;
	}
}

?>