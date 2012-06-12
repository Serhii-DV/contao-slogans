<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * PHP version 5
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Language
 * @license    LGPL
 * @filesource
 */

$lang =& $GLOBALS['TL_LANG']['tl_slogans'];

/**
 * Fields
 */
$lang['slogan'] = array('Слоган', 'Введите содержимое слогана.');
$lang['published'] = array('Опубликовать', 'Сделать запись видимой на сайте.');
$lang['tstamp'] = array('Дата обнволения', 'Дата и время обновления записи.');

$lang['slogan_legend'] = 'Слоган';
$lang['publish_legend'] = 'Настройки публикации';

/**
 * Reference
 */


/**
 * Buttons
 */
$lang['new']    = array('Добавить слоган', 'Создать новую запись');
$lang['edit']   = array('Редактировать', 'Редактировать запись ID %s');
$lang['copy']   = array('Копировать', 'Копировать запись ID %s');
$lang['cut']   = array('Переместить', 'Переместить запись ID %s');
$lang['delete'] = array('Удалить', 'Удалить запись ID %s');
$lang['toggle'] = array('Опубликовать/спрятать', 'Опубликовать/спрятать запись ID %s');
$lang['show']   = array('Информация', 'Показать информацию о записи ID %s');

unset($lang);

?>