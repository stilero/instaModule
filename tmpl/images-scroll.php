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
$document->addScript($modulePath.'js'.DS.'scrollGallery.js');
$js = "window.addEvent('domready', function() {
    var myscrollGallery = new scrollGallery();
});";
$document->addScriptDeclaration($js);
?>
<h2><?php echo $module->title; ?></h2>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div id="gallery">
    <div id="scrollGalleryHead">     
        <div id="thumbarea">
            <div id="thumbareaContent">
                <?php foreach ($userInfo as $image) { ?>
                    <img  src="<?php echo $image['thumb'] ?>" width="120" height="80" alt="" />
                <?php } ?>
            </div> 
        </div> 
    </div>
    <div id="scrollGalleryFoot">
        <div id="imagearea">
            <div id="imageareaContent">
                <?php foreach ($userInfo as $image) { ?>
                    <img  src="<?php echo $image['full'];?>" alt="" />
                <?php } ?>
            </div> 
        </div> 
    </div>
    </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
