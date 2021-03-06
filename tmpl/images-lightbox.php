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
$document->addStyleSheet($modulePath.'css'.DS.'lightbox'.DS.'ppgallery.css');
$document->addStyleSheet($modulePath.'css'.DS.'lightbox'.DS.'dark-hive'.DS.'jquery-ui-1.8.6.custom.css');
$images = $Instagram->fetchImages('self', $params->get('image_count', '30'), $params->get('display_type', ''));
//$document->addScript($modulePath.'js'.DS.'jquery-1.7.2.min.js');
$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js');
$document->addScriptDeclaration('jQuery.noConflict();');
$document->addScript('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js');
$document->addScript($modulePath.'js'.DS.'lightbox'.DS.'ppgallery.js');
$js = "jQuery( function($) { $('#gallery').ppGallery(); });";
//$js = "jQuery( function($) { $('#gallery').replaceWith('<h2>New heading</h2>'); });";
$document->addScriptDeclaration($js);
?>
<h2><?php echo $module->title; ?></h2>
<div class="instagallery<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <ul id="gallery">
        <?php foreach ($images as $image) { ?>
           <li><a href="<?php echo $image['full'];?>"><img src="<?php echo $image['thumb'] ?>" /></a></li>
        <?php } ?>
    </ul>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
