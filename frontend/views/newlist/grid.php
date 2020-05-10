<?php
use yii\helpers\Html;
use common\widgets\newlist\NewsWidget;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use frontend\assets\AppAsset;

$this->title ='Archive Grid';
AppAsset::register($this);

?>
    <!-- ##### Archive Grid Posts Area Start ##### -->
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h2>
                                <?php if($category == 'sport'):?>
                                    <i class="fa fa-trophy" aria-hidden="true"></i>
                               <?php endif; ?>
                                <?php if($category == 'music'):?>
                                    <i class="fa fa-music" aria-hidden="true"></i>
                                <?php endif; ?>
                                <?= ucfirst($category) ?></h2>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="/newlist/grid" class="active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="/newlist/list"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        <?php foreach ($news as $new):?>
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?= '/images/news/'.$new->id.'.jpg' ?>" alt="" style="width: 100%; height: 250px;">

                                    <!-- Video Duration -->
                                    <span class="video-duration">
                                        <?= Html::a($new->video_time, ['newlist/video', 'id' => $new->id, 'category'=> $model->name ], ['class' => 'post-title']) ?>
                                    </span>
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$model->name", ['newlist/grid',  'category'=> $model->name], ['class' => 'post-cata cata-sm cata-success']) ?>

                                    <?= Html::a("$new->title", ['newlist/single', 'id' => $new->id, 'category'=> $model->name], ['class' => 'post-title']) ?>

                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$new->comment_count?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$new->views_count?></a>
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
                        </div>
                <?php endforeach;?>


                    </div>
                    <nav class="mt-50">
                        <?php  echo LinkPager::widget([
                            'pagination' => $pages,
                            'hideOnSinglePage' => true,
                            'maxButtonCount' => 4,
                            'options' => ['class' => 'pagination justify-content-center '],
                            'linkOptions' => ['class' => 'page-item'],
                            'activePageCssClass' => ['class' => 'page-link'],

                        ]); ?>
                    </nav>
                    <!-- Pagination -->

                </div>
                <?php echo NewsWidget::widget(); ?>
            </div>
        </div>
    </div>
