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
                            <li class="breadcrumb-item active" aria-current="page">Archive by Category SPORTS</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Archive Grid Posts Area Start ##### -->
    <div class="vizew-grid-posts-area mb-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <!-- Archive Catagory & View Options -->
                    <div class="archive-catagory-view mb-50 d-flex align-items-center justify-content-between">
                        <!-- Catagory -->
                        <div class="archive-catagory">
                            <h4><i class="fa fa-trophy" aria-hidden="true"></i> <?= ucfirst($category) ?></h4>
                        </div>
                        <!-- View Options -->
                        <div class="view-options">
                            <a href="archive-grid.html" class="active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            <a href="archive-list.html"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Single Blog Post -->
                        <?php foreach ($news as $new):?>
                        <div class="col-12 col-md-6">
                            <div class="single-post-area mb-50">
                                <!-- Post Thumbnail -->
                                <div class="post-thumbnail">
                                    <img src="<?= '/img/bg-img/'.$new->img ?>" alt="" style="width: 100%; height: 250px;">

                                    <!-- Video Duration -->
                                    <span class="video-duration">
                                        <?= Html::a("5:03", ['newlist/video', 'id' => $new->id, 'category'=> $category ], ['class' => 'post-title']) ?>
                                    </span>
                                </div>

                                <!-- Post Content -->
                                <div class="post-content">
                                    <?= Html::a("$category", ['newlist/grid',  'category'=> $category ], ['class' => 'post-cata cata-sm cata-success']) ?>

                                    <?= Html::a("$new->title", ['newlist/single', 'id' => $new->id, 'category'=> $category ], ['class' => 'post-title']) ?>

                                    <div class="post-meta d-flex">
                                        <a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 22</a>
                                        <a href="#"><i class="fa fa-eye" aria-hidden="true"></i><?=$new->views_count?></a>
                                        <a href="#"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?=$new->likes_count?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php endforeach;?>


                    </div>

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
