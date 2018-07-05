
WeChatDeveloper for PHP
--
* WeChatDeveloper 是基于 [wechat-php-sdk](https://github.com/zoujingli/wechat-php-sdk) 重构，优化并完善；
* 运行最底要求 PHP 版本 5.4 , 建议在 PHP7 上运行以获取最佳性能；
* WeChatDeveloper 针对 access_token 失效增加了自动刷新机制；
* 微信的部分接口需要缓存数据在本地，因此对目录需要有写权限；
* 我们鼓励大家使用 composer 来管理您的第三方库，方便后期更新操作；
* WeChatDeveloper 已历经数个线上项目考验，欢迎 fork 或 star 此项目。


Documentation

ClassMap
--

|文件名|类名|描述|类型|加载 ①|
|---|---|---|---|---|
|  Card.php  |  WeChat\Card  |  微信卡券接口支持  |  认证服务号  |  \We::WeChatCard() |
|  Custom.php  | WeChat\Custom   |  微信客服消息接口支持   |  认证服务号 | \We::WeChatCustom() |
|  Media.php  | WeChat\Media   |  微信媒体素材接口支持  |  认证服务号 | \We::WeChatMedia() |
|  Oauth.php  | WeChat\Oauth   |  微信网页授权消息类接口  |  认证服务号 | \We::WeChatOauth() |
|  Pay.php  | WeChat\Pay   |  微信支付类接口  |  认证服务号 | \We::WeChatPay() |
|  Product.php  | WeChat\Product   |  微信商店类接口  |  认证服务号 | \We::WeChatProduct() |
|  Qrcode.php  | WeChat\Qrcode   |  微信二维码接口支持  |  认证服务号 | \We::WeChatQrcode() |
|  Receive.php  | WeChat\Receive   |  微信推送事件消息处理支持 |  认证服务号 | \We::WeChatReceive() |
|  Scan.php  | WeChat\Scan   |  微信扫一扫接口支持  |  认证服务号 | \We::WeChatScan() |
|  Script.php  | WeChat\Script   |  微信前端JSSDK支持  |  认证服务号 | \We::WeChatScript() |
|  Shake.php  | WeChat\Shake   |  微信蓝牙设备揺一揺接口  |  认证服务号 | \We::WeChatShake() |
|  Tags.php  | WeChat\Tags   |  微信粉丝标签接口支持  |  认证服务号 | \We::WeChatTags() |
|  Template.php  | WeChat\Template   |  微信模板消息接口支持  |  认证服务号 | \We::WeChatTemplate() |
|  User.php  | WeChat\User   |  微信粉丝管理接口支持  |  认证服务号 | \We::WeChatCard() |
|  Wifi.php  | WeChat\Wifi   |  微信门店WIFI管理支持  |  认证服务号 | \We::WeChatWifi() |
|  Bill.php  | WePay\Bill   |  微信商户账单及评论  | 微信支付 | \We::WePayBill() |
|  Coupon.php  | WePay\Coupon   |  微信商户代金券  |  微信支付 | \We::WePayCoupon() |
|  Order.php  | WePay\Order   |  微信商户订单  |  微信支付 | \We::WePayOrder() |
|  Redpack.php  | WePay\Redpack   |  微信红包支持  |  微信支付 | \We::WePayRedpack() |
|  Refund.php  | WePay\Refund   |  微信商户退款  |  微信支付 | \We::WePayRefund() |
|  Transfers.php  | WePay\Transfers   |  微信商户打款到零钱  |   微信支付 | \We::WePayTransfers() |
|  TransfersBank.php  | WePay\TransfersBank   |  微信商户打款到银行卡  |  微信支付 | \We::WePayTransfersBank() |
|  Crypt.php  | WeMini\Crypt   |  微信小程序数据加密处理  |  微信小程序 | \We::WeMiniCrypt() |
|  Plugs.php  | WeMini\Plugs   |  微信小程序插件管理  |  微信小程序 | \We::WeMiniPlugs() |
|  Poi.php  | WeMini\Poi   |  微信小程序地址管理  |  微信小程序 | \We::WeMiniPoi() |
|  Qrcode.php  | WeMini\Qrcode   |  微信小程序二维码管理  | 微信小程序 | \We::WeMiniCrypt() |
|  Template.php  | WeMini\Template   |  微信小程序模板消息支持  | 微信小程序 | \We::WeMiniTemplate() |
|  Total.php  | WeMini\Total   |  微信小程序数据接口  | 微信小程序 | \We::WeMiniTotal() |


Install
--
1.1 通过 Composer 来管理安装
```shell
# 首次安装 线上版本（稳定）
composer require AsyncMe/WeChatDeveloper

# 首次安装 开发版本（开发）
composer require AsyncMe/WeChatDeveloper dev-master

# 更新 WeChatDeveloper
composer update AsyncMe/WeChatDeveloper
```

1.2 如果不使用 Composer， 可以下载 WeChatDeveloper 并解压到项目中
```php
# 在项目中加载初始化文件
include "您的目录/WeChatDeveloper/include.php";
```

2.1 接口实例所需参数
```php
$config = [
    'token'          => 'xxx',
    'appid'          => 'xxx',
    'appsecret'      => 'xxxxx',
    'encodingaeskey' => 'xxxx',
    // 配置商户支付参数（可选，在使用支付功能时需要）
    'mch_id'         => "xxx",
    'mch_key'        => 'xxxx',
    // 配置商户支付双向证书目录（可选，在使用退款|打款|红包时需要）
    'ssl_key'        => '',
    'ssl_cer'        => '',
    // 缓存目录配置（可选，需拥有读写权限）
    'cache_path'     => '',
];
```

3.1 实例指定接口
```php
try {

    // 实例对应的接口对象
    $user = new \WeChat\User($config);
    
    // 调用接口对象方法
    $list = $user->getUserList();
    
    // 处理返回的结果
    echo '<pre>';
    var_export($list);
    
} catch (Exception $e) {

    // 出错啦，处理下吧
    echo $e->getMessage() . PHP_EOL;
    
}
```

Encapsulation
--
* 接入验证 （初级权限）
* 自动回复（文本、图片、语音、视频、音乐、图文） （初级权限）
* 菜单操作（查询、创建、删除） （菜单权限）
* 客服消息（文本、图片、语音、视频、音乐、图文） （认证权限）
* 二维码（创建临时、永久二维码，获取二维码URL） （服务号、认证权限）
* 长链接转短链接接口 （服务号、认证权限）
* 标签操作（查询、创建、修改、移动用户到标签） （认证权限）
* 网页授权（基本授权，用户信息授权） （服务号、认证权限）
* 用户信息（查询用户基本信息、获取关注者列表） （认证权限）
* 多客服功能（客服管理、获取客服记录、客服会话管理） （认证权限）
* 媒体文件（上传、获取） （认证权限）
* 高级群发 （认证权限）
* 模板消息（设置所属行业、添加模板、发送模板消息） （服务号、认证权限）
* 卡券管理（创建、修改、删除、发放、门店管理等） （认证权限）
* 语义理解 （服务号、认证权限）
* 获取微信服务器IP列表 （初级权限）
* 微信JSAPI授权(获取ticket、获取签名) （初级权限）
* 数据统计(用户、图文、消息、接口分析数据) （认证权限）
* 微信支付（网页支付、扫码支付、交易退款、给粉丝打款）（认证服务号并开通支付功能）


Permission
--
* 初级权限：基本权限，任何正常的公众号都有此权限
* 菜单权限：正常的服务号、认证后的订阅号拥有此权限
* 认证权限：分为订阅号、服务号认证，如前缀服务号则仅认证的服务号有此权限
* 支付权限：仅认证后的服务号可以申请此权限


Copyright
--
* WeChatDeveloper 基于`MIT`协议发布，任何人可以用在任何地方，不受约束
* WeChatDeveloper 部分代码来自互联网，若有异议，可以联系作者进行删除





