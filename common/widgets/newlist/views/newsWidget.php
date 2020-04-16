<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\newlist\NewsletterWidget;
?>
<div class="col-12 col-md-6 col-lg-4">
    <div class="sidebar-area">

        <!-- ***** Single Widget ***** -->
        <div class="single-widget followers-widget mb-50">
            <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span class="counter">198</span><span>Fan</span></a>
            <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span class="counter">220</span><span>Followers</span></a>
            <a href="#" class="google"><i class="fa fa-google" aria-hidden="true"></i><span class="counter">140</span><span>Subscribe</span></a>
        </div>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget latest-video-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Latest Video</h4>
                <div class="line"></div>
            </div>

            <!-- Single Blog Post -->
            <?php foreach ($newlatestswidget as $newlatestwidget):?>
            <div class="single-post-area mb-30">
                <!-- Post Thumbnail -->
                <div class="post-thumbnail">
                    <img src="<?='/images/news/'.$newlatestwidget->id.'.jpg'?>" alt="" style="width: 100%;">

                    <!-- Video Duration -->
                    <span class="video-duration">
                        <?= Html::a($newlatestwidget->video_time, ['newlist/video', 'id' => $newlatestwidget->id, 'category'=> $newlatestwidget->categoryName ], ['class' => 'post-title']) ?>
                    </span>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("$newlatestwidget->categoryName", ['newlist/grid', 'category'=> $newlatestwidget->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("$newlatestwidget->title", ['newlist/single', 'id' => $newlatestwidget->id, 'category'=> $newlatestwidget->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$newlatestwidget->getCountComment($newlatestwidget->id)?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlatestwidget->views_count?></a>
                        <?php if($newlatestwidget->getLikeIcone($newlatestwidget->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlatestwidget->id?>"><?=$newlatestwidget->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlatestwidget->id?>"><?=$newlatestwidget->likes_count?></i></a>
                        <?php };?>
                    </div>
                </div>
            </div>
            <?php break;?>
            <?php endforeach;?>

            <!-- Single Blog Post -->
            <?php foreach ($newlatestswidget as $newlatestwidget):?>
            <?php if($newlatestwidget == $newlatestswidget[0]){
                continue;}?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?='/images/news/'.$newlatestwidget->id.'.jpg'?>" alt="">
                </div>
                <div class="post-content">
                    <?= Html::a("$newlatestwidget->title", ['newlist/single', 'id' => $newlatestwidget->id, 'category'=> $newlatestwidget->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$newlatestwidget->getCountComment($newlatestwidget->id)?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$newlatestwidget->views_count?></a>
                        <?php if($newlatestwidget->getLikeIcone($newlatestwidget->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlatestwidget->id?>"><?=$newlatestwidget->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlatestwidget->id?>"><?=$newlatestwidget->likes_count?></i></a>
                        <?php };?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
         </div>

        <!-- ***** Single Widget ***** -->
        <div class="section-heading style-2 mb-30">
            <h4>Best Video</h4>
            <div class="line"></div>
        </div>
        <?php foreach ($newlikesswidget as $newlikeswidget):?>

        <div class="single-post-area mb-30">
            <!-- Post Thumbnail -->
            <div class="post-thumbnail">
                <img src="<?='/images/news/'.$newlikeswidget->id.'.jpg'?>" alt="" style="width:100%;">

                <!-- Video Duration -->
                <span class="video-duration">
                        <?= Html::a($newlikeswidget->video_time, ['newlist/video', 'id' => $newlikeswidget->id, 'category'=> $newlikeswidget->categoryName ], ['class' => 'post-title']) ?>
                </span>
            </div>

            <!-- Post Content -->
            <div class="post-content">
                <?= Html::a("$newlikeswidget->categoryName", ['newlist/grid', 'category'=> $newlikeswidget->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                <?= Html::a("$newlikeswidget->title", ['newlist/single', 'id' => $newlikeswidget->id, 'category'=> $newlikeswidget->categoryName ], ['class' => 'post-title']) ?>
                <div class="post-meta d-flex">
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$newlikeswidget->getCountComment($newlikeswidget->id)?></i></a>
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlikeswidget->views_count?></a>
                    <?php if($newlikeswidget->getLikeIcone($newlikeswidget->id) == null){?>
                        <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlikeswidget->id?>"><?=$newlikeswidget->likes_count?></i></a>
                    <?php } else {?>
                        <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlikeswidget->id?>"><?=$newlikeswidget->likes_count?></i></a>
                    <?php };?>
                </div>
            </div>
        </div>

        <?php break;
        endforeach;?>

        <!-- ***** Sidebar Widget ***** -->
        <?php echo NewsletterWidget::widget(); ?>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Most Viewed Playlist</h4>
                <div class="line"></div>
            </div>

            <!-- Single Blog Post -->
            <?php foreach ($newviweswidget as $newviwewidget):?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?='/images/news/'.$newviwewidget->id.'.jpg'?>" alt="">
                </div>
                <div class="post-content">
                    <?= Html::a(substr($newviwewidget->title,0,50), ['newlist/single', 'id' => $newviwewidget->id, 'category'=> $newviwewidget->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"><?=$newviwewidget->getCountComment($newviwewidget->id)?></i></a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newviwewidget->views_count?></a>
                        <?php if($newviwewidget->getLikeIcone($newviwewidget->id) == null){?>
                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newviwewidget->id?>"><?=$newviwewidget->likes_count?></i></a>
                        <?php } else {?>
                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newviwewidget->id?>"><?=$newviwewidget->likes_count?></i></a>
                        <?php };?>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
</div>