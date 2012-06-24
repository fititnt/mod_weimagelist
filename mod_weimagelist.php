<?php

/*
 * @package         mod_weimagelist
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt -  http://fititnt.org
 * @copyright       Copyright (C) 2011 Webdesign Assessoria em Tecnilogia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

//Include helper file once
require_once  dirname(__FILE__) . '/helper.php';
//Initialize the helper
$wil = new WeImageList;
$wil->setParams($params); //$wil->type('module')->name('mod_weimagelist');
//print_r($wil->getParam('direct_image_1'));die;
$list = $wil->getList();

$doc = JFactory::getDocument();

if ($wil->getParam('use_css', 1)) {
	$doc->addStyleSheet(JURI::base(true) . '/modules/mod_weimagelist/css/weimagelist.css');
}
if ($wil->getParam('use_js', 1)) {
	if ($wil->getParam('use_selectivizr', 1)) { //Use Use_selectivizr
		jimport('joomla.environment.browser');
		$browser = &JBrowser::getInstance();
		if (($browser->getBrowser() == 'msie') && ($browser->getMajor() < 9)) {//Only use if is for IE less than 9
			if (defined(JDEBUG)) {
				$doc->addScript(JURI::base(true) . '/modules/mod_weimagelist/js/selectivizr.js');
			} else {
				$doc->addScript(JURI::base(true) . '/modules/mod_weimagelist/js/selectivizr-min.js');
			}
		}
	}
}
//Get Params
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx', ''));

require JModuleHelper::getLayoutPath('mod_weimagelist', $params->get('layout', 'default'));
