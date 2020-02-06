<?php
use yii\helpers\Html;
use yii\helpers\Url;
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
            <?php foreach ($newlatests as $newlatest):?>
            <div class="single-post-area mb-30">
                <!-- Post Thumbnail -->
                <div class="post-thumbnail">
                    <img src="<?='/img/bg-img/'.$newlatest->img?>" alt="" style="width: 100%;">

                    <!-- Video Duration -->
                    <span class="video-duration">
                        <?= Html::a("5:03", ['newlist/video', 'id' => $newlatest->id, 'category'=> $newlatest->categoryName ], ['class' => 'post-title']) ?>

                    </span>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    <?= Html::a("$newlatest->categoryName", ['newlist/grid', 'category'=> $newlatest->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                    <?= Html::a("$newlatest->title", ['newlist/single', 'id' => $newlatest->id, 'category'=> $newlatest->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlatest->views_count?></a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newlatest->likes_count?></a>
                    </div>
                </div>
            </div>
            <?php break;?>
            <?php endforeach;?>

            <!-- Single Blog Post -->
            <?php foreach ($newlatests as $newlatest):?>
            <?php if($newlatest==$newlatests[0]){
                continue;
                }?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?='/img/bg-img/'.$newlatest->img?>" alt="">
                </div>
                <div class="post-content">
                    <?= Html::a("$newlatest->title", ['newlist/single', 'id' => $newlatest->id, 'category'=> $newlatest->categoryName ], ['class' => 'post-title']) ?>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 29</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 08</a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23</a>
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
        <div class="single-post-area mb-30">
            <!-- Post Thumbnail -->
            <div class="post-thumbnail">
                <img src="<?='/img/bg-img/'.$newlikes->img?>" alt="" style="width: 100%;">

                <!-- Video Duration -->
                <span class="video-duration">
                        <?= Html::a("5:03", ['newlist/video', 'id' => $newlikes->id, 'category'=> $newlikes->categoryName ], ['class' => 'post-title']) ?>

                    </span>
            </div>

            <!-- Post Content -->
            <div class="post-content">
                <?= Html::a("$newlikes->categoryName", ['newlist/grid', 'category'=> $newlikes->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                <?= Html::a("$newlikes->title", ['newlist/single', 'id' => $newlikes->id, 'category'=> $newlikes->categoryName ], ['class' => 'post-title']) ?>
                <div class="post-meta d-flex">
                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlikes->views_count?></a>
                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newlikes->likes_count?></a>
                </div>
            </div>
        </div>


        <!-- ***** Sidebar Widget ***** -->
        <div class="single-widget youtube-channel-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Hot Channels</h4>
                <div class="line"></div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <img src="/img/bg-img/25.jpg" alt="">
                </div>
                <div class="youtube-channel-content">
                    <a href="single-post.html" class="channel-title">Music Channel</a>
                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <img src="/img/bg-img/26.jpg" alt="">
                </div>
                <div class="youtube-channel-content">
                    <a href="single-post.html" class="channel-title">Trending Channel</a>
                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <img src="/img/bg-img/27.jpg" alt="">
                </div>
                <div class="youtube-channel-content">
                    <a href="single-post.html" class="channel-title">Travel Channel</a>
                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <img src="/img/bg-img/28.jpg" alt="">
                </div>
                <div class="youtube-channel-content">
                    <a href="single-post.html" class="channel-title">Sport Channel</a>
                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>

            <!-- Single YouTube Channel -->
            <div class="single-youtube-channel d-flex align-items-center">
                <div class="youtube-channel-thumbnail">
                    <img src="/img/bg-img/29.jpg" alt="">
                </div>
                <div class="youtube-channel-content">
                    <a href="single-post.html" class="channel-title">TV Show Channel</a>
                    <a href="#" class="btn subscribe-btn"><i class="fa fa-play-circle-o" aria-hidden="true"></i> Subscribe</a>
                </div>
            </div>
        </div>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget newsletter-widget mb-50">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Newsletter</h4>
                <div class="line"></div>
            </div>
            <p>Subscribe our newsletter gor get notification about new updates, information discount, etc.</p>
            <!-- Newsletter Form -->
            <div class="newsletter-form">
                <form action="#" method="post">
                    <input type="email" name="nl-email" class="form-control mb-15" id="emailnl" placeholder="Enter your email">
                    <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
                </form>
            </div>
        </div>

        <!-- ***** Single Widget ***** -->
        <div class="single-widget">
            <!-- Section Heading -->
            <div class="section-heading style-2 mb-30">
                <h4>Most Viewed Playlist</h4>
                <div class="line"></div>
            </div>

            <!-- Single Blog Post -->
            <?php foreach ($newviwes as $newviwe):?>
            <div class="single-blog-post d-flex">
                <div class="post-thumbnail">
                    <img src="<?='/img/bg-img/'.$newviwe->img?>" alt="">
                </div>
                <div class="post-content">
                    <a href="single-post.html" class="post-title"><?=substr($newviwe->title,0,50)?></a>
                    <div class="post-meta d-flex justify-content-between">
                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newviwe->views_count?></a>
                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$newviwe->likes_count?></a>
                    </div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
</div>