<?php
use yii\helpers\Html;
use yii\web\UploadedFile;
use kartik\file\FileInput;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use common\models\GalleryImage;
use zxbodya\yii2\galleryManager\GalleryManager;


/* @var $this yii\web\View */
/* @var $model backend\models\Newlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="newlist-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'category')->dropDownList( $model->data()) ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(),[
    'editorOptions' => [
    'preset' => 'standard', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
    'inline' => false,
    ],
    ])?>
    <?= $form->field($model, 'video')->textInput(['placeholder' => 'Paste the link to the video here','maxlength' => true]) ?>

    <?= $form->field($model, 'video_time')?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
    'options' => ['accept' => 'image/*'],
    ])?>

    <?php
    if ($model->isNewRecord) {
        echo ' ';
    } else {
        echo GalleryManager::widget(
            [
                'model' => $model,
                'behaviorName' => 'galleryBehavior',
                'apiRoute' => 'newlist/galleryApi'
            ]
        );
    }
   ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


