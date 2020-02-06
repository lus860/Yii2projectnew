
<?php
use yii\helpers\Html;
use common\widgets\newlist\NewsWidget;
?>

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcrumb Area Start ##### -->
    <div class="vizew-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Feature</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Archive by Category MUSIC</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive List Posts Area Start ##### -->
    <div class="vizew-archive-list-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-music" aria-hidden="true"></i> Music </h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="archive-grid.html"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html" class="active"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Post Area -->
                    <?php foreach ($models as $model):?>
                    <div class="single-post-area style-2">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-6">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?='/img/bg-img/'.$model->img?>" alt="" style="width: 100%">

                                    <!-- Video Duration -->
                                    <span class="video-duration">
                                        <?= Html::a("5:03", ['newlist/video', 'id' => $model->id, 'category'=> $model->categoryName  ], ['class' => 'post-title mb-2']) ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <!-- Post Content -->
                                <div class="post-content mt-0">
                                    <?= Html::a("$model->categoryName", ['newlist/grid',  'category'=> $model->categoryName], ['class' => 'post-cata cata-sm cata-success']) ?>

                                    <?= Html::a("$model->title", ['newlist/single', 'id' => $model->id, 'category'=> $model->categoryName  ], ['class' => 'post-title mb-2']) ?>
                                    <div class="post-meta d-flex align-items-center mb-2">
                                        <a href="#" class="post-author">By Jane</a>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <a href="#" class="post-date"><?=$model->created_at?></a>
                                    </div>
                                    <p class="mb-2"><?=substr($model->content, 0, 200)?></p>
                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 32</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i> </i>/i><?=$model->likes_count?>?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$model->views_count?>?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>



                    <!-- Pagination -->
                    <nav class="mt-50">
                        <ul class="pagination justify-content-center">
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                </div>

                <?php echo NewsWidget::widget(); ?>
            </div>
        </div>
    </div>
