<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;
use common\widgets\newlist\NewsWidget;
use frontend\assets\AppAsset;
use frontend\helpers\HighlightHelper;
$this->title = 'Search List';
AppAsset::register($this);

?>

<!-- ##### Header Area End ##### -->


<!-- ##### Archive List Posts Area Start ##### -->
<div class="vizew-archive-list-posts-area mb-80">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <!-- Archive Catagory & View Options -->
                <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                    <!-- Catagory -->
                    <div class="archive-catagory">
                        <h2></i>Search List</h2>
                    </div>
                    <!-- View Options -->
                    <div class="view-options">
                        <a href="/newlist/grid" class="active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                        <a href="/newlist/list"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                    </div>
                </div>

                <!-- Single Post Area -->
                <?php if(!$models):?>
                <h2>Nothing Found</h2>
                <?php endif;?>
                <?php foreach ($models as $model):?>
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?='/images/news/'.$model->id.'.jpg'?>" alt="" style="width: 100%">

                                    <!-- Video Duration -->
                                    <span class="video-duration">
                                        <?= Html::a($model->video_time, ['newlist/video', 'id' => $model->id, 'category'=> $model->categoryName], ['class' => 'post-title mb-2']) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <?= Html::a("$model->categoryName", ['newlist/grid',  'category'=> $model->categoryName], ['class' => 'post-cata cata-sm cata-success']) ?>
                                    <?= Html::a( HighlightHelper::process($keyword, $model->title), ['newlist/single', 'id' => $model->id, 'category'=> $model->categoryName], ['class' => 'post-title mb-2']) ?>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">Added</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"><?=$model->created_at?></a>
                                    </div>
                                    <p class="mb-2"><?=$model->getShortText($model->content, 200)?></p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$model->comment_count?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$model->views_count?></a>
                                        <?php if($model->getLikeIcone($model->id) == null){?>
                                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->likes_count?></i></a>
                                        <?php } else {?>
                                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->likes_count?></i></a>
                                        <?php };?>
                                        <?php if($model->getFavoriteIcone($model->id)){?>
                                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                        <?php } else {?>
                                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                        <?php };?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
            <?php echo NewsWidget::widget(); ?>
        </div>
    </div>
</div>
