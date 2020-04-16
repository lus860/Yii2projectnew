<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\widgets\Alert;

$this->title ='Contact';
?>

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
                    <?= Alert::widget() ?>
                    <div class="contact-form-area mt-50">

                        <?php $form = ActiveForm::begin(['class' => 'form-group']); ?>

                        <?= $form->field( $model, 'name')->textInput(['autofocus' => true])->label('Name*') ?>

                        <?= $form->field($model, 'email')->label('Email*') ?>

                        <?= $form->field($model, 'body')->textarea(['rows' => 10, 'cols' => 30])->label('Message*') ?>

                        <div class="form-group">
                            <?= Html::submitButton('Send Now', ['class' => 'btn vizew-btn mt-30', 'name' => 'signup-button']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4">
                    <div class="sidebar-area">
                        <!-- ***** Single Widget ***** -->
                        <div class="section-heading style-2 mb-30">
                            <h4>Best Video</h4>
                            <div class="line"></div>
                        </div>
                        <?php foreach ($newlikeslist as $newlikes):?>
                        <div class="single-post-area mb-30">
                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail">
                                <img src="<?='/images/news/'.$newlikes->id.'.jpg'?>" alt="" style="width: 100%;">

                                <!-- Video Duration -->
                                <span class="video-duration">
                        <?= Html::a($newlikes->video_time, ['newlist/video', 'id' => $newlikes->id, 'category'=> $newlikes->categoryName ], ['class' => 'post-title']) ?>

                    </span>
                            </div>

                            <!-- Post Content -->
                            <div class="post-content">
                                <?= Html::a("$newlikes->categoryName", ['newlist/grid', 'category'=> $newlikes->categoryName ], ['class' => 'post-cata cata-sm cata-success']) ?>
                                <?= Html::a("$newlikes->title", ['newlist/single', 'id' => $newlikes->id, 'category'=> $newlikes->categoryName ], ['class' => 'post-title']) ?>
                                <div class="post-meta d-flex">
                                    <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$newlikes->getCountComment($newlikes->id)?></a>
                                    <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$newlikes->views_count?></a>
                                    <?php if($newlikes->getLikeIcone($newlikes->id) == null){?>
                                        <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$newlikes->id?>"><?=$newlikes->likes_count?></i></a>
                                    <?php } else {?>
                                        <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$newlikes->id?>"><?=$newlikes->likes_count?></i></a>
                                    <?php };?>
                                    <?php if($newlikes->getFavoriteIcone($newlikes->id)){?>
                                    <a href="#"><i data-id="<?=$newlikes->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                    <?php } else {?>
                                    <a href="#"><i data-id="<?=$newlikes->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                    <?php };?>

                                </div>
                            </div>
                        </div>
                        <?php endforeach;?>

                    </div>
                </div>
            </div>
        </div>
    </section>
