<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = $name;
?>
<section class="auth">
    <div class="wrapper">
        <div class="auth__content">
            <div class="auth-content page-not-found">
                <div class="page-not-found__title">ERROR 404!</div>
                <img class="page-not-found__image" src="/images/news/404.jpg" alt="">
                <div class="page-not-found__disc"><?= nl2br(Html::encode($message)) ?></div>
                <a class="page-not-found__btn blue-red" href="<?= Url::to(['/']) ?>">To Home</a>
            </div>
        </div>
    </div>
</section>
