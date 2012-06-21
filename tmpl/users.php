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
$images = $Instagram->fetchUserInfoArray('self');
JHTML::_('behavior.modal', 'a.instaimage');
?>
<h2><?php echo $module->title; ?></h2>
<div class="instauser<?php echo $moduleclass_sfx; ?>">
    <p class="pre-text"><?php echo $params->get('pre_text', ''); ?></p>
    <div class="instauserinfo">
        <span class="instaprofile">
            <img src="<?php echo $images['profile_picture']; ?>" />
        </span>
        <span class="instauser"><h2><?php echo $images['username'] ?></h2></span>
        <span class="instaname"><h3><?php echo $images['full_name'] ?></h3></span>
        <span class="instabio"><p><?php echo $images['bio'] ?></p></span>
        <span class="instaweb"><a href="<?php echo $images['website'] ?>" target="_blank">Website</a></span>
        <span class="instacounts">
            <span class="instamedia"><?php echo $images['media'] ?></span>
            <span class="instafollows"><?php echo $images['follows'] ?></span>
            <span class="instafollowers"><?php echo $images['followed_by'] ?></span>
        </span>
    </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
