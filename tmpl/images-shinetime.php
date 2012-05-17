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
$galleryName = 'shinetime';
$document->addStyleSheet($modulePath.'css'.DS.'slides.css');
$userInfo = $Instagram->fetchImages('self', $params->get('image_count', '30'), $params->get('display_type', ''));
$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
$document->addScriptDeclaration('jQuery.noConflict()');
$document->addScript('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js');
$document->addScript($modulePath.'js'.DS.'slides.min.jquery.js');

$document->addScriptDeclaration('
    //$.noConflict();
    //jQuery.noConflict();
    jQuery( function($) {
        $("#slides").slides();
    });');
?>
<h2><?php echo $module->title; ?></h2>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div class="thumbnailimage">
        <div class="thumb_container">
            <div class="large_thumb"> 
                <img src="images/thumbnails/sample1.jpg" class="large_thumb_image" alt="thumb">   
                <img alt="" src="<?php echo $image['full'];?>" class="large_image" rel="Just because I can't code, doesn't mean I can't kick your ass!">
                <div class="large_thumb_border"> </div>
                <div class="large_thumb_shine"> </div>
            </div>
        </div>
    </div>
       

<div id="containertitle"><?php echo $module->title; ?></div>
<div class="mainframe">
    <div id="largephoto">
    <div id="loader"> </div>
    <div id="largecaption">
        <div class="captionShine"> </div>
        <div class="captionContent"> </div>
    </div>
    <div id="largetrans"> </div>
</div>
</div>

    
    
    
    
    <div id="slides">
            <div class="slides_container">
                <?php foreach ($userInfo as $image) { ?>
                <div>
                    <img src="<?php echo $image['full'];?>">
                </div>
                <?php } ?>
            </div>
        </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
