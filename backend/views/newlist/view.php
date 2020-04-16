<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Newlist */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Newlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="newlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'category_id',
                //'format' => 'html',
                'value' => function( $data ){
                    return $data->getCategories()->one()->name;
                },
            ],
            'title:html',
            'content:html',
            [
                'attribute'=>'image',
                'format' => 'raw',
             'value' => function($data){
                 return $data->getImg($data->id);
             },
            ],
            [
                'attribute'=>'video',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a('Video', $data->video, ['target'=>"_blank"]);

                },
            ],
            'video_time',
            'likes_count',
            'views_count',
            [
                'attribute'=>'created_at',
                'format' => 'ntext',
                'value' => function($data){
                    return $data->getDate($data->created_at);
                },
            ],

            [
                'attribute'=>'updated_at',
                'format' => 'ntext',
                'value' => function($data){
                    return $data->getDate($data->updated_at);
                },
            ],
        ],
    ]) ?>

</div>
