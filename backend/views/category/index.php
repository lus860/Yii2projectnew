<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'Actions',
            ],
            [
                'label' => 'News in this category
',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a(
                        ucfirst($data->name).' News',
                        [  'category/category-news',
                            'id' => $data->id,
                        ]
                    );
                }
            ],
            ],
    ]); ?>


</div>
