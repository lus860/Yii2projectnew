<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\Html;
use common\models\Newlist;

class SearchForm extends Model
{
    public $keyword;

    public function rules()
    {
        return [
            [['keyword'], 'string', 'min' => 3],

        ];
    }


    public static function Search($keyword){

        if ( $keyword) {
            return  Newlist::find()->with(['categories'])->where(['LIKE', 'title', $keyword])->all();

        }
        return false;
    }

}