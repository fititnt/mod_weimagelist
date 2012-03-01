<?php
/*
 * @package         mod_weimagelist
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt -  http://fititnt.org
 * @copyright       Copyright (C) 2011 Webdesign Assessoria em Tecnilogia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

// Include helper file once
require_once dirname(__FILE__).'/helper.php';

if ($params->def('prepare_content', 1))
{
	JPluginHelper::importPlugin('content');
	$module->content = JHtml::_('content.prepare', $module->content);
}

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_weimagelist', $params->get('layout', 'default'));
