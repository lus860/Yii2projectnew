<?php
use yii\helpers\Html;
use common\models\Newlist;
use common\widgets\newlist\NewsWidget;
use common\widgets\newlist\PrevNextWidget;
use common\widgets\newlist\CommentWidget;
$this->title ='Video Post';
$title = $model->title;

?>

<?php echo PrevNextWidget::widget(['model' => $model])?>

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
                                        <a href="#" class="post-author">Added</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"><?=$model->created_at?></a>
                                    </div>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><?=$model->comment_count?></a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> <?=$model->views_count?></a>
                                        <?php if($model->getLikeIcone($model->id) == null){?>
                                            <a href="#"><i class="fa fa-thumbs-o-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->likes_count?></i></a>
                                        <?php } else {?>
                                            <a href="#"><i class="fa fa-thumbs-up like" aria-hidden="true" data-id="<?=$model->id?>"><?=$model->likes_count?></i></a>
                                        <?php };?>
                                        <?php if($model->getFavoriteIcone($model->id)){?>
                                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star-o star" aria-hidden="true"></i></a>
                                        <?php } else {?>
                                            <a href="#"><i data-id="<?=$model->id?>" class="fa fa-star star" aria-hidden="true"></i></a>
                                        <?php };?>                                           </div>
                                </div>
                            </div>
                            <?=$model->content?>
                            <?php echo CommentWidget::widget(['new_id' => $model->id]); ?>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Widget -->
                <?php echo NewsWidget::widget(); ?>

            </div>
        </div>
    </section>
