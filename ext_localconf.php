<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

$_EXTCONF = unserialize($_EXTCONF);	// unserializing the configuration so we can use it here:

if($_EXTCONF['metaValidation']) {
	$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['configArrayPostProc'][$_EXTKEY] = 'EXT:dev_null_webmasters/class.tx_devnullwebmasters_fehook.php:&tx_devnullwebmasters_fehook->hookInitConfig';
}
?>