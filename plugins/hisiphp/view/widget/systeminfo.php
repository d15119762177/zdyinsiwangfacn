<div class="fl" style="width:49%">
    <table class="layui-table" lay-skin="line">
        <colgroup>
            <col width="160">
            <col>
        </colgroup>
        <thead>
            <tr>
                <th colspan="2">系统信息</th>
            </tr> 
        </thead>
        <tbody>
            <tr>
                <td>系统版本</td>
                <td>HisiPHP v{:config('hisiphp.version')}</td>
            </tr>
            <tr>
                <td>服务器环境</td>
                <td>{$Think.const.PHP_OS} / {$_SERVER["SERVER_SOFTWARE"]}</td>
            </tr>
            <tr>
                <td>PHP/MySql版本</td>
                <td>PHP {$Think.const.PHP_VERSION} / MySql {:db()->query('select version() as version')[0]['version']}</td>
            </tr>
            <tr>
                <td>ThinkPHP版本</td>
                <td>{$Think.VERSION}</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="fr" style="width:49%">
    <table class="layui-table" lay-skin="line">
        <colgroup>
            <col width="160">
            <col>
        </colgroup>
 
    </table>
</div>  