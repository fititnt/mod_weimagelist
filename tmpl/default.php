<?php
/*
 * @package         mod_weimagelist
 * @author          Emerson Rocha Luiz - emerson at webdesign.eng.br - fititnt -  http://fititnt.org
 * @copyright       Copyright (C) 2011 Webdesign Assessoria em Tecnilogia da Informacao. All rights reserved.
 * @license         GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

/* @var $this WeImageList */

/*
 * Note: this template have a few inline CSS because javascript overrides
 */
$i = 1;
?>
<div id="weimagelist<?php echo $moduleclass_sfx ?>">
	<ul class="weimagelist<?php echo $moduleclass_sfx ?>">
		<?php foreach ($list AS $item): ?>
			<li id="weimage<?php echo $moduleclass_sfx . '-' . $i ?>">
				<a href="<?php echo $item->link ?>">
					<img src="<?php echo $item->path ?>" />
					<h3 style="display: block; opacity: 0;"><?php echo $item->name ?></h3>
					<p style="display: block; opacity: 0;"><?php echo $item->desc ?></p>
				</a>
			</li>
			<?php
			++$i;
		endforeach;
		?>
	</ul>
</div>
