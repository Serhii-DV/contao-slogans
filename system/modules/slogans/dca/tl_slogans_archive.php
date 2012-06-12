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

$table = 'tl_slogans_archive';
$lang = &$GLOBALS['TL_LANG'][$table];

/**
 * Table tl_slogans_archive
 */
$GLOBALS['TL_DCA'][$table] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_slogans'),
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
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter,search,limit'
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
                'href'                => 'table=tl_slogans',
				'icon'                => 'edit.gif',
				'attributes'          => 'class="contextmenu"'
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
			'delete' => array
			(
				'label'               => &$lang['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
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
		'default'                     => '{title_legend},title'
	),

	// Subpalettes
	'subpalettes' => array
	(
		''                     => ''
	),

	// Fields
	'fields' => array
	(
		'title' => array
		(
			'label'                   => &$lang['title'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128)
		)
	)
);

unset($lang, $table);

/**
 * Class tl_slogans_archive
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Slogans
 */
class tl_slogans_archive extends CustomDCAHelper
{
}

?>