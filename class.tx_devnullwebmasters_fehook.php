<?php

/***************************************************************
*  Copyright notice
*  
*  (c) 2011 Wolfgang Rotschek <scotty@dev-null.at>
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is 
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

require_once(PATH_tslib.'class.tslib_pibase.php');

require_once(PATH_t3lib.'class.t3lib_div.php');

// Typo3 debugging utility
require_once(PATH_t3lib.'utility/class.t3lib_utility_debug.php');

class tx_devnullwebmasters_fehook extends tslib_pibase {    

	public function hookInitConfig(array &$parameters, tslib_fe &$parentObject) {
		
		$TSconf = &$parameters['config'];
		$fePage  = &$parentObject;
		
		$GLOBALS['TSFE']->additionalHeaderData[] = '<!-- dev_null.webmasters.configArrayPostProc begin -->';

		foreach($TSconf['devnullwebmasters.'] as $conf) {
			if(is_string($conf['metaName']) && is_string($conf['metaContent'])) {
				$meta = sprintf('<meta name="%s" content="%s" />', $conf['metaName'], $conf['metaContent']);
				$GLOBALS['TSFE']->additionalHeaderData[] = $meta;
			}
		}
		
		$GLOBALS['TSFE']->additionalHeaderData[] = '<!-- dev_null.webmasters.configArrayPostProc end -->';
				
    }	
}


if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/dev_null_webmasters/class.tx_devnullwebmasters_fehook.php"]){
        include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/dev_null_webmasters/class.tx_devnullwebmasters_fehook.php"]);
}

?>
