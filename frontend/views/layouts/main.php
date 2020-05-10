<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use common\models\User;
use yii\bootstrap\NavBar;
use common\widgets\Alert;
use yii\widgets\Breadcrumbs;
use frontend\assets\VizewAsset;
use common\widgets\newlist\FooterWidget;
use common\widgets\newlist\BreakingNews;
use common\widgets\newlist\FeaturesWidget;
use common\widgets\newlist\SearchWidget;

VizewAsset::register($this);

?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="/images/news/core-img/favicon.ico">

    <!-- Stylesheet -->
</head>
<body>
<?php $this->beginBody() ?>
<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6">
                    <!-- Breaking News Widget -->

                    <?php echo BreakingNews::widget(); ?>

                </div>
                <div class="col-12 col-md-6">
                    <div class="top-meta-data d-flex align-items-center justify-content-end">

                        <div class="top-social-info">

                            <?php if (!Yii::$app->user->isGuest && User::isAdmin(Yii::$app->user->identity->auth_key)) {?>
                            <?= Html::a("Admin", [Url::to(['admin/site/index','auth_key' =>Yii::$app->user->identity->auth_key])], ['class' => 'login-btn']) ?>
                             <?php } ?>

                        </div>
                        <!-- Top Search Area -->
                        <div class="top-search-area">
                            <?php echo SearchWidget::widget(); ?>

                        </div>
                        <!-- Login -->
                        <?php if (Yii::$app->user->isGuest) {?>
                            <?= Html::a("Sign In", [Url::to(['user/signin/'])], ['class' => 'login-btn']) ?>
                            <?= Html::a("Sign Up", [Url::to(['user/signup/'])], ['class' => 'login-btn']) ?>
                        <?php } else {?>
                            <?= Html::a("Logout", [Url::to(['user/logout/'])], ['class' => 'login-btn']) ?>
                            <?= Html::a( '('.Yii::$app->user->identity->name . ')',['/user/logout' ], ['class' => 'login-btn']) ?>
                        <?php }?>

                   </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="vizew-main-menu" id="sticker">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="vizewNav">
                    <!-- Nav brand -->
                    <a href="/" class="nav-brand"><img src="/images/news/core-img/logo.png" alt=""></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </div>

                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap">
                                <span class="top"></span>
                                <span class="bottom"></span>
                            </div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/newlist/list">Archives</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="/">- Home</a></li>
                                        <li><a href="/newlist/list">- Archive List</a></li>
                                        <li><a href="/newlist/grid">- Archive Grid</a></li>
                                        <li><a href="/newlist/favorite">- Favorite List</a></li>
                                        <li><a href="/newlist/contact">- Contact</a></li>
                                        <li><a href="/newlist/login">- Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Features</a>
                                    <?php echo FeaturesWidget::widget(); ?>

                                </li>
                                <li><a href="/newlist/contact">Contact</a></li>
                            </ul>
                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php if(Yii::$app->session->getFlash('isguest')):?>
    <div class="container alert alert-danger w-50 text-center" role="alert">
        <?= Yii::$app->session->getFlash('isguest'); ?>
    </div>
<?php endif;?>
<div class="vizew-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php if ($this->title == 'Video Post' || $this->title == 'Single Post') {?>
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Archive</a></li>
                            <?php if(isset($title)) {?>
                                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
                            <?php } ?>
                        <?php } elseif ($this->title == 'Archive List' || $this->title == 'Archive Grid') {?>
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Feature</a></li>
                            <?php if(Yii::$app->request->get('category')) {?>
                                <li class="breadcrumb-item active" aria-current="page">Archive by Category <?=mb_strtoupper(Yii::$app->request->get('category'))?></li>
                            <?php }?>
                            <?php } elseif($this->title == 'Sign In' || $this->title == 'Sign Up' || $this->title == 'Contact'){?>
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#"><?=$this->title?></a></li>
                        <?php } ?>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<?= $content ?>
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <!-- Logo -->
                        <a href="/" class="foo-logo d-block mb-4"><img src="/images/news/core-img/logo2.png" alt=""></a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>

                        <!-- Footer Newsletter Area -->
<!--                        <div class="footer-nl-area">-->
<!--                            <form action="#" method="post">-->
<!--                                <input type="email" name="nl-email" class="form-control" id="nlEmail" placeholder="Your email">-->
<!--                                <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>-->
<!--                            </form>-->
<!--                        </div>-->
                    </div>
                </div>

                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Latest Twister</h6>
                        <!-- Twitter Slides -->
                        <div class="twitter-slides owl-carousel">

                            <!-- Single Twitter Slide -->
                            <div class="single--twitter-slide">
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-twitter"></i> <span>@Leonard</span> I am so happy because I found this magazine, and it just made Vizeweasier. Thanks for sharing</p>
                                </div>
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-twitter"></i> <span>@Leonard</span> I am so happy because I found this magazine, and it just made Vizeweasier. Thanks for sharing</p>
                                </div>
                            </div>

                            <!-- Single Twitter Slide -->
                            <div class="single--twitter-slide">
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-twitter"></i> <span>@Colorlib</span> I am so happy because I found this magazine, and it just made Vizeweasier. Thanks for sharing</p>
                                </div>
                                <!-- Single Twit -->
                                <div class="single-twit">
                                    <p><i class="fa fa-twitter"></i> <span>@Colorlib</span> I am so happy because I found this magazine, and it just made Vizeweasier. Thanks for sharing</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php echo FooterWidget::widget(); ?>
                <!-- Footer Widget Area -->
                <div class="col-12 col-sm-6 col-xl-3">
                    <div class="footer-widget mb-70">
                        <h6 class="widget-title">Our Address</h6>
                        <!-- Contact Address -->
                        <div class="contact-address">
                            <p>101 E 129th St, East Chicago, <br>IN 46312, US</p>
                            <p>Phone: 001-1234-88888</p>
                            <p>Email: info.colorlib@gmail.com</p>
                        </div>
                        <!-- Footer Social Area -->
                        <div class="footer-social-area">
                            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copywrite Area -->
        <div class="copywrite-area">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Copywrite Text -->
                    <div class="col-12 col-sm-6">
                        <p class="copywrite-text"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                    <div class="col-12 col-sm-6">
                        <nav class="footer-nav">
                            <ul>
                                <li><a href="#">Advertise</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Privacy</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>