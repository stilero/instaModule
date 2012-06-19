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
$document->addStyleSheet($modulePath.'css'.DS.'style.css');
$postParams = null;
$imageType = $params->get('display_type', '');
switch ($imageType) {
    case 'tags-name':
        $postParams = $params->get('tags_name', '');
        break;
    case 'media-search':
        $postParams = array(
            'latitude' => $params->get('latitude', ''),
            'longitude'  => $params->get('longitude', ''),
            'distance'  => $params->get('distance', '1000')
        );
        break;
    default:
        break;
}
$userInfo = $Instagram->fetchImages('self', $params->get('image_count', '30'), $params->get('display_type', ''), $postParams);
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
            print '<div class="instaimagecont">';
            if($params->get('link_type', '0') == '0'){
                require JModuleHelper::getLayoutPath('mod_instagram', '_image');
            }else if($params->get('link_type', '0') == '1'){
                require JModuleHelper::getLayoutPath('mod_instagram', '_instagram');
            }
            if($params->get('likes-comments', '0') == '1'){
                require JModuleHelper::getLayoutPath('mod_instagram', '_likes-comments');
            }
            print '</div>';
         } 
         ?>
    </div>
    <p class="post-text"><?php echo $params->get('post_text', ''); ?></p>
</div>
