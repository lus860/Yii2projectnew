<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\data\Pagination;


/* @var $this yii\web\View */
/* @var $model common\models\Category */

$this->title = ucfirst($model->name).'s'. ' News';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];

?>

    <h1><?= Html::encode($this->title) ?></h1>

    <table id="customers">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Image</th>
            <th>Video</th>
            <th>Likes Count</th>
            <th>Views Count</th>
            <th>Created at</th>
            <th>Updated at</th>
        </tr>
        <?php foreach ($newlists as $item):?>
            <tr>
                <td><a href="<?=Url::to(['newlist/view','id'=>$item->id])?>"><?=$item->title?></a></td>
                <td><?=$item->getShortText($item->content)?></td>
                <td><?=$item->getImg($item->id)?></td>
                <td><a href="<?=$item->video?>">Video</a></td>
                <td><?=$item->likes_count?></td>
                <td><?=$item->views_count?></td>
                <td><?=$item->getDate($item->created_at)?></td>
                <td><?=$item->getDate($item->updated_at)?></td>
            </tr>
        <?php endforeach;?>
        <?php
        echo LinkPager::widget([
            'pagination' => $pages,
        ]); ?>
    </table>

