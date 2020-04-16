<?php

use yii\helpers\Html;
use common\models\Newlist;

?>

<div class="vizew-pager-area">
    <?php if($model->getPrev()):?>
        <div class="vizew-pager-prev">
            <p>PREVIOUS ARTICLE</p>
            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?='/images/news/'.$model->getPrev()->id.'.jpg' ?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("  $model->prevCategory", ['newlist/grid', 'category'=>  $model->prevCategory], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("  $model->prevTitle ", ['newlist/single', 'id' => $model->getPrev()->id,'category'=>$model->prevCategory], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$model->getCountComment($model->getPrev()->id)?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->getPrev()->views_count?></a>
                        <?php if($model->getLikeIcone($model->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->getPrev()->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->getPrev()->likes_count?></i></a>
                        <?php };?>
                        <?php if($model->getFavoriteIcone($model->id)){?>
                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                        <?php } else {?>
                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                        <?php };?>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">
                       <?= Html::a($model->video_time, ['newlist/video', 'id' => $model->getPrev()->id, 'category'=> $model->prevCategory ], ['class' => 'post-title']) ?>
                    </span>
            </div>
        </div>
    <?php endif;?>
    <?php if($model->getNext()):?>
        <div class="vizew-pager-next">


            <p>NEXT ARTICLE</p>

            <!-- Single Feature Post -->
            <div class="single-feature-post video-post bg-img pager-article" style="background-image:url(<?='/images/news/'.$model->getNext()->id.'.jpg' ?>);">
                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("  $model->nextCategory ", ['newlist/grid', 'category'=>  $model->nextCategory], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("  $model->nextTitle ", ['newlist/single', 'id' => $model->getNext()->id,'category'=> $model->nextCategory ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$model->getCountComment($model->getNext()->id)?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->getNext()->views_count?></a>
                        <?php if($model->getLikeIcone($model->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->getNext()->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->getNext()->likes_count?></i></a>
                        <?php };?>
                        <?php if($model->getFavoriteIcone($model->id)){?>
                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                        <?php } else {?>
                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                        <?php };?>
                    </div>
                </div>
                <!-- Video Duration -->
                <span class="video-duration">
                       <?= Html::a ($model->video_time, ['newlist/video', 'id' => $model->getNext()->id, 'category'=> $model->nextCategory ], ['class' => 'post-title']); ?>
                    </span>
            </div>
        </div>
    <?php endif;?>
</div>