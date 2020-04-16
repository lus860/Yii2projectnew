<?php

use common\models\Category;
use common\models\NewlistsCategory;
use common\models\Newlist;
use yii\helpers\Url;
?>
<div class="col-12 col-sm-6 col-xl-3">
    <div class="footer-widget mb-70">
        <h6 class="widget-title"><?=ucfirst($namewidget)?> Videos</h6>
        <!-- Single Blog Post -->
        <?php foreach ($footerwidget as $itemwidget):?>
        <div class="single-blog-post d-flex">
            <div class="post-thumbnail">
                <img src="<?='/images/news/'.$itemwidget->id.'.jpg'?>" alt="">
            </div>
            <div class="post-content">
                <a href="<?=Url::to(['newlist/video','id' => $itemwidget->id, 'category'=> $namewidget])?>" class="post-title"><?=$itemwidget->getShortText($itemwidget->title,30)?></a>
                <div class="post-meta d-flex justify-content-between">
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$itemwidget->getCountComment($itemwidget->id)?></i></a>
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$itemwidget->views_count?></a>
                    <?php if($itemwidget->getLikeIcone($itemwidget->id) == null){?>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"><?=$itemwidget->likes_count?></i></a>
                    <?php } else {?>
                        <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"><?=$itemwidget->likes_count?></i></a>
                    <?php };?>
                </div>
            </div>
        </div>
<?php endforeach;?>

    </div>
</div>