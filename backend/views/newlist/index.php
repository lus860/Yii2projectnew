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
            [
            'attribute'=>'category_id',
            //'format' => 'html',
            'value' => function( $data ){
               return $data->categoryName;
           },
           ],
            'title',
            'content:html',
            [
            'attribute'=>'img',
             'format' => 'raw',
             'value' => function($data) {
             return Html::img(Url::to('/frontend/web/img/bg-img/'.$data->img) , ['style' => 'width:40px;']);
             },
             ],
            'video',
            //'likes_count',
            //'views_count',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
