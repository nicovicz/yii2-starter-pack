<?php
final class Icon
{
    public static function fa($name)
    {
        return Html::tag('i',null,['class'=>"fas fa-$name"]).' ';
    }
}