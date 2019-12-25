{include file="block/layui" /}
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>ID</th>
      <th>用户名</th>
      <th>保险名</th>
      <th>投保人</th>
      <th>受保人</th>
      <th>投保额度</th>
      <th>缴费时间</th>
      <th>首年保费</th>
      <th>保险生效时间</th>
      <th>保险失效时间</th>
      <th>备注</th>
      <th>关联文件表ID</th>
      <th>添加时间</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>{$orderInfo.id}</td>
      <td>{$orderInfo.userName}</td>
      <td>{$orderInfo.goodsName}</td>
      <td>{$orderInfo.applicant}</td>
      <td>{$orderInfo.insurant}</td>
      <td>{$orderInfo.quota}</td>
      <td>{$orderInfo.paymenTime}</td>
      <td>{$orderInfo.premium}</td>
      <td>{$orderInfo.startTime}</td>
      <td>{$orderInfo.endTime}</td>
      <td>{$orderInfo.remark}</td>
      <td>{$orderInfo.fileId}</td>
      <td>{$orderInfo.createTime}</td>
    </tr>
  </tbody>
</table>
<form action="{:url('admin/Order/uploadComfirm')}">
<div class="layui-form-item">
    <label class="layui-form-label">上传文件</label>
    <div class="layui-input-inline upload">
        <button type="button" name="upload" class="layui-btn layui-btn-primary layui-upload" lay-data="{exts:'pdf', accept:'file'}">请上传pdf</button>
        <input type="hidden" class="upload-input" name="file">
    </div>
    <div class="layui-form-mid layui-word-aux">只支持pdf格式的文件</div>
</div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-text"  style="margin-left: 5%">
            <h2>请确认下方确认书是否为此订单的，确认无误后点击提交</h2>
        </div>
    </div>
    <input type="hidden" name="userId" value="{$orderInfo.userId}">
    <input type="hidden" name="orderId" value="{$orderInfo.id}">
    <input type="hidden" name="goodsName" value="{$orderInfo.goodsName}">
    <input type="hidden" name="userName" value="{$orderInfo.userName}">
</form>
<div class="pdf" style="margin-left: 5%">
    <iframe  id ="pdf_page"  name ="pdf_page" style="width:1000px;height:640px"  >
    </iframe>
</div>

{include file="block/layui" /}
<script src="__PUBLIC_JS__/jquery.media.js"></script>
<script>
    layui.use(['jquery', 'laydate', 'upload'], function() {
        var $ = layui.jquery, layer = layui.layer, upload = layui.upload;
        upload.render({
            elem: '.layui-upload',
            url: '{:url("admin/annex/upload?thumb=no&water=no&group=pdf")}'
            ,method: 'post'
            ,before: function(input) {
                layer.msg('文件上传中...', {time:3000000});
            },done: function(res, index, upload) {
                var obj = this.item;
                if (res.code == 0) {
                    layer.msg(res.msg);
                    return false;
                }
                layer.closeAll();
                $(obj).parents('.upload').find('.upload-input').val(res.data.file);
                $(obj).parents('.upload').find('button').text('文件上传成功');

                $("#pdf_page").attr("src",res.data.file);
                $(".pdf").media();
            }
        });
    });
</script>
