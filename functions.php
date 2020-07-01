<?php

function request()
{
    return \Yii::$app->request;
}

function render($view,$params=[])
{
    return \Yii::$app->controller->render($view,$params);
}

function render_partial($view,$params=[])
{
    return \Yii::$app->controller->renderPartial($view,$params);
}

function render_ajax($view,$params=[])
{
    return \Yii::$app->controller->renderAjax($view,$params);
}

function flash($key,$value)
{
    return \Yii::$app->session->setFlash($key, $value);
}

function redirect($url,$checkAjax = true)
{
    \yii\web\Response::redirect($url , 302 , $checkAjax);
}

function refresh($anchor='')
{
    return \Yii::$app->controller->refresh($anchor);
}