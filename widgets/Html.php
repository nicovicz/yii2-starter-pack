<?php
final class Html extends \yii\bootstrap4\Html
{

    public static function buttonIcon($name,array $options)
    {
        $icon = ArrayHelper::remove($options, 'icon');
        Html::addCssClass($options,'btn-icon-split');
        
        return static::submitButton(
            Html::tag('span',$icon,
            ['class'=>'icon text-white-50']).
            Html::tag('span',$name,['class'=>'text']), 
           $options);
    }

    public static function linkIcon($name,$url,array $options)
    {
        $icon = ArrayHelper::remove($options, 'icon');
        Html::addCssClass($options,'btn-icon-split');
        return static::a(
            Html::tag('span',$icon,
            ['class'=>'icon text-white-50']).
            Html::tag('span',$name,['class'=>'text']), 
            $url,
            $options);
    }

   
}