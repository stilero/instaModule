<?php defined('_JEXEC') or die('Restricted access'); ?>
<div class="wk-gallery wk-gallery-wall clearfix polaroid ">
    <?php 
        $i = 1; 
        foreach ($images as $image) {
            if ($i++ > $imageCount){
                break;
            }
            if(!empty($image)){
                print '<a class="" href="'.$image['full'].'" data-lightbox="group:25-4fa6cb3aaf15c" title="'.$image['caption'].'">';
                print '<div>';
                print '<img src="'.$image['thumb'].'" alt="'.$image['caption'].'" height="150" width="150" />';
                print '<p class="title">'.substr($image['caption'], 0, 20).'</p>';
                print '</div>';
                print '</a>';
            }
         } 
         ?>
</div>