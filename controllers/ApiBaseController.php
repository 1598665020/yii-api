<?php


namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

/**
 * APi 接口基类
 * Class ApiController
 * @package app\controllers
 */
class ApiBaseController extends Controller
{
    public $header;

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

        // 响应格式为JSON
        Yii::$app->response->format = Response::FORMAT_JSON;

        // 响应头
        $this->header = Yii::$app->response->headers;
    }

    /**
     * 响应数据结构
     * @param $code
     * @param string $msg
     * @param array $data
     * @param int $error_code
     * @return array
     */
    public function response($code, $msg = '', $data = [], $error_code = 0)
    {
        $info = [
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'error_code' => $error_code
        ];
        return $info;
    }

    /**
     * API 成功返回
     * @param string $msg
     * @param array $data
     * @return array
     */
    public function success($msg = 'success', $data = []) {
        return $this->response(1, $msg, $data);
    }

    /**
     * API 失败返回
     * @param string $msg
     * @param array $data
     * @param int $error_code
     * @return array
     */
    public function error($msg = 'error', $data = [], $error_code = 400) {
        return $this->response(0, $msg, $data, $error_code);
    }

    /**
     * 直接返回数据
     * @param array $data
     * @return array
     */
    public function responseData($data = []) {
        return $data;
    }

    /**
     * 设置响应头
     * @param array $header
     */
    public function setHeader($header = [])
    {
        foreach ($header as $key => $vo) {
            $this->header->set($key, $vo);
        }
    }

    public function actionError()
    {
        $exception = Yii::$app->errorHandler->exception;
        var_dump($exception);
        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception]);
        }
    }
}