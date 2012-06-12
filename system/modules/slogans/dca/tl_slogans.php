<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

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

$table = 'tl_slogans';
$lang = &$GLOBALS['TL_LANG'][$table];

/**
 * Table tl_slogans
 */
$GLOBALS['TL_DCA'][$table] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
        'ptable'                      => 'tl_slogans_archive',
        'switchToEdit'                => true,
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array($table, 'checkPermission')
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('sorting'),
			'panelLayout'             => 'filter,search,limit',
			'headerFields'            => array('title', 'tstamp'),
			'child_record_callback'   => array($table, 'listItem')
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s'
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$lang['edit'],
                'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$lang['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'attributes'          => 'class="edit-header"'
			),
			'copy' => array
			(
				'label'               => &$lang['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$lang['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			),
			'delete' => array
			(
				'label'               => &$lang['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'toggle' => array
			(
				'label'               => &$lang['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
				'button_callback'     => array($table, 'toggleIcon')
			),
			'show' => array
			(
				'label'               => &$lang['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'                => array(''),
		'default'                     => '{slogan_legend},slogan;{publish_legend},published'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                     => ''
	),

	// Fields
	'fields' => array
	(
		'slogan' => array
		(
			'label'                   => &$lang['slogan'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>false, 'style'=>'height:50px'),
			'explanation'             => 'insertTags'
		),
		'published' => array
		(
			'exclude'                 => true,
			'label'                   => &$lang['published'],
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		)
	)
);

unset($table, $lang);

/**
 * Class tl_slogans
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Slogans
 */
class tl_slogans extends CustomDCAHelper
{
	/**
	 * list record item
     *
	 * @param array
	 * @return string
	 */
	public function listItem($arrRow)
	{
		$key = !$arrRow['published'] ? 'unpublished' : 'published';

		$strType = '
<div class="cte_type ' . $key . '">' . $arrRow['slogan'] . '</div>';

        $strValue = '';
//		$strValue .= $arrRow['slogan'];

		return $strType . $strValue . "\n";
	}

}

?>