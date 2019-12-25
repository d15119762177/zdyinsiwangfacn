
<form class="layui-form layui-form-pane" action="{:url('admin/domainname/add')}" id="editForm" method="post">
 
    <div class="layui-form-item">
        <label class="layui-form-label">标题</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="title" lay-verify="title" autocomplete="off" placeholder="请输入标题" style="width:300px;" value="">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>

    <div class="layui-form-item">
        <label class="layui-form-label">域名</label>
        <div class="layui-input-inline">
            <input type="text" class="layui-input field-username" name="url" lay-verify="url" autocomplete="off" placeholder="请输入域名" style="width:300px;" value="">
        </div>
        <!-- <div class="layui-form-mid layui-word-aux">表单操作提示</div> -->
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
          <label class="layui-form-label">分组选择框</label>
          <div class="layui-input-inline">
            <select name="userId">
                {volist name="data" id="vo"}
                    <option value="{$vo.id}">{$vo.nick}</option>
                {/volist}
            </select>
          </div>
        </div>
    </div>


    <div class="layui-form-item">
        <div class="layui-input-block">
            <button type="submit" class="layui-btn layui-btn-normal" lay-submit="" lay-filter="formSubmit">提交</button>
            <a href="{:url('admin/domainname/index')}" class="layui-btn layui-btn-primary ml10"><i class="aicon ai-fanhui"></i>返回</a>
        </div>
    </div>
</form>

{include file="block/layui" /}
 