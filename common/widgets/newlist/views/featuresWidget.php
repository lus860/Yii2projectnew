<?php

use common\models\Category;
use yii\helpers\Url;
?>
<div class="megamenu">
        <ul class="dropdown">
            <?php foreach($category as $item):?>
            <li><a href="<?=Url::to(['newlist/grid', 'category' => $item->name])?>"><?=ucfirst($item->name)?></a></li>
            <?php endforeach;?>
        </ul>
</div>