<script src="__ADMIN_JS__/layui/layui.js?v={:config('hisiphp.version')}"></script>
<script>
    var ADMIN_PATH = "{$_SERVER['SCRIPT_NAME']}";
    layui.config({
        base: '__ADMIN_JS__/',
        version: '{:config("hisiphp.version")}'
    }).use('global');
</script>