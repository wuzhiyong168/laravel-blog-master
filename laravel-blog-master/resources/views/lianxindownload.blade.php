<!DOCTYPE html>
<html lang="en" style="background-color: white;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <title>@yield('title', '联心钱包下载')</title>
    <script src="//libs.baidu.com/jquery/1.10.2/jquery.min.js"></script>
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            moz-user-select: -moz-none;
            -moz-user-select: none;
            -o-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .bg {
            position: absolute;
            width: 100vw;
            height: 100vw;
            margin:auto;
            top:0;
            background-repeat: no-repeat;
            background-position: top right;
            background-size: 100% auto;
            background-image: url("/images/api/pic.png");
        }
        .custorm-center-text-content {
            position: absolute;
            width: 100%;

            margin-top: 110vw;
            text-align: center;
        }
        .custorm-center-text {
            font-size: 15px;
            color: #333;
        }
        .download-button {
            margin-top: 44px;
            margin-left: 10%;
            margin-right: 10%;
            width: 80%;
        }
        .download-button-content {
            display:flex;
            display: -webkit-flex;/* Safari */
            justify-content: center;
            -webkit-justify-content: center;
            align-items:center;
            -webkit-align-items: center;
            width: 100%;
            height: 45px;
            border-radius: 5px;
            background: #3152dd;
        }

        .download-button-content-img {
            display: inline-block;
            position: relative;
            width: 28px;
            height: 28px;
            margin-right: 10px;
            margin-bottom: 3px;

        }
        .download-button-content-txt {
            display: inline-block;
            position: relative;
            font-size: 17px;
            color: white;
        }

        .popup {
            position: absolute;
            z-index: 9999;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0,0,0,0.7);
            }
        .popcontent {
            position: absolute;
            top: 1rem;
            right: 2rem;
            width: 15.28125rem;
            height:6.125rem;
            background-repeat: no-repeat;
            background-position: top right;
            background-size: 15.28125rem 6.125rem;
            background-image: url("/images/api/downloadGuide.png");
        }
    </style>
    <script type="text/javascript">
        //调用该函数
        $(document).ready(function(){
//            downloadBefore();
            popAction();

            document.documentElement.addEventListener('touchstart', function (event) {
                if (event.touches.length > 1) {
                    event.preventDefault();
                }
            }, false);
            var lastTouchEnd = 0;
            document.documentElement.addEventListener('touchend', function (event) {
                var now = Date.now();
                if (now - lastTouchEnd <= 300) {
                    event.preventDefault();
                }
                lastTouchEnd = now;
            }, false);

            if (window.screen.height<700) {
            $('.custorm-center-text-content').css({"margin-top":"100vw"});
            $('.download-button').css({"margin-top":"22px"});
            }
        })
//        function downloadBefore() {
//            $("div.download-button-content").mousedown(function(){
//                $("div.download-button-content").attr("custorm-state","1");
//
//                $("div.download-button-content").css({"background":"#3152cc"});
//                $(".download-button-content-txt").css({"color":"#ccc"});
//                $(".download-button-content-img").attr("src","/images/api/download_pre.png");
//            });
//            $("div.download-button-content").mouseup(function(){
//                $("div.download-button-content").attr("custorm-state","0");
//
//                $("div.download-button-content").css({"background":"#3152dd"});
//                $(".download-button-content-txt").css({"color":"white"});
//                $(".download-button-content-img").attr("src","/images/api/download.png");
//            });
//            $("div.download-button-content").mouseenter(function(){
//                var state = $("div.download-button-content").attr("custorm-state");
//                if (state!=="1") {
//                    return false;
//                }
//                $("div.download-button-content").css({"background":"#3152cc"});
//                $(".download-button-content-txt").css({"color":"#ccc"});
//                $(".download-button-content-img").attr("src","/images/api/download_pre.png");
//            });
//            $("div.download-button-content").mouseleave(function(){
//                var state = $("div.download-button-content").attr("custorm-state");
//                if (state!=="1") {
//                    return false;
//                }
//                $("div.download-button-content").css({"background":"#3152dd"});
//                $(".download-button-content-txt").css({"color":"white"});
//                $(".download-button-content-img").attr("src","/images/api/download.png");
//            });
//        }

        var browser = {
            versions: function () {
                var u = navigator.userAgent, app = navigator.appVersion;
                return {         //移动终端浏览器版本信息
                    trident: u.indexOf('Trident') > -1, //IE内核
                    presto: u.indexOf('Presto') > -1, //opera内核
                    webKit: u.indexOf('AppleWebKit') > -1, //苹果、谷歌内核
                    gecko: u.indexOf('Gecko') > -1 && u.indexOf('KHTML') == -1, //火狐内核
                    mobile: !!u.match(/AppleWebKit.*Mobile.*/), //是否为移动终端
                    ios: !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/), //ios终端
                    android: u.indexOf('Android') > -1 || u.indexOf('Linux') > -1, //android终端或uc浏览器
                    iPhone: u.indexOf('iPhone') > -1, //是否为iPhone或者QQHD浏览器
                    iPad: u.indexOf('iPad') > -1, //是否iPad
                    webApp: u.indexOf('Safari') == -1 //是否web应该程序，没有头部与底部
                };
            }(),
            language: (navigator.browserLanguage || navigator.language).toLowerCase()
        }
        function popAction() {

            var apkDownloadUrl = 'http://wallet.comsunny.com//download/lx_wallet.apk';
            var appStoreUrl = 'itms-services://?action=download-manifest&url=https://wallet.comsunny.com/download/ios/manifest.plist';

            $('div.download-button-content').click(function () {
                if (browser.versions.mobile) {//判断是否是移动设备打开。browser代码在下面
                    var ua = navigator.userAgent.toLowerCase();//获取判断用的对象\

                    if (ua.match(/micromessenger/i)) {
                        //在微信中打开
                        $("#popup").show();
                        return false;
                    }
                    if (ua.match(/weibo/i)) {
                        //在新浪微博客户端打开
                        $("#popup").show();
                        return false;
                    }
                    if (ua.match(/qq/i)) {
                     //在QQ空间打开
                     $("#popup").show();
                     return false;
                     }
                    if (browser.versions.ios) {
                        //是否在IOS浏览器打开
                        window.location.href = appStoreUrl; //appstore地址
                    }
                    if(browser.versions.android){
                        //是否在安卓浏览器打开
                        window.location.href = apkDownloadUrl; //apk下载地址
                    }
                } else {
                    //否则就是PC浏览器打开
                    window.location.href = apkDownloadUrl; //apk下载地址 pc也下载apk包
                }
                return false;
            });

            $("#popup").click(function () {
                $("#popup").hide();
            });
        }
    </script>
