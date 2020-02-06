
<?php
use yii\helpers\Html;
?>
    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-7 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading style-2">
                        <h4>Contact</h4>
                        <div class="line"></div>
                    </div>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    <!-- Contact Form Area -->
                    <div class="contact-form-area mt-50">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="name">Name*</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                            <div class="form-group">
                                <label for="message">Message*</label>
                                <textarea name="message" class="form-control" id="message" cols="30" rows="10"></textarea>
                            </div>
                            <button class="btn vizew-btn mt-30" type="submit">Send Now</button>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">
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

                    </div>
                </div>
            </div>
        </div>
    </section>
