<?php
namespace app\widgets;

use Yii;
use yii\helpers\Url;

class Html extends \yii\bootstrap4\Html
{
    public static function SubmitButtonIcon($name,$icon,$class)
    {
        return static::submitButton(
            Html::tag('span',Icon::fa($icon),
            ['class'=>'icon text-white-50']).
            Html::tag('span',__($name),['class'=>'text']), 
            ['class' => "btn $class btn-icon-split "]);
    }

    public static function resetButtonIcon($name,$icon,$class)
    {
        return static::resetButton(
            Html::tag('span',Icon::fa($icon),
            ['class'=>'icon text-white-50']).
            Html::tag('span',__($name),['class'=>'text']), 
            ['class' => "btn $class btn-icon-split "]);
    }

    public static function linkButtonIcon($name,array $url,$icon,$class='')
    {
        return static::a(
            Html::tag('span',Icon::fa($icon),
            ['class'=>'icon text-white-50']).
            Html::tag('span',__($name),['class'=>'text']), 
            Url::to($url),
            ['class' => "btn $class btn-icon-split"]);
    }
}