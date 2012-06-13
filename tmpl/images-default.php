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
JHtmlBehavior::framework();
JHtmlBehavior::framework(true);
JHTML::_('behavior.modal', 'a.instaimage');
?>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div class="instaimages">
        <?php 
        $i = 1; 
        $imagesToShow = $params->get('image_count', '30');
        foreach ($userInfo as $image) {
            if ($i++ > $imagesToShow){
                break;
            }
            require JModuleHelper::getLayoutPath('mod_instagram', '_image');
         } 
         ?>
    </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
