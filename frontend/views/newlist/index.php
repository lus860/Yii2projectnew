<?php
use yii\helpers\Html;
use common\widgets\newlist\NewsWidget;
use common\widgets\newlist\NewsletterWidget;
?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content">
                        <?php foreach ($newlists as $newlist):?>
                        <div class="tab-pane fade <?php if($newlist->id ==1){echo 'active show';}?>" id="<?='post-'.$newlist->id?>" role="tabpanel" aria-labelledby="<?='post-'.$newlist->id.'-tab'?>">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='/images/news/'.$newlist->id.'.jpg'?>);">
                                <!-- Play Button -->
<!--                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>-->
                                <?= Html::a("<i class=\"fa fa-play\" aria-hidden=\"true\"></i>", ['newlist/video', 'id' => $newlist->id, 'category'=> $newlist->categoryName ], ['class' => 'btn play-btn']) ?>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata"><?=ucfirst($newlist->categoryName)?></a>
                                    <?= Html::a("$newlist->title", ['newlist/single', 'id' => $newlist->id, 'category'=> $newlist->categoryName ], ['class' => 'post-title']) ?>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newlist->getCountComment($newlist->id)?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$newlist->views_count?></a>
                                        <?php if($newlist->getLikeIcone($newlist->id) == null){?>
                                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlist->id?>"><?=$newlist->likes_count?></i></a>
                                        <?php } else {?>
                                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlist->id?>"><?=$newlist->likes_count?></i></a>
                                        <?php };?>
                                        <?php if($newlist->getFavoriteIcone($newlist->id)){?>
                                            <a href="#"><i data-id="<?=$newlist->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                        <?php } else {?>
                                            <a href="#"><i data-id="<?=$newlist->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                        <?php };?>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration"><?=$newlist->video_time?></span>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav vizew-nav-tab" role="tablist">
                         <?php foreach ($newlists as $newlist):?>
                        <li class="nav-item">
                            <a class="nav-link <?php if($newlist->id ==1){echo 'active show';}?>" id="<?='post-'.$newlist->id.'-tab'?>" data-toggle="pill" href="<?='#post-'.$newlist->id?>" role="tab" aria-controls="<?='post-'.$newlist->id?>" aria-selected="true">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumbnail">
                                        <img src="<?='/images/news/'.$newlist->id.'.jpg' ?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <h6 class="post-title">
                                            <?= $newlist->title; ?>
                                        </h6>
                                        <div class="post-meta d-flex justify-content-between">
                                            <span><i class="fa fa-comments-o" aria-hidden="true"><?=$newlist->getCountComment($newlist->id)?></i></span>
                                            <span><i class="fa fa-eye" aria-hidden="true"><?=$newlist->views_count?></i></span>
                                            <?php if($newlist->getLikeIcone($newlist->id) == null){?>
                                            <span><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlist->id?>"><?=$newlist->likes_count?></i></span>
                                            <?php } else {?>
                                            <span><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlist->id?>"><?=$newlist->likes_count?></i></span>
                                            <?php };?>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach;?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Trending Posts Area Start ##### -->
    <section class="trending-posts-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Section Heading -->
                    <div class="section-heading">
                        <h4>Trending Videos</h4>
                        <div class="line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post -->
                <?php foreach ($newviwes as $newviwe):?>
                <div class="col-12 col-md-4">
                    <div class="single-post-area mb-80">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <img src="<?='/images/news/'.$newviwe->id.'.jpg'?>" alt="" style="width: 100%;height: 240px;">

                            <!-- Video Duration -->
                            <span class="video-duration">
                                <?= Html::a($newviwe->video_time, ['newlist/video', 'id' => $newviwe->id, 'category'=> $newviwe->categoryName ], ['class' => 'post-title']) ?>

                            </span>
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            <?= Html::a("$newviwe->categoryName", ['newlist/grid', 'category'=> $newviwe->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                            <?= Html::a("$newviwe->title", ['newlist/single', 'id' => $newviwe->id, 'category'=> $newviwe->categoryName ], ['class' => 'post-title']) ?>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newviwe->getCountComment($newviwe->id)?></a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newviwe->views_count?></a>
                                <?php if($newviwe->getLikeIcone($newviwe->id) == null){?>
                                <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newviwe->id?>"><?=$newviwe->likes_count?></i></a>
                                <?php } else {?>
                                    <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newviwe->id?>"><?=$newviwe->likes_count?></i></a>
                                <?php };?>
                                <?php if($newviwe->getFavoriteIcone($newviwe->id)){?>
                                    <a href="#"><i data-id="<?=$newviwe->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                <?php } else {?>
                                    <a href="#"><i data-id="<?=$newviwe->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                <?php };?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <!-- ##### Trending Posts Area End ##### -->

    <!-- ##### Vizew Post Area Start ##### -->
    <section class="vizew-post-area mb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="all-posts-area">
                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Featured Videos</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <?php foreach ($newlikes as $newlike) :?>
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='/images/news/'.$newlike->id.'.jpg'?>);">
                                <!-- Play Button -->
                                <?= Html::a("<i class=\"fa fa-play\" aria-hidden=\"true\"></i>", ['newlist/video', 'id' => $newlist->id, 'category'=> $newlist->categoryName ], ['class' => 'btn play-btn']) ?>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$newlike->categoryName", ['newlist/grid', 'category'=> $newlike->categoryName ], ['class' => 'post-cata']) ?>
                                    <?= Html::a("$newlike->title", ['newlist/single', 'id' => $newlike->id, 'category'=> $newlike->categoryName ], ['class' => 'post-title']) ?>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newlike->getCountComment($newlike->id)?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlike->views_count?></a>
                                        <?php if($newlike->getLikeIcone($newlike->id) == null){?>
                                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlike->id?>"><?=$newlike->likes_count?></i></a>
                                        <?php } else {?>
                                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlike->id?>"><?=$newlike->likes_count?></i></a>
                                        <?php };?>
                                        <?php if($newlike->getFavoriteIcone($newlike->id)){?>
                                            <a href="#"><i data-id="<?=$newlike->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                        <?php } else {?>
                                            <a href="#"><i data-id="<?=$newlike->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                        <?php };?>
                                    </div>
                                </div>
                                <!-- Video Duration -->
                                <span class="video-duration">
                                    <?= Html::a($newlike->video_time, ['newlist/video', 'id' => $newlike->id, 'category'=> $newlike->categoryName ], ['class' => 'post-title']) ?>
                                </span>
                            </div>
                            <?php endforeach;?>
                        </div>


                        <div class="row">
                         <?php foreach ($categorlists as $categorlist):?>
                            <div class="col-12 col-lg-6">
                                <!-- Section Heading -->
                                <div class="section-heading style-2">
                                    <h4><?=ucfirst($categorlist->name)?> Videos</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Sports Video Slides -->
                                <div class="sport-video-slides owl-carousel mb-50">
                                    <!-- Single Blog Post -->
                                    <?php foreach ($categorlist->getNewlist()->all() as $new):?>
                                    <div class="single-post-area">
                                        <!-- Post Thumbnail -->
                                        <div class="post-thumbnail">
                                            <img src="<?='/images/news/'.$new->id.'.jpg'?>" alt="">

                                            <!-- Video Duration -->
                                            <span class ="video-duration">
                                                <?= Html::a($new->video_time, ['newlist/video', 'id' => $new->id, 'category'=> $new->categoryName ], ['class' => 'post-title']) ?>
                                            </span>
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <?= Html::a("$new->categoryName", ['newlist/grid', 'category'=> $new->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                                            <?= Html::a("$new->title", ['newlist/single', 'id' => $new->id, 'category'=> $new->categoryName ], ['class' => 'post-title']) ?>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$new->getCountComment($new->id)?></a>
                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$new->views_count?></a>
                                                <?php if($new->getLikeIcone($new->id) == null){?>
                                                    <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$new->id?>"><?=$new->likes_count?></i></a>
                                                <?php } else {?>
                                                    <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$new->id?>"><?=$new->likes_count?></i></a>
                                                <?php };?>
                                                <?php if($new->getFavoriteIcone($new->id)){?>
                                                    <a href="#"><i data-id="<?=$new->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                                <?php } else {?>
                                                    <a href="#"><i data-id="<?=$new->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                                <?php };?>
                                            </div>
                                        </div>
                                    </div>
                                 <?php endforeach;?>

                                </div>
                            </div>
                          <?php endforeach;?>
                        </div>


                        <!-- Section Heading -->
                        <div class="section-heading style-2">
                            <h4>Latest News</h4>
                            <div class="line"></div>
                        </div>

                        <!-- Featured Post Slides -->
                        <div class="featured-post-slides owl-carousel mb-30">
                            <!-- Single Feature Post -->
                            <?php foreach ($newtimes as $newtime):?>
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='/images/news/'.$newtime->id.'.jpg' ?>);">
                                <!-- Play Button -->
                                <?= Html::a("<i class=\"fa fa-play\" aria-hidden=\"true\"></i>", ['newlist/video', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'btn play-btn']) ?>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$newtime->categoryName", ['newlist/grid', 'category'=> $newtime->categoryName  ], ['class' => 'post-cata ']) ?>
                                    <?= Html::a("$newtime->title", ['newlist/single', 'id' => $newtime->id, 'category'=> $newtime->categoryName  ], ['class' => 'post-title ']) ?>

                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newtime->getCountComment($newtime->id)?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newtime->views_count?></a>
                                        <?php if($newtime->getLikeIcone($newtime->id) == null){?>
                                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newtime->id?>"><?=$newtime->likes_count?></i></a>
                                        <?php } else {?>
                                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newtime->id?>"><?=$newtime->likes_count?></i></a>
                                        <?php };?>
                                        <?php if($newtime->getFavoriteIcone($newtime->id)){?>
                                            <a href="#"><i data-id="<?=$newtime->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                        <?php } else {?>
                                            <a href="#"><i data-id="<?=$newtime->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                        <?php };?>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">
                                         <?= Html::a($newtime->video_time, ['newlist/video', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title']) ?>
                                </span>
                            </div>
                            <?php endforeach;?>
                        </div>

                        <!-- Single Post Area -->
                        <?php foreach($newtimes as $newtime):?>
                        <div class="single-post-area mb-30">
                            <div class="row align-items-center">
                                <div class="col-12 col-lg-6">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="<?='/images/news/'.$newtime->id.'.jpg' ?>" alt="" style="width: 100%;height: 200px;">

                                        <!-- Video Duration -->
                                        <span class="video-duration">
                                           <?= Html::a($newtime->video_time, ['newlist/video', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <?= Html::a("$newtime->categoryName", ['newlist/grid', 'category'=> $newtime->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                                        <?= Html::a("$newtime->title", ['newlist/single', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title mb-2']) ?>

                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author">Added</a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?=$newtime->created_at?></a>
                                        </div>
                                        <p class="mb-2"><?=$newtime->getShortText($newtime->content,100)?></p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newtime->getCountComment($newtime->id)?></a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newtime->views_count?></a>
                                            <?php if($newtime->getLikeIcone($newtime->id) == null){?>
                                                <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newtime->id?>"><?=$newtime->likes_count?></i></a>
                                            <?php } else {?>
                                                <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newtime->id?>"><?=$newtime->likes_count?></i></a>
                                            <?php };?>
                                            <?php if($newtime->getFavoriteIcone($newtime->id)){?>
                                                <a href="#"><i data-id="<?=$newtime->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                            <?php } else {?>
                                                <a href="#"><i data-id="<?=$newtime->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                            <?php };?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php echo NewsWidget::widget(['newlikes' => $newlikes, 'newviwes' => $newviwes, 'newlatest'=> $newtimes]); ?>

            </div>
        </div>
    </section>
