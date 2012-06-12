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

/**
 * Class ModuleRandomSlogan
 *
 * @copyright  Sergey Dyagovchenko 2012
 * @author     Sergey Dyagovchenko <http://d.sumy.ua>
 * @package    Controller
 */
class ModuleRandomSlogan extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_slogan';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### RANDOM SLOGAN ###<br />';

			return $objTemplate->parse();
		}

		$this->archives = deserialize($this->slogans_archives);

		// Return if there are no archives
		if (!is_array($this->archives) || empty($this->archives))
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		// idea taken from here: http://akinas.com/pages/en/blog/mysql_random_row/
		$objSlogan = $this->Database->prepare('
			SELECT *
			FROM tl_slogans
			WHERE id >= (SELECT CEIL( MAX(id)*RAND() ) FROM tl_slogans)
			AND pid IN (' . implode(',', array_map('intval', $this->archives)) . ')
			AND published=1
			ORDER BY sorting')
				->limit(1)
				->execute();

		if ($objSlogan->numRows == 1)
		{
			$this->Template->slogan = $objSlogan->slogan;
		}
	}

}

?>
