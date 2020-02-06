<?php
use yii\helpers\Html;
use common\models\Newlist;
?>


    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Archives</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Reunification of migrant</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Pager Area Start ##### -->
    <div class="vizew-pager-area">
        <?php if($model->getPrev()):?>
            <div class="vizew-pager-prev">
                <p>PREVIOUS ARTICLE</p>
                <!-- Single Feature Post -->
                <div class="single-feature-post video-post bg-img pager-article" style="background-image: url(<?='/img/bg-img/'.$model->getPrev()->img ?>);">
                    <!-- Post Content -->
                    <div class="post-content">
                        <?= Html::a("  $model->prevCategory", ['newlist/grid', 'category'=>  $model->prevCategory], ['class' => 'post-cata cata-sm cata-success']) ?>
                        <?= Html::a("  $model->prevTitle ", ['newlist/single', 'id' => $model->getPrev()->id,'category'=>$model->prevCategory], ['class' => 'post-title']) ?>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 18</a>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->getPrev()->views_count?></a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$model->getPrev()->likes_count?></a>
                        </div>
                    </div>
                    <!-- Video Duration -->
                    <span class="video-duration">
                       <?= Html::a(" 5:03", ['newlist/video', 'id' => $model->getPrev()->id, 'category'=> $model->prevCategory ], ['class' => 'post-title']) ?>
                    </span>
                </div>
            </div>
        <?php endif;?>
        <?php if($model->getNext()):?>
            <div class="vizew-pager-next">


                <p>NEXT ARTICLE</p>

                <!-- Single Feature Post -->
                <div class="single-feature-post video-post bg-img pager-article" style="background-image:url(<?='/img/bg-img/'.$model->getNext()->img ?>);">
                    <!-- Post Content -->
                    <div class="post-content">
                        <?= Html::a("  $model->nextCategory ", ['newlist/grid', 'category'=>  $model->nextCategory], ['class' => 'post-cata cata-sm cata-success']) ?>
                        <?= Html::a("  $model->nextTitle ", ['newlist/single', 'id' => $model->getNext()->id,'category'=> $model->nextCategory ], ['class' => 'post-title']) ?>
                        <div class="post-meta d-flex">
                            <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 25</a>
                            <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->getPrev()->views_count?></a>
                            <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$model->getPrev()->likes_count?></a>
                        </div>
                    </div>
                    <!-- Video Duration -->
                    <span class="video-duration">
                       <?= Html::a (" 5:03", ['newlist/video', 'id' => $model->getNext()->id, 'category'=> $model->nextCategory ], ['class' => 'post-title']); ?>
                    </span>
                </div>
            </div>
        <?php endif;?>
    </div>
    <!-- ##### Pager Area End ##### -->

    <!-- ##### Post Details Area Start ##### -->
    <section class="post-details-area mb-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single-video-area">
                        <iframe src="<?=$model->video;?>" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <!-- Post Details Content Area -->
                <div class="col-12 col-lg-8">
                    <div class="post-details-content d-flex">
                        <!-- Post Share Info -->
                        <div class="post-share-info">
                            <p>Share</p>
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="thumb-tack"><i class="fa fa-thumb-tack"></i></a>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">

                            <!-- Post Content -->
                            <div class="post-content mt-0">
                                <?= Html::a("  $model->categoryName", ['newlist/grid', 'category'=>  $model->categoryName], ['class' => 'post-cata cata-sm cata-danger']) ?>
                                <?= Html::a("  $model->title ", ['newlist/single', 'id' => $model->id,'category'=>$model->categoryName], ['class' => 'post-title mb-2']) ?>



                                <div class="d-flex justify-content-between mb-30">
                                    <div class="post-meta d-flex align-items-center">
                                        <a href="#" class="post-author">By Jane</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"><?=$model->created_at?></a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->getNext()->views_count?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$model->getNext()->likes_count?></a>
                                    </div>
                                </div>
                            </div>

                            <?=$model->content?>

                            <!-- Post Tags -->
                            <div class="post-tags mt-30">
                                <ul>
                                    <li><a href="#">HealthFood</a></li>
                                    <li><a href="#">Sport</a></li>
                                    <li><a href="#">Game</a></li>
                                </ul>
                            </div>

                            <!-- Post Author -->
                            <div class="vizew-post-author d-flex align-items-center py-5">
                                <div class="post-author-thumb">
                                    <img src="/img/bg-img/30.jpg" alt="">
                                </div>
                                <div class="post-author-desc pl-4">
                                    <a href="#" class="author-name">Calantha Flower</a>
                                    <p>Hello! My name is Nicolas Sarkozy. I’m a web designer and front-end web developer with over fifteen years of professional.</p>
                                    <div class="post-author-social-info">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-dribbble"></i></a>
                                    </div>
                                </div>
                            </div>

                            <!-- Related Post Area -->
                            <div class="related-post-area mt-5">
                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Related Post</h4>
                                    <div class="line"></div>
                                </div>

                                <div class="row">

                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="/img/bg-img/11.jpg" alt="">

                                                <!-- Video Duration -->
                                                <span class="video-duration">05.03</span>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                                                <a href="single-post.html" class="post-title">Warner Bros. Developing ‘The accountant’ Sequel</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 16</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 15</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Single Blog Post -->
                                    <div class="col-12 col-md-6">
                                        <div class="single-post-area mb-50">
                                            <!-- Post Thumbnail -->
                                            <div class="post-thumbnail">
                                                <img src="/img/bg-img/12.jpg" alt="">

                                                <!-- Video Duration -->
                                                <span class="video-duration">05.03</span>
                                            </div>

                                            <!-- Post Content -->
                                            <div class="post-content">
                                                <a href="#" class="post-cata cata-sm cata-danger">Game</a>
                                                <a href="single-post.html" class="post-title">Searching for the 'angel' who held me on Westminste</a>
                                                <div class="post-meta d-flex">
                                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 28</a>
                                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 17</a>
                                                    <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Comment Area Start -->
                            <div class="comment_area clearfix mb-50">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Comment</h4>
                                    <div class="line"></div>
                                </div>

                                <ul>
                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="/img/bg-img/31.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">27 Aug 2019</a>
                                                <h6>Tomas Mandy</h6>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <ol class="children">
                                            <li class="single_comment_area">
                                                <!-- Comment Content -->
                                                <div class="comment-content d-flex">
                                                    <!-- Comment Author -->
                                                    <div class="comment-author">
                                                        <img src="/img/bg-img/32.jpg" alt="author">
                                                    </div>
                                                    <!-- Comment Meta -->
                                                    <div class="comment-meta">
                                                        <a href="#" class="comment-date">27 Aug 2019</a>
                                                        <h6>Britney Millner</h6>
                                                        <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                                        <div class="d-flex align-items-center">
                                                            <a href="#" class="like">like</a>
                                                            <a href="#" class="reply">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>

                                    <!-- Single Comment Area -->
                                    <li class="single_comment_area">
                                        <!-- Comment Content -->
                                        <div class="comment-content d-flex">
                                            <!-- Comment Author -->
                                            <div class="comment-author">
                                                <img src="/img/bg-img/33.jpg" alt="author">
                                            </div>
                                            <!-- Comment Meta -->
                                            <div class="comment-meta">
                                                <a href="#" class="comment-date">27 Aug 2019</a>
                                                <h6>Simon Downey</h6>
                                                <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius</p>
                                                <div class="d-flex align-items-center">
                                                    <a href="#" class="like">like</a>
                                                    <a href="#" class="reply">Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Post A Comment Area -->
                            <div class="post-a-comment-area">

                                <!-- Section Title -->
                                <div class="section-heading style-2">
                                    <h4>Leave a reply</h4>
                                    <div class="line"></div>
                                </div>

                                <!-- Reply Form -->
                                <div class="contact-form-area">
                                    <form action="#" method="post">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <input type="text" class="form-control" id="name" placeholder="Your Name*">
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <input type="email" class="form-control" id="email" placeholder="Your Email*">
                                            </div>
                                            <div class="col-12">
                                                <textarea name="message" class="form-control" id="message" placeholder="Message*"></textarea>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn vizew-btn mt-30" type="submit">Submit Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
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
                            <div class="single-post-area mb-30">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="img/bg-img/13.jpg" alt="">

                                    <!-- Video Duration -->
                                    <span class="video-duration">05.03</span>
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <a href="#" class="post-cata cata-sm cata-success">Sports</a>
                                    <a href="single-post.html" class="post-title">Full article Prince Charles's 'urgent' global research</a>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 38</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 22</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/1.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">DC Shoes: gymkhana five; the making of</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 29</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 08</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 23</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/2.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Sweet Yummy Chocolatea Tea</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 17</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 33</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 26</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/35.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">How To Make Orange Chicken Recipe?</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 11</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 42</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 21</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ***** Single Widget ***** -->
                        <div class="single-widget add-widget mb-50">
                            <a href="#"><img src="/img/bg-img/add.png" alt=""></a>
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
                        <div class="single-widget mb-50">
                            <!-- Section Heading -->
                            <div class="section-heading style-2 mb-30">
                                <h4>Most Viewed Playlist</h4>
                                <div class="line"></div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/1.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">DC Shoes: gymkhana five; the making of</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/2.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">How To Make Orange Chicken Recipe?</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/36.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">Sweet Yummy Chocolate in the</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/37.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">DC Shoes: gymkhana five; the making of</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Single Blog Post -->
                            <div class="single-blog-post d-flex">
                                <div class="post-thumbnail">
                                    <img src="/img/bg-img/38.jpg" alt="">
                                </div>
                                <div class="post-content">
                                    <a href="single-post.html" class="post-title">How To Make Orange Chicken Recipe?</a>
                                    <div class="post-meta d-flex justify-content-between">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 14</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> 34</a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 84</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
