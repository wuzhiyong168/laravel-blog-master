<!DOCTYPE html>
<html lang="en" style="background-color: white;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>@yield('title', '联心钱包')</title>
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .z-title {
            font-size: 24px;
            margin-top: 10px;
        }
        .z-content-center {
            text-align: center;
        }
        .z-content {
            margin: 10px 0;
            font-size: 16px;
        }
        .z-img {
            width: 100%;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="z-title z-content-center">联心钱包产品介绍</div>
    <div class="z-content">联心钱包是一款类支付宝的产品，用户可以通过使用我们的产品，进行转账、支付、购买商品。</div>
    <img src="/images/api/lx_homeicon.png" class="z-img img-thumbnail" alt="联心钱包">
    <div class="z-content">现在市面上用户基数最大的类钱包应用主要为支付宝和微信，但两个产品互相独立，我们的联心钱包则会同时支持上述两款应用和银行卡，让用户使用更为方便。
        同时，我们还为大家提供更多话费充值、虚拟卡购买服务。</div>
    <img src="/images/api/lx_jingxuanyouxi.jpg" class="z-img img-thumbnail" alt="精选游戏">
    <img src="/images/api/lx_jingxuanshangpin.jpg" class="z-img img-thumbnail" alt="精选商品">
    <div class="z-content z-content-center" style="margin-bottom: 30px">（图片仅为示例，请以实际为准）</div>
</div>
</body>
</html>