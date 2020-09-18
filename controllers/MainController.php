<?php


namespace app\controllers;


class MainController extends ApiBaseController
{
    public function actionIndex()
    {
        return $this->success('欢迎使用API服务');
    }
}