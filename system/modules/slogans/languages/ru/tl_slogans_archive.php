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
 * @package    Language
 * @license    LGPL
 * @filesource
 */

$lang =& $GLOBALS['TL_LANG']['tl_slogans_archive'];

/**
 * Fields
 */
$lang['title'] = array('Название', 'Введите название архива.');
$lang['tstamp'] = array('Дата обнволения', 'Дата и время обновления записи.');

$lang['title_legend'] = 'Название';
/**
 * Reference
 */

/**
 * Buttons
 */
$lang['new']    = array('Добавить архив', 'Создать новую запись');
$lang['edit']   = array('Редактировать архив', 'Редактировать запись ID %s');
$lang['editheader'] = array('Редактировать настройки архива', 'Редактировать настройки записи ID %s');
$lang['copy']   = array('Копировать', 'Копировать запись ID %s');
$lang['delete'] = array('Удалить', 'Удалить запись ID %s');
$lang['show']   = array('Информация', 'Показать информацию о записи ID %s');

unset($lang);

?>