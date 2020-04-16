<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model backend\models\Newlist */

$this->title = 'Newsletter View';
$this->params['breadcrumbs'][] = ['label' => 'Newsletteres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="newlist-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'categories_id',
                //'format' => 'html',
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


        ],
    ]) ?>

</div>
