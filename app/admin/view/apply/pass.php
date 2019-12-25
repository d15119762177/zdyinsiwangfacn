<!--
+----------------------------------------------------------------------
| 添加修改实例模板，Ctrl+A 可直接复制以下代码使用
| select元素需要加type="select"
| 所有可编辑的表单元素需要按以下格式添加class名：class="field-字段名"
+----------------------------------------------------------------------
-->
<!-- <div class="layui-collapse page-tips">
    <div class="layui-colla-item">
        <h2 class="layui-colla-title">温馨提示</h2>
        <div class="layui-colla-content">
            <p>此页面为后台[添加/修改]标准模板，您可以直接复制使用修改</p>
        </div>
    </div>
</div> -->

<form class="layui-form layui-form-pane" action="{:url('admin/apply/addAgent')}" id="editForm" method="post">
  <!--   <fieldset class="layui-elem-field layui-field-title">
        <legend>修改代理</legend>
    </fieldset> -->
    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="phone" autocomplete="off" placeholder="请输入手机号查找用户" style="width:300px;">
        </div>
        <label class="layui-form-label"><a href="javascript:void(0)" onclick="find()">查找</a></label>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item" >
        <label class="layui-form-label">绑定用户</label>
        <div class="layui-input-inline" style="z-index: 999;">
            <select name="userinfo" class="field-userinfo layui-input layui-unselect" type="select" lay-ignore>
                <option value="0">请通过手机号搜索</option>
            </select>
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-input-block">
            <input type="hidden" class="field-id" name="id">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
        </div>
    </div>

    <input type="hidden" name="id" value="{$id}">
</form>
{include file="admin@block/layui" /}

<script>
    //查找用户绑定
function find(){
   var keywords = $('input[name="phone"]').val();
  $.post( "{:url('admin/apply/userInfo')}",{'keywords':keywords},function(data){
        var obj=JSON.parse(data);
        if(obj!='undefine' && obj!=null && obj!=''){
            $('select[name="userinfo"]').html('');
            for (var i = 0; i < obj.length; i++) { 
              var str_user="<option value=\""+obj[i].id+"\">"+obj[i].id+"."+obj[i].name+"</option>";

              $('select[name="userinfo"]').append(str_user);

            }
        }else{
            $('select[name="userinfo"]').html('');

            var str_user="<option value=\""+0+"\">"+'暂无数据'+"</option>";

            $('select[name="userinfo"]').append(str_user);
        }         
        
   });

}
</script>
<!--
/**
 * editor 富文本编辑器
 * @param array $obj 编辑器的容器ID
 * @param string $name [为了方便大家能在系统设置里面灵活选择编辑器，建议不要指定此参数]，目前支持的编辑器[ueditor,umeditor,ckeditor,kindeditor]
 * @param string $upload [选填]附件上传地址
 */
-->
{:editor(['UEditor1', 'UEditor2'])}
<!-- <script src="__STATIC__/admin/js/footer.js"></script> -->

    