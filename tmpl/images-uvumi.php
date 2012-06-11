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
$document->addStyleSheet($modulePath.'css'.DS.'uvumi'.DS.'uvumi-gallery.css');
//$document->addStyleSheet($modulePath.'css'.DS.'style.css');
$userInfo = $Instagram->fetchImages('self', $params->get('image_count', '30'), $params->get('display_type', ''));
//JHtmlBehavior::framework();
//JHtmlBehavior::framework(true);
$document->addScript($modulePath.'js'.DS.'uvumi'.DS.'mootools-for-gallery.js');
$document->addScript($modulePath.'js'.DS.'uvumi'.DS.'UvumiGallery-compressed.js');
$js = "new UvumiGallery({
container:'small-gallery',
thumbSize:80,
spacing:20
});";
$document->addScriptDeclaration($js);
?>
<h2><?php echo $module->title; ?></h2>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div id="gallery">
        <?php foreach ($userInfo as $image) { ?>
        <a href="<?php echo $image['full'];?>"><img src="<?php echo $image['thumb'] ?>" alt="<?php echo $image['caption'] ?>"/></a>
        <?php } ?>
    </div>
 <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
