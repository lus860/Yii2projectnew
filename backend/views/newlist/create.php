<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Newlist */

$this->title = 'Create Newlist';
$this->params['breadcrumbs'][] = ['label' => 'Newlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
