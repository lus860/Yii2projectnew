<?php

use yii\helpers\Html;
use common\models\Newlist;

?>
<div class="breaking-news-area d-flex align-items-center">
    <div class="news-title">
        <p>Breaking News:</p>
    </div>

<div id="breakingNewsTicker" class="ticker">
    <ul>
        <?php foreach ($breakingnews as $breakingnew):?>
            <li><a href="#"><?=$breakingnew->getShortText($breakingnew->title,30);?></a></li>
        <?php endforeach;?>
    </ul>
</div>
</div>

