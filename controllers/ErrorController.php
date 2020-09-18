<?php


namespace app\controllers;
use Yii;

class ErrorController extends ApiBaseController
{
    public function actionIndex()
    {
        $exception = Yii::$app->errorHandler->exception;
        if($exception !== null) return $this->error($exception->getMessage());
        return $this->error('request error');
    }
}