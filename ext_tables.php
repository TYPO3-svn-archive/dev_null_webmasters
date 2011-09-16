<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_extMgm::addStaticFile($_EXTKEY,'static/dev_null_webmasters/', 'dev/null webmasters');
?>