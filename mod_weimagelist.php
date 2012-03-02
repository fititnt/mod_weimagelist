<?php
/*
 * @package         mod_weimagelist
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt -  http://fititnt.org
 * @copyright       Copyright (C) 2011 Webdesign Assessoria em Tecnilogia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

//Include helper file once
require_once __DIR__.'/helper.php';
//Initialize the helper
$wil = new WeImageList;

//Get Params
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx',''));

require JModuleHelper::getLayoutPath('mod_weimagelist', $params->get('layout', 'default'));
