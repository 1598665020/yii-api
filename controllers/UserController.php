<?php


namespace app\controllers;


class UserController extends ApiBaseController
{
    public function actionLogin()
    {
        return $this->success('登录成功');
    }
}