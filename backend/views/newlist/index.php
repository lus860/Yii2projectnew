<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newlists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newlist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Newlist', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['label' => 'Category',
            'attribute'=>'category',
            'format' => 'ntext',
            'value' => function( $data ){
                return $data->getCategories()->one()->name;
           },
           ],
            'title',
            [
                'attribute'=>'Content',
                'format' => 'html',
                'value' => function($data){
                    return $data->getShortText($data->content);
                },
            ],
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
                    if($data->video){
                        return Html::a('Video', $data->video, ['target'=>"_blank"]);

                    } else {
                        return "No video";
                    }

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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
