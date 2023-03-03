<?php

namespace Murongmingyue\Chatgptturboapi;

use Curl\Curl;

class chatApi
{
    //模型
    public $model = 'gpt-3.5-turbo';
    //请求的openAi的地址
    public $url = 'https://api.openai.com/v1/chat/completions';
    //请求方式
    public $method = 'POST';
    //请求内容
    public $content = 'Hello!';
    //角色
    public $role = 'user';
    //请求头
    public $header = [
        'Content-Type: application/json',
    ];
    //请求参数结构
    protected $params = [
        'content',
        'appKey',
        'url',
        'model',
        'method',
        'role',
    ];

    public $appKey = '';

    public function __construct($appKey)
    {
        $this->appKey = $appKey;
        $this->header = array_merge($this->header, ['Authorization: ' . $this->appKey]);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array('chatApi', $arguments);
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function chatApi($params)
    {
        foreach ($this->params as $value) {
            $this->$value =  $params[$value] ?? $this->$value;
        }
        $curl = new Curl();
        $curl->setHeaders($this->header);
        $method = strtolower($this->method);
        $message = $curl->$method($this->url, [
            'model' => $this->model,
            'messages' => [json_encode([
                'role' => $this->role,
                'content' => $this->content,
            ])],
        ]);
        $curl->close();
        return $message;
    }
}
