<?php
/**
 * @package	Instagram Module
 * @subpackage	mod_instagram
 * @copyright	Copyright (C) 2012 Stilero Webdesign. All rights reserved.
 * @license	GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
$postParams = null;
$imageCount = $params->get('image_count', '30');
$galleryType = 'images-'.$params->get('gallery_type', 'default');
$displayType = $params->get('display_type', 'user-recent');
switch ($displayType) {
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
$userName = $params->get('user_name', 'self');
$userID = $userName;
if($userName != 'self'){
    $userInfoJSON = $Instagram->fetchInfo($userName, 'users-search');
    $userID = $userInfoJSON->data[0]->id;
}
if($displayType=='user-followers' || $displayType=='user-follows'){
    
    $followersJSON = $Instagram->fetchInfo($userID, $displayType);
    $followers = $followersJSON->data;
    $images = array();
    if(empty($followers)){
        return;
    }
    foreach ($followers as $follower) {
        $image['full'] = $follower->profile_picture;
        $image['thumb'] = $follower->profile_picture;
        $image['caption'] = $follower->username;
        $images[] = $image;
    }
    
}else{
    $images = $Instagram->fetchImages($userID, $imageCount, $displayType, $postParams);
}
    require JModuleHelper::getLayoutPath('mod_instagram', $galleryType);

?>