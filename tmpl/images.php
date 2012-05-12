<?php
/**
 * @package	Instagram Module
 * @subpackage	mod_instagram
 * @copyright	Copyright (C) 2012 Stilero Webdesign. All rights reserved.
 * @license	GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$document =& JFactory::getDocument();
$document->addStyleSheet($modulePath.DS.'css'.DS.'style.css');
$userInfo = $Instagram->fetchImages('self', $params->get('image_count', '30'), $params->get('display_type', ''));
JHTML::_('behavior.modal', 'a.instaimage');
?>
<h2><?php echo $module->title; ?></h2>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div class="instaimages">
        <? $i = 1; ?>
        <?php foreach ($userInfo as $image) { ?>
            <? if ($i++ > $params->get('image_count', '30')){
                break;
            } ?>
            <?php require JModuleHelper::getLayoutPath('mod_instagram', '_image');?>
        <?php } ?>
    </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
