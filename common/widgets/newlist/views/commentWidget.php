<?php

use yii\helpers\Html;
use common\models\Newlist;
use yii\widgets\ActiveForm;
?>

<!-- Comment Area Start -->
<div class="comment_area clearfix mb-50 py-5">
    <!-- Section Title -->
    <div class="section-heading style-2">
        <h4>Comment</h4>
        <div class="line"></div>
    </div>
    <?php if(!empty($comments)):?>
    <ul>
        <!-- Single Comment Area -->
        <?php foreach ($comments as $comment):?>
        <li class="single_comment_area">
            <!-- Comment Content -->
            <div class="comment-content d-flex">
                <!-- Comment Author -->
                <div class="comment-author">
                    <img src="/images/news/avatarka.png" alt="author">
                </div>
                <!-- Comment Meta -->
                <div class="comment-meta">
                    <a href="#" class="comment-date"><?=$comment->date?></a>
                    <h6><?=$comment->user_name?></h6>
                    <p><?=$comment->text?></p>
                    <div class="d-flex align-items-center">
                        <a href="#" class="like" data-id="<?=$comment->id?>" data-parent="<?=$comment->id?>">like</a>
                        <a href="#" class="reply" data-id="<?=$comment->id?>" data-parent="<?=$comment->id?>">Reply</a>
                    </div>
                </div>
            </div>
           <?php if($children = $comment->getParent($comment->id)):?>
            <ol class="children">
                <?php foreach ($children as $child):?>
                <li class="single_comment_area">
                    <!-- Comment Content -->
                    <div class="comment-content d-flex">
                        <!-- Comment Author -->
                        <div class="comment-author">
                            <img src="/images/news/avatarka.png" alt="author">
                        </div>
                        <!-- Comment Meta -->
                        <div class="comment-meta">
                            <a href="#" class="comment-date"><?=$child->date?></a>
                            <h6><?=$child->user_name?></h6>
                            <small style="color: #db4437">For <?=$child->parent_name?></small>
                            <p><?=$child->text?></p>
                            <div class="d-flex align-items-center">
                                <a href="#" class="like" data-id="<?=$child->parent_id?>" data-parent="<?=$child->id?>">like</a>
                                <a href="#" class="reply" data-id="<?=$child->parent_id?>" data-parent="<?=$child->id?>">Reply</a>
                            </div>
                        </div>
                    </div>
                </li>
                <?php endforeach;?>
            </ol>
            <?php endif;?>
        </li>
        <?php endforeach;?>

    </ul>
    <?php endif;?>
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
        <?php $form = ActiveForm::begin(['class' => 'form-control']); ?>
        <div class="row">
            <div class="col-12 col-lg-6">
        <?= $form->field($commentForm, 'user_name')->textInput(['placeholder' => 'Your Name*'])->label(false)  ?>
            </div>
            <div class="col-12 col-lg-6">
        <?= $form->field($commentForm, 'parent_id')->hiddenInput(['class'=>'parent_id'])->label(false) ?>
        <?= $form->field($commentForm, 'parentreal_id')->hiddenInput(['class'=>'parentreal_id'])->label(false) ?>

            </div>
            <div class="col-12">
        <?= $form->field($commentForm, 'text')->textarea(['placeholder' => 'Message*', 'rows' => '6'])->label(false)  ?>
            </div>
            <div class="col-12">
            <?= Html::submitButton('Submit Comment', ['class' => 'btn vizew-btn mt-30']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