</head>
<body>
    {{--<img src="/images/api/pic.png" class="bg">--}}
    {{--<div class="bg"></div>--}}
    {{--<div  class="custorm-center-text-content">--}}
        {{--<div class="custorm-center-text">联心钱包是一款聚合形支付产品。</div>--}}
        {{--<div class="custorm-center-text">可以通过使用我们的产品，进行转账、支付、</div>--}}
        {{--<div class="custorm-center-text">购买商品。支持银联、支付宝、微信，</div>--}}
        {{--<div class="custorm-center-text">全面提高支付的便捷性。</div>--}}
        {{--<div class="download-button">--}}
            {{--<span class="download-button-content">--}}
                {{--<img src="/images/api/download.png" class="download-button-content-img">--}}
                {{--<div class="download-button-content-txt">立即下载</div>--}}
            {{--</span>--}}
        {{--</div>--}}

        {{----}}
    {{--</div>--}}
    <div class="btn btn-default download-button" style="background-color: #3152dd;">
        <img src="/images/api/download.png" class="download-button-content-img">
        <span class="download-button-content-txt">立即下载</span>
    </div>

    <div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
            这是按钮
            <sapn class="caret"></sapn>
        </button>
        <ul class="dropdown-menu">
            <li><a href="http://www.imooc.com">慕课网</a></li>
            <li><a href="http://www.baidu.com">百度</a></li>
            <li><a href="http://www.imooc.com">慕课网</a></li>
            <li><a href="http://www.baidu.com">百度</a></li>
        </ul>
    </div>

    <div class="input-group">
        <span class="input-group-addon">$</span>
        <input type="text" class="form-control">
    </div>

    <ul class="nav nav-tabs">
        <li class="active"><a href="www.imooc.com">慕课网</a></li>
        <li><a href="www.imooc.com">慕课网</a></li>
        <li><a href="www.imooc.com">慕课网</a></li>
    </ul>

    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="www.imooc.com">慕课网</a></li>
        <li><a href="www.imooc.com">慕课网</a></li>
        <li><a href="www.imooc.com">慕课网</a></li>
    </ul>

    <nav style="text-align: center">
        <ul class="pager">
            <li class="previous"><a href="www.imooc.com">left</a></li>
            <li class="next"><a href="www.imooc.com">right</a></li>
        </ul>

        <ul class="pagination">
            <li class="active"><a href="www.imooc.com">1</a></li>
            <li><a href="www.imooc.com">2</a></li>
            <li><a href="www.imooc.com">3</a></li>
        </ul>
    </nav>

    <div class="progress">
        <div class="progress-bar progress-bar-danger progress-bar-striped" style="width: 60%;">60%</div>
    </div>


    <ul class="list-group">
        <li class="list-group-item active">
            这是一个列表
            <span class="badge">14</span>
        </li>
        <li class="list-group-item disabled">
            这是一个列表
            <span class="badge">14</span>
        </li>
        <li class="list-group-item">
            这是一个列表
            {{--<span class="badge">14</span>--}}
            <div style="float: right">tsss</div>
        </li>
    </ul>

    <div class="panel panel-primary">
        <div class="panel-heading">这是头部</div>
        <div class="panel-body">ssss</div>
        <div class="panel-footer">这是尾部</div>
    </div>


    <button class="btn btn-primary" data-toggle="modal" data-backdrop="static" data-target="#danger">
        click
    </button>

    <div class="modal fade" id="danger">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                    <h4 class="modal-title">标题</h4></div>
                <div class="modal-body">联心钱包</div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button class="btn btn-primary" data-dismiss="modal">确定</button>
                </div>
            </div>

        </div>

    </div>



    <div class="popup" id="popup" style="display: none;">
        <div class="popcontent"></div>
    </div>

</body>

<script src="//cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>