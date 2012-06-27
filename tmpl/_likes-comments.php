<?php
/**
 * @version     $Id$
 * @copyright   Copyright 2011 Stilero AB. All rights re-served.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

//No direct access
defined('_JEXEC) or die;');
$likes = $image['likes'] > 1000 ? substr($image['likes'], -3, 3).'K+' : $image['likes'];
$comments = $image['comments'] > 1000 ? substr($image['comments'], -3, 3).'K+' : $image['comments'];
$likeImage = $modulePath.'images'.DS.'likeheart.png';
$commentImage = $modulePath.'images'.DS.'comments.png';
$userProfile = '<span class="username">'.substr($image['user-name'], 0, 12).'*</span>';
?>
<div class="likes-comments"><span class="userimg"><img class="usericon" src="<?php print $image['user-profilepic'] ?>" /></span><span class="likes"><img class="instaicon" src="<?php print $likeImage ?>" /><?php print $likes; ?></span><span class="comments"><img class="instaicon" src="<?php print $commentImage ?>" /><?php print $comments; ?></span></div>