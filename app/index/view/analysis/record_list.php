<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>我的分析记录</title>
</head>
<style>
    @media(min-width:720px){
        .appwexi{
            max-width: 720px;
        }
    }
    body{max-width: 720px; background:#f5f6f8;}
    html{
        background: #f6f6f6;
        overflow: auto;
    }
    html,body{
        height:100%;
        width:100%;
        margin: 0 auto;
        padding:0;
    }
    ul li{ list-style-type:none;}
    a{display: block;
        color: #000;
        text-decoration: none;}


    /*conner内容样式**/
    .conner{
        margin: 5% 5% 22% 5%;
        border-radius: 6px;
        height: 100%;
    }

    .conner .conner-img{
        padding: 16%;
        background: #fff;
    }

    .conner .conner-list{
        background: #fff;
        height: 100%;
        padding: 5%;
        margin-bottom: 5%;
        box-shadow: 1px 4px 8px #dcdcdc;
    }

    /***弹性盒子布局**/
    .conner-list .conner-input ul{
        display: flex;
        width: 100%;
        padding: 12px 0;
        border-bottom: 1px solid #f5efef;
        margin: 0;
    }
    .conner-list .conner-input ul li:first-child{
        width: 100%;
        font-weight: 600;
        color: #000;
    }
    .conner-list .conner-input ul li{
        width:18%;
        color: #ff9500;
    }
    .conner-list .conner-input ul li input{
        border: 0px;
        font-size: 1rem;
        width: 100%;outline:none;
    }

    .conner-list .conner-input ul li span{
        width: 7px;
        display: block;
        margin: 0.35rem auto;
        height: 7px;
        border-top: 2px solid #010101;
        border-right: 2px solid #090909;
        transform: rotate(45deg);
    }


    /****form提交框样式***/
    .conner-battom{
        margin-top: 30px;
    }
    .conner-bottom input{
        outline: none;
        background-color: #17c2d3;
        border: none;
        color: white;
        padding: 15px 0 15px 0px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-top: 35px;
        width: 100%;
        border-radius: 8px;
    }
    .conner-bottom p{
        margin: 0;
        width: 100%;
        text-align: center;
        color: #17c2d3;
        font-size: 0.8rem;
        line-height: 2rem;
    }
</style>

<body>
<div class="conner">
    <div class="conner-list">
        <div class="conner-input">
            {volist name="recordList" id="vo"}
            <a {if condition="$vo.status eq 0"}href="{:url('index/productplan/index',['goodsName' => $vo.goodsName])}"{/if}>
                <ul>
                    <li>{$vo.goodsName}</li>
                    <li>{if condition="$vo.status eq 0"}<span></span>{else /}待分析{/if}</li>
                </ul>
            </a>
            {/volist}

        </div>
    </div>
</div>
</body>

</html>
