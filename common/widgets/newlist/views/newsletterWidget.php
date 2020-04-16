<?php

use yii\helpers\Html;
use common\models\Category;
use common\models\Newlist;
use yii\widgets\ActiveForm;
use common\models\Newsletteres;

?>

<div class="single-widget youtube-channel-widget mb-50">
    <!-- Section Heading -->
    <div class="section-heading style-2 mb-30">
        <h4>Hot Channels</h4>
        <div class="line"></div>
    </div>

    <!-- Single YouTube Channel -->
    <?php foreach ($categories as $category) :?>
    <div class="single-youtube-channel d-flex align-items-center">
        <div class="youtube-channel-thumbnail">
            <img src="<?='/images/news/'.$category->name.'.jpg'?>" alt="">
        </div>
        <div class="youtube-channel-content">
            <a href="single-post.html" class="channel-title"><?=ucfirst($category->name)?> Channel</a>
            <a href="#" class="btn subscribe-btn" data-id="<?=$category->id?>"><i class="fa fa-play-circle-o"  aria-hidden="true"></i> Subscribe</a>
        </div>
    </div>
<?php endforeach;?>
</div>

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
           <input type="email" name="NewsletteresForm[email]" class="form-control mb-15" id="emailnl" placeholder="Enter your email">
           <input type="hidden" name="NewsletteresForm[categories_id]" class="form-control mb-15" id='categoriesid'>
           <button type="submit" class="btn vizew-btn w-100">Subscribe</button>
       </form>
   </div>
</div>