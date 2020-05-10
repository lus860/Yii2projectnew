<?php

use yii\helpers\Html;
use common\models\Newlist;

?>

<div class="vizew-pager-area">
    <?php if($prev):?>
        <div class="vizew-pager-prev">
            <p>PREVIOUS ARTICLE</p>
            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?='/images/news/'.$prev->id.'.jpg' ?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("  $prev->categoryName", ['newlist/grid', 'category'=>  $prev->categoryName], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("  $prev->title ", ['newlist/single', 'id' => $prev->id,'category'=>$prev->categoryName], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$prev->comment_count?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$prev->views_count?></a>
                        <?php if($prev->getLikeIcone($prev->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true" data-id="<?=$prev->id?>"><?=$prev->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true" data-id="<?=$prev->id?>"><?=$prev->likes_count?></i></a>
                        <?php };?>
                        <?php if($prev->getFavoriteIcone($prev->id)){?>
                            <a href="#"><i data-id="<?=$prev->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                        <?php } else {?>
                            <a href="#"><i data-id="<?=$prev->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                        <?php };?>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">
                       <?= Html::a($prev->video_time, ['newlist/video', 'id' => $prev->id, 'category'=> $prev->categoryName ], ['class' => 'post-title']) ?>
                    </span>
            </div>
        </div>
    <?php endif;?>
    <?php if($next):?>
        <div class="vizew-pager-next">


            <p>NEXT ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image:url(<?='/images/news/'.$next->id.'.jpg' ?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("  $next->categoryName ", ['newlist/grid', 'category'=>  $next->categoryName], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("  $next->title ", ['newlist/single', 'id' => $next->id,'category'=> $next->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$next->comment_count?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$next->views_count?></a>
                        <?php if($next->getLikeIcone($next->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$next->id?>"><?=$next->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$next->id?>"><?=$next->likes_count?></i></a>
                        <?php };?>
                        <?php if($next->getFavoriteIcone($next->id)){?>
                            <a href="#"><i data-id="<?=$next->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                        <?php } else {?>
                            <a href="#"><i data-id="<?=$next->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                        <?php };?>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">
                       <?= Html::a ($next->video_time, ['newlist/video', 'id' => $next->getNext()->id, 'category'=> $next->categoryName ], ['class' => 'post-title']); ?>
                    </span>
            </div>
        </div>
    <?php endif;?>
</div>