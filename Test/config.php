<?php

// +----------------------------------------------------------------------
// | WeChatDeveloper
// +----------------------------------------------------------------------
// | 版权所有 2014~2018 广州楚才信息科技有限公司 [ http://www.cuci.cc ]
// +----------------------------------------------------------------------
// | 官方网站: http://think.ctolog.com
// +----------------------------------------------------------------------
// | 开源协议 ( https://mit-license.org )
// +----------------------------------------------------------------------
// | github开源项目：https://github.com/zoujingli/WeChatDeveloper
// +----------------------------------------------------------------------

return [
    'token'          => 'test',
    'appid'          => 'wx60a43dd8161666d4',
    'appsecret'      => '71308e96a204296c57d7cd4b21b883e8',
    'encodingaeskey' => 'BJIUzE0gqlWy0GxfPp4J1oPTBmOrNDIGPNav1YFH5Z5',
    // 配置商户支付参数
    'mch_id'         => "1332187001",
    'mch_key'        => 'A82DC5BD1F3359081049C568D8502BC5',
    // 配置商户支付双向证书目录
    'ssl_key'        => __DIR__ . DIRECTORY_SEPARATOR . 'cert' . DIRECTORY_SEPARATOR . 'apiclient_key.pem',
    'ssl_cer'        => __DIR__ . DIRECTORY_SEPARATOR . 'cert' . DIRECTORY_SEPARATOR . 'apiclient_cert.pem',
    'cache_dirvers'    => [
        // redis配置
        'driver'=>'redis',
        'config'=>[
            'host'=>'xxx',
            'pass'=>'xxx',
            'port'=>'xxx',
            'db'=>'0',
        ]
        /* file 配置
        'driver'=>'file',
        'config'=>[
            'cache_path' => 'xxx',//（可选，需拥有读写权限）
            'crypt'=>'md5',
        ],
        */
        /*
        'driver'=>'memcache',
        'config'=>[
            'host'=>'xxx',
            'port'=>'xxx',
        ]
        */
        /* 腾讯对象存储 cos,[未实现]
        'driver'=>'cos',
        'config'=>[
            'region'=>'ap-guangzhou',
            'credentials'=>[
                'appId' => 'xxx',
                'secretId'    => 'xxx',
                'secretKey' => 'xxx'
            ],
        */
    ]
];