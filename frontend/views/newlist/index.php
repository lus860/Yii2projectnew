
<?php
use yii\helpers\Html;
use common\widgets\newlist\NewsWidget;
?>
    <!-- ##### Hero Area Start ##### -->
    <section class="hero--area section-padding-80">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="post-1" role="tabpanel" aria-labelledby="post-1-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='/img/bg-img/'.$newlists[0]->img;?>);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">

                                    <?= Html::a("", ['newlist/grid', 'category'=> $newlists[0]->categoryName ], ['class' => 'post-cata']) ?>
                                    <?= Html::a("", ['newlist/single', 'id' => $newlists[0]->id, 'category'=> $newlists[0]->categoryName ], ['class' => 'post-title']) ?>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlists[0]->likes_count?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newlists[0]->views_count?></a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">
                                    <?= Html::a("5:03", ['newlist/video', 'id' => $newlists[0]->id, 'category'=> $newlists[0]->categoryName ], ['class' => 'post-title']) ?>
                                </span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="post-2" role="tabpanel" aria-labelledby="post-2-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/8.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">
                                    05.03
                                </span>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="post-3" role="tabpanel" aria-labelledby="post-3-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/9.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="post-4" role="tabpanel" aria-labelledby="post-4-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/10.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="post-5" role="tabpanel" aria-labelledby="post-5-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/7.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="post-6" role="tabpanel" aria-labelledby="post-6-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/10.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="post-7" role="tabpanel" aria-labelledby="post-7-tab">
                            <!-- Single Feature Post -->
                            <div class="single-feature-post video-post bg-img" style="background-image: url(/img/bg-img/7.jpg);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata">Sports</a>
                                    <a href="single-post.html" class="post-title">Reunification of migrant toddlers, parents should be completed Thursday</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 25</a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">05.03</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <ul class="nav vizew-nav-tab" role="tablist">
                         <?php foreach ($newlists as $newlist):?>
                        <li class="nav-item">
                            <a class="nav-link active" id="post-1-tab" data-toggle="pill" href="#post-1" role="tab" aria-controls="post-1" aria-selected="true">
                                <!-- Single Blog Post -->
                                <div class="single-blog-post style-2 d-flex align-items-center">
                                    <div class="post-thumbnail">
                                        <img src="<?='/img/bg-img/'.$newlist->img ?>" alt="">
                                    </div>
                                    <div class="post-content">
                                        <h6 class="post-title">
                                            <?= $newlist->title; ?>
                                        </h6>
                                        <div class="post-meta d-flex justify-content-between">
                                            <span><i class="fa fa-comments-o" aria-hidden="true"></i> 25</span>
                                            <span><i class="fa fa-eye" aria-hidden="true"></i><?=$newlist->likes_count?></span>
                                            <span><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newlist->views_count?></span>
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
                            <img src="<?='/img/bg-img/'.$newviwe->img?>" alt="" style="width: 100%;">

                            <!-- Video Duration -->
                            <span class="video-duration">
                                <?= Html::a("5:03", ['newlist/video', 'id' => $newviwe->id, 'category'=> $newviwe->categoryName ], ['class' => 'post-title']) ?>

                            </span>
                        </div>

                        <!-- Post Content -->
                        <div class="post-content">
                            <?= Html::a("$newviwe->categoryName", ['newlist/grid', 'category'=> $newviwe->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                            <?= Html::a("$newviwe->title", ['newlist/single', 'id' => $newviwe->id, 'category'=> $newviwe->categoryName ], ['class' => 'post-title']) ?>
                            <div class="post-meta d-flex">
                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newviwe->views_count?></a>
                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newviwe-> likes_count?></a>
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
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='/img/bg-img/'.$newlike->img?>);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$newlike->categoryName", ['newlist/grid', 'category'=> $newlike->categoryName ], ['class' => 'post-cata']) ?>
                                    <?= Html::a("$newlike->title", ['newlist/single', 'id' => $newlike->id, 'category'=> $newlike->categoryName ], ['class' => 'post-title']) ?>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlike->views_count?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i><?=$newlike-> likes_count?></a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">
                                    <?= Html::a("5:03", ['newlist/video', 'id' => $newlike->id, 'category'=> $newlike->categoryName ], ['class' => 'post-title']) ?>

                                </span>
                            </div>
                            <?php endforeach;?>
                        </div>

                        <div class="row">
                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="/img/bg-img/12.jpg" alt="">

                                        <!-- Video Duration -->
                                        <span class="video-duration">05.03</span>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata cata-sm cata-danger">Game</a>
                                        <a href="single-post.html" class="post-title">Searching for the 'angel' who held me on Westminste Bridge</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 28</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 17</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-md-6">
                                <div class="single-post-area mb-80">
                                    <!-- Post Thumbnail -->
                                    <div class="post-thumbnail">
                                        <img src="img/bg-img/13.jpg" alt="">

                                        <!-- Video Duration -->
                                        <span class="video-duration">05.03</span>
                                    </div>

                                    <!-- Post Content -->
                                    <div class="post-content">
                                        <a href="#" class="post-cata cata-sm cata-primary">Business</a>
                                        <a href="single-post.html" class="post-title">Love Island star's boyfriend found dead after her funeral</a>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 38</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <img src="<?='/img/bg-img/'.$new->img?>" alt="">

                                            <!-- Video Duration -->
                                            <span class="video-duration">
                                                <?= Html::a("5:03", ['newlist/video', 'id' => $new->id, 'category'=> $new->categoryName ], ['class' => 'post-title']) ?>
                                            </span>
                                        </div>

                                        <!-- Post Content -->
                                        <div class="post-content">
                                            <?= Html::a("$new->categoryName", ['newlist/grid', 'category'=> $new->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                                            <?= Html::a("$new->title", ['newlist/single', 'id' => $new->id, 'category'=> $new->categoryName ], ['class' => 'post-title']) ?>
                                            <div class="post-meta d-flex">
                                                <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                                <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$new->views_count?></a>
                                                <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$new->likes_count?></a>
                                            </div>
                                        </div>
                                    </div>
                                 <?php endforeach;?>

                                </div>
                            </div>
                          <?php endforeach;?>
                        </div>


                        <div class="row mb-30">
                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="img/bg-img/16.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Epileptic boy's cannabis let through border</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="img/bg-img/18.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Paramedics 'drilled into boat death woman'</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="img/bg-img/19.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Tory vice-chairs quit over PM's Brexit plan</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="col-12 col-lg-6">
                                <div class="single-blog-post style-3 d-flex mb-50">
                                    <div class="post-thumbnail">
                                        <img src="img/bg-img/20.jpg" alt="">
                                    </div>
                                    <div class="post-content">
                                        <a href="single-post.html" class="post-title">Do This One Simple Action for an Absolutely</a>
                                        <div class="post-meta d-flex justify-content-between">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 16</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 26</a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 17</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                            <div class="single-feature-post video-post bg-img" style="background-image: url(<?='img/bg-img/'.$newtime->img ?>);">
                                <!-- Play Button -->
                                <a href="video-post.html" class="btn play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$newtime->categoryName", ['newlist/grid', 'category'=> $newtime->categoryName  ], ['class' => 'post-cata ']) ?>
                                    <?= Html::a("$newtime->title", ['newlist/single', 'id' => $newtime->id, 'category'=> $newtime->categoryName  ], ['class' => 'post-title ']) ?>

                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newtime->views_count?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newtime->likes_count?></a>
                                    </div>
                                </div>

                                <!-- Video Duration -->
                                <span class="video-duration">
                                         <?= Html::a("5:03", ['newlist/video', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title']) ?>
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
                                        <img src="<?='img/bg-img/'.$newtime->img ?>" alt="" style="width: 100%;">

                                        <!-- Video Duration -->
                                        <span class="video-duration">
                                           <?= Html::a("5:03", ['newlist/video', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title']) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <!-- Post Content -->
                                    <div class="post-content mt-0">
                                        <?= Html::a("$newtime->categoryName", ['newlist/grid', 'category'=> $newtime->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                                        <?= Html::a("$newtime->title", ['newlist/single', 'id' => $newtime->id, 'category'=> $newtime->categoryName ], ['class' => 'post-title mb-2']) ?>

                                        <div class="post-meta d-flex align-items-center mb-2">
                                            <a href="#" class="post-author">By Jane</a>
                                            <i class="fa fa-circle" aria-hidden="true"></i>
                                            <a href="#" class="post-date"><?=$newtime->created_at?></a>
                                        </div>
                                        <p class="mb-2"><?=substr($newtime->content, 0, 100)?></p>
                                        <div class="post-meta d-flex">
                                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newtime->views_count?></a>
                                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newtime->likes_count?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>

                <?php echo NewsWidget::widget(); ?>
            </div>
        </div>
    </section>
