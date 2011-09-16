<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Wolfgang <scotty@dev-null.at>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
/**
 * [CLASS/FUNCTION INDEX of SCRIPT]
 *
 * Hint: use extdeveval to insert/update function index above.
 */

require_once(PATH_tslib.'class.tslib_pibase.php');

// Typo3 debugging utility
require_once(PATH_t3lib.'utility/class.t3lib_utility_debug.php');


/**
 * Plugin 'Robots.txt' for the 'dev_null_webmasters' extension.
 *
 * @author	Wolfgang <scotty@dev-null.at>
 * @package	TYPO3
 * @subpackage	tx_devnullwebmasters
 */
class tx_devnullwebmasters {

	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf)	{

		$_content = '';

		// warning for myself - don't access database with GET/POST values directly
		// in this case we just use it as index for the SETUP array
		$webmasters = t3lib_div::_GP('webmasters') . '.';

		$_conf = $GLOBALS['TSFE']->tmpl->setup['config.']['devnullwebmasters.'][$webmasters];
		
		// uncomment for debugging
		// t3lib_utility_Debug::printArray($_conf);

		$filename = $GLOBALS['TSFE']->tmpl->getFileName($_conf['fileName']);
		
		if(empty($filename)) {
			header('Content-type: text/plain');
			return 'invalid filename in setup';
		}
		
		if(is_string($_conf['contentType'])) {
			header('Content-type: ' . $_conf['contentType']);
		}

		return $GLOBALS['TSFE']->tmpl->fileContent($filename);
	}
}

if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_webmasters/class.tx_devnullwebmasters.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/dev_null_webmasters/class.tx_devnullwebmasters.php']);
}

?>