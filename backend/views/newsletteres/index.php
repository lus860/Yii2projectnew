<?php


use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;



/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Newsletteres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newlist-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['label' => 'Category',
                'attribute'=>'categories_id',
                'format' => 'ntext',
                'value' => function( $data ){
                    return $data->getCategory()->one()->name;
                },
            ],
            ['label' => 'Name',
                'attribute'=>'user_id',
                'format' => 'ntext',
                'value' => function( $data ){
                    return $data->getUser()->one()->name;
                },
            ],

            ['label' => 'Surname',
                'attribute'=>'user_id',
                'format' => 'ntext',
                'value' => function( $data ){
                    return $data->getUser()->one()->surname;
                },
            ],
            ['label' => 'Email',
                'attribute'=>'user_id',
                'format' => 'ntext',
                'value' => function( $data ){
                    return $data->getUser()->one()->email;
                },
            ],
            [
                'attribute'=>'created_at',
                'format' => 'ntext',
                'value' => function($data){
                    return $data->date;
                },
            ],
            [ 'class' => 'yii\grid\ActionColumn' , 'template' => '{view} {delete}' ],

        ],
    ]); ?>

</div>
