<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<title>计划资料</title>
</head>
    <style>
@media(min-width:720px){
.appwexi{
   max-width: 720px;
}
}
body{max-width: 720px; background:#fff;}
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

ul{padding: 0px;margin: 0;}
ul li{
   list-style-type:none;line-height: 2rem;
}
.appwexi{
    margin: 0 auto;
    padding: 30px 15px;
    background: #fff;
}

/***title***/
.title ul li{
    width: 100%;
    margin: 0 auto;
    text-align: center;
}
.title ul li h3{ 
    margin:0;
}

.title ul li h3 span{ 
    margin-left: -8px;
    margin-right: 4px;
    font-weight: bold;
    color: #f00;
}
.title ul li:nth-child(2){
font-size: 0.8rem;
}

.conner-list{
    display: -webkit-flex;
    display: flex;

    width: 100%;
    border-bottom: 1px solid #e3e3e3;
}


.flex-item:first-child{ 
    color: #5e5a5a;
    width: 30%;
    font-weight: bold;
    height: 1.6em;
    line-height: 2.08rem;
}

.flex-item {
    width: 100%;
    margin: 10px;
}

.flex-item p{
    position: relative;
    margin: 0;
    color: #f00;
    float: left;
    margin-left: -9px;
}

.flex-item input{
    width: 100%;
    height: 2em;
    border: 0px;
    outline: 0;
}

/***单选框样式****/
.radio label{
    display: block;
    width: 95px;
    float: left;
    margin: 0.8% 0;
}
.radio input{
    width: 1.8rem;
    height: 1.8rem;
    border: 0px;
    float: left;
    display:none;
}

input[type="radio"] + label::before {
    content: "\a0"; /*不换行空格*/
    display: inline-block;
    vertical-align: middle;
    font-size: 18px;
    width: 1em;
    height: 1em;
    margin-right: .4em;
    border-radius: 50%;
    border: 1px solid #cbcbcb;
    text-indent: .15em;
    line-height: 1; 
    background: #fff;
    padding: 0.1em;
}

input[type="radio"]:checked + label::before {
    background-color:#ff0f0f;
    background-clip: content-box;
    padding: 0.1em;
}
input[type="radio"] {
    position: absolute;
    clip: rect(0, 0, 0, 0);
}
/*select样式*/
.flex-item-select{
  border-radius: 5px;
  position: relative;
}
.flex-item-select select{
  border-color: rgb(255, 255, 255);
  border-radius: 6px;
  border: none;
  outline: none;
  width: 100%;
  height: 2rem; 
  line-height: 2rem;
  appearance: none;
  padding-left: 0.6rem;
}
/*.flex-item-select:after{
  content: "";
  width: 25px;
  height: 25px;
  position: absolute;
  background-size: 100% 100%;
  right: 10px;
  top: 18%;
  pointer-events: none;

}*/
/***三列弹性盒子布局****/
.flex-item-input{position: relative; right: -2.57%;}
.flex-item-on{
    width: 17%;
    margin: 0;
    line-height: 3.175rem;
    position: relative;
    right: 0;
    background: #fff;
    text-align: center;
}
/*底部按钮样式**/
.bottom{
    width: 100%; margin:0 auto;margin-top: 15px;
}
.bottom button{   
    outline: none; 
    background-color: #fa1818; /* Green */
    border: none;
    color: white;
        padding: 15px 0 15px 0px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;    
    margin-top: 15px;
  width:100%;
}

</style>

<body>
  <div style="height:15px; width:100%; background:#f6f6f6;"></div>
  <div class="appwexi" style="    padding: 30px 15px 0px 15px;">
        <div class="title">
             <ul>
                 <li><h3><span>|</span>计划资料</h3></li>
                 <li>请填写并核对信息</li>
             </ul>
        </div>
    <form action="{:url('index/Visitbook/submitPlan')}" method="post">

        <div class="conner">
                <div class="conner-list" style="border-top: 1px solid #e3e3e3;">
                      <div class="flex-item">
                          <p>*</p>
                          计划名称
                      </div>
                      <div class="flex-item radio radio-select">
                          <div class="flex-item-select">
                              <select name="goodsId">
                                  <option  style=" display:none">请选择产品</option>  
                                    {volist name="list" id="vo"}
                                        <option value="{$vo.id}" {if condition="isset($info['goodsId']) && ($info.goodsId eq $vo.id)"}selected{/if} >{$vo.title}</option>
                                    {/volist}
                              </select>
                          </div>
                      </div>
                </div>
                
                <div class="conner-list">
                      <div class="flex-item">币种</div>
                      <div class="flex-item radio">
                            <div class="female">
                                <input type="radio" id="female" name="payMoney" value="2" {if condition="isset($info['payMoney']) && ($info.payMoney eq 2)"}checked{/if} />
                                <label for="female">美金</label>
                            </div>
                            <div class="male">                
                                <input type="radio" id="male" name="payMoney" value="1" {if condition="isset($info['payMoney']) && ($info.payMoney eq 1)"}checked{/if} />
                                <label for="male">港币</label>
                            </div>
                      </div>
                </div>      
                
                <div class="conner-list">
                      <div class="flex-item">保额</div>
                      
                        <div class="flex-item radio radio-select">
                            <div class="flex-item-select">
                                <select name="coverage">
                                    <option  style=" display:none">请填写你需要的保额</option> 
                                    {if condition=" (isset($info['coverage']) && $info.coverage neq 50) &&  (isset($info['coverage']) && $info.coverage neq 100 ) "}
                                        <option value="{$info['coverage']}"selected>{$info['coverage']}万</option>
                                    {/if}

                                    <option value="50" {if condition="isset($info['coverage']) && ($info.coverage eq 50)"}selected{/if}>50万</option>
                                    <option value="100" {if condition="isset($info['coverage']) && ($info.coverage eq 100)"}selected{/if}>100万</option>
                                    <option value="0" >其他</option>
                                </select>
                            </div>
                        </div>
                </div> 
        </div>
  </div>
  <style>
  .appwexi-on{background: #ffc7c7;
    padding: 5px 15px 5px 15px;
    border: 1px solid #ff9f9f;border-left: 0px solid #ff9f9f;}
  .appwexi-on .conner-list{border-bottom:0px;}
  .appwexi-on .conner-list .flex-item{height: auto;margin: 0px 0px 0px 10px;    width: 100%;}
  .appwexi-on .conner-list .flex-item p{width: 100%;margin-left: 0;    width: 100%;}
  .appwexi-on .conner-list .flex-item ul li{font-size: 0.6rem;
    width: 100%;
    line-height: 1.6rem;}
  </style>
  <div class="appwexi  appwexi-on">
    <div class="conner-list">
        <div class="flex-item">
            <p>温馨提示</p>
          <ul>
            <li>1)投保金額達人民幣10萬以上，請客人先與銀行開通限額，一般銀聯卡自動有限制每次刷卡上限及每天刷卡上限。也可以選擇多張銀聯卡組合繳費(除躉繳外)。</li>
            <li>2)繳費之銀聯卡必須由持卡人親身刷卡，如持卡人非投保人，必須為直系親屬如父母/子女/配偶/兄弟姊妹。(需出示證明)</li>
            <li>3)所有香港保險公司都以港幣刷卡，不論銀聯卡是什麼貨幣，程序如同香港商戶刷卡消費，匯率跟據銀行而定。如保單貨幣為美元，會把保費轉為港幣收費。</li>
            <li>4)可即時交現金，但有上限。保誠為8,000美金，友邦為10,000美金，不設找續。</li>
          </ul>
        </div>
    </div> 
  </div>

  <div style="height:15px; width:100%; background:#f6f6f6;"></div>
  <div class="appwexi">
    <div class="title">
       <ul>
         <li><h3><span>|</span>职业资料</h3></li>
         <li>请填写并核对信息</li>
       </ul>
    </div>
        <div class="conner">
            <div class="conner-list" style="border-top: 1px solid #e3e3e3;">
                <div class="flex-item">
                  <p>*</p>
                  公司名称
                </div>
                <div class="flex-item">
                   <input placeholder="请填写你的公司名称" name="applyCompanyName" value="{$info.applyCompanyName|default=''}" />
                </div>
            </div>
            <div class="conner-list">
                <div class="flex-item">
                  <p>*</p>
                  业务性质
                </div>
                <div class="flex-item">
                  <input placeholder="请填写业务性质" name="applyBusinessNature" value="{$info.applyBusinessNature|default=''}" />
                </div>
            </div>
            <div class="conner-list">
                <div class="flex-item">
                  <p>*</p>
                  工作职称
                </div>
                <div class="flex-item">
                  <input placeholder="请输入你的职称" name="applyJobTitle" value="{$info.applyJobTitle|default=''}" />
                </div>
            </div>
            <div class="conner-list">
                <div class="flex-item">
                  <p>*</p>
                  公司地址
                </div>
                <div class="flex-item">
                  <input placeholder="请输入公司地址" name="applyCompanyAddress" value="{$info.applyCompanyAddress|default=''}" />
                </div>
            </div>  
        </div>
      </div>
      <div style="height:15px; width:100%; background:#f6f6f6;"></div>
      <div class="appwexi">
        <div class="title">
           <ul>
             <li><h3><span>|</span>收入来源（过去12个月内总收入）</h3></li>
             <li>请填写并核对信息</li>
           </ul>
        </div>
        <div class="conner">
            <div class="conner-list" style="border-top: 1px solid #e3e3e3;">
                          <div class="flex-item">
                              <p>*</p>
                              工资
                          </div>
                          <div class="flex-item flex-item-input">
                                <input placeholder="请填写你的工资" name="applyWages" value="{$info.applyWages|default=''}" />
                          </div>
                          <div class="flex-item flex-item-on">
                               港币
                          </div>
            </div>
            <div class="conner-list">
                          <div class="flex-item">
                              <p>*</p>
                              奖金
                          </div>
                          <div class="flex-item flex-item-input">
                                <input placeholder="请填写你的奖金" name="applybonus" value="{$info.applybonus|default=''}" />
                          </div>
                          <div class="flex-item flex-item-on">
                               港币
                          </div>
            </div>
            <div class="conner-list">
                          <div class="flex-item">
                              <p>*</p>
                              其他收入
                          </div>
                          <div class="flex-item flex-item-input">
                                <input placeholder="其他收入金额" name="applyOtherIncome" value="{$info.applyOtherIncome|default=''}" />
                          </div>
                          <div class="flex-item flex-item-on">
                               港币
                          </div>
            </div>
            <div class="conner-list">
                <div class="flex-item">
                  <p>*</p>
                  收入来源
                </div>
                <div class="flex-item">
                  <input placeholder="请填写其他收入的收入来源" name="applyIncomeStream" value="{$info.applyIncomeStream|default=''}" />
                </div>
            </div>  
        </div>
            <div class="bottom">
                <input type="text" id="type" name="type" style="display: none" />
                <button href="#" type="submit" class="btn btn1" onclick="$('#type').val(0)">上一页</button>
                <button href="#" type="submit" class="btn btn1" onclick="$('#type').val(1)">受保人为非申请人</button>
                <button href="#" type="submit" class="btn btn1" onclick="$('#type').val(2)">受保人为申请人</button>
            </div>
          <input type="hidden" name="orderId" value="{$orderId|default=''}">
          <input type="hidden" name="userId" value="{$userId|default=''}">
      </div>
  </form>
</body>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>

<script>

$(".flex-item .flex-item-select select").change(function () {
    if($(this).val() == 0){
        $(".flex-item .flex-item-select").html('<input placeholder="请填写额度" name="coverage"/>');
        $(".conner-list .radio-select").removeClass("radio");
        $(".conner-list .flex-item  div").removeClass("flex-item-select");
    }
})

</script>

</html>
