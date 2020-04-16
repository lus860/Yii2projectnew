<?php

use yii\helpers\Html;
use common\models\Newlist;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($modelkeyword, 'keyword')->textInput(['maxlength' => true, 'placeholder' => "Search..."])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fa fa-search" aria-hidden="true"></i>', ['class' => 'btn']) ?>
    </div>

<?php ActiveForm::end(); ?>