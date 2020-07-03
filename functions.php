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
    return (new \yii\web\Response)->redirect($url , 302 , $checkAjax);
}

function refresh($anchor='')
{
    return \Yii::$app->controller->refresh($anchor);
}

function __($text)
{
    return \Yii::t('app',$text);
}

function is_logged()
{
    return !Yii::$app->user->isGuest;
}

function to_login()
{
    return Yii::$app->user->loginRequired();
}


function auth()
{
    return Yii::$app->user->identity;
}

function to_route(array $route)
{
    return \Url::to($route);
}