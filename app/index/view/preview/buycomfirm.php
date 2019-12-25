{include file="block/layui" /}
<link rel="stylesheet" href="__ADMIN_JS__/layui/css/layui.css?v={:config('hisiphp.version')}">
<link rel="stylesheet" href="__ADMIN_CSS__/theme.css?v={:config('hisiphp.version')}">
<link rel="stylesheet" href="__ADMIN_CSS__/style.css?v={:config('hisiphp.version')}">
<link rel="stylesheet" href="__STATIC__/fonts/typicons/min.css?v={:config('hisiphp.version')}">
<link rel="stylesheet" href="__STATIC__/fonts/font-awesome/min.css?v={:config('hisiphp.version')}">
<br>
<div class="layui-form-item">
    <div class="layui-text"  style="margin-left: 5%">
        <h1 style="font-size: 50px;
            margin-top: 3%;
            margin-bottom: 3%;">
            请确认下方确认书后，选择点击是否购买
        </h1>
    </div>
</div>

<!--<div class="pdf" style="margin-left: 5%">-->
<!--    <iframe  id ="pdf_page"  name ="pdf_page" style="width:1000px;height:640px"  src="{$fileUrl}">-->
<!--    </iframe>-->
<!--</div>-->
<!--<a href="{$fileUrl}">点击查看详情</a>-->
<!--<embed :src="{$fileUrl}" type="application/pdf" width="100%" height="100%">-->

<!--<div class="wrapper" id="pdf-container"></div>-->
<iframe src="__STATIC__/pdfjs/web/viewer.html?file={$fileUrl}" id="iframePreview" width='100%' height='100%' allowfullscreen webkitallowfullscreen></iframe>
<style>
    .bigbtn{
        height: 85px;
        line-height: 44px;
        padding: 0 25px;
        font-size: 40px;
    }
</style>
<form action="{:url('index/Preview/buycomfirm')}" method="post">

    <div class="layui-form-item">
        <div style="text-align: center">
            <button type="submit" class="bigbtn layui-btn layui-btn-radius layui-btn-normal" lay-submit="" lay-filter="formSubmit">确认购买</button>
            <button type="button" class="bigbtn layui-btn layui-btn-radius layui-btn-normal" lay-submit="" lay-filter="formSubmit">取消购买</button>
        </div>
    </div>

    <input type="hidden" name="orderId" value="{$orderId}">
    <input type="hidden" name="operate" value="ok">
</form>

<script src="__ADMIN_JS__/layui/layui.js"></script>
<script src="__PUBLIC_JS__/jquery.2.1.4.min.js"></script>
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


            }
        });
    });

    $(function () {


    })
</script>
<script src="__STATIC__/pdfjs/build/pdf.js"></script>

<!--<script>-->
<!--    //程序只能在服务器上运行-->
<!--    window.onload = function () {-->
<!--        //创建-->
<!--        function createPdfContainer(id,className) {-->
<!--            var pdfContainer = document.getElementById('pdf-container');-->
<!--            var canvasNew =document.createElement('canvas');-->
<!--            canvasNew.id = id;-->
<!--            canvasNew.className = className;-->
<!--            pdfContainer.appendChild(canvasNew);-->
<!--        };-->
<!---->
<!--        //渲染pdf-->
<!--        //建议给定pdf宽度-->
<!--        function renderPDF(pdf,i,id) {-->
<!--            pdf.getPage(i).then(function(page) {-->
<!---->
<!--                var scale = 1.5;-->
<!--                var viewport = page.getViewport(scale);-->
<!---->
<!--                //-->
<!--                //  准备用于渲染的 canvas 元素-->
<!--                //-->
<!---->
<!--                var canvas = document.getElementById(id);-->
<!--                var context = canvas.getContext('2d');-->
<!--                canvas.height = viewport.height;-->
<!--                canvas.width = viewport.width;-->
<!---->
<!--                //-->
<!--                // 将 PDF 页面渲染到 canvas 上下文中-->
<!--                //-->
<!--                var renderContext = {-->
<!--                    canvasContext: context,-->
<!--                    viewport: viewport-->
<!--                };-->
<!--                page.render(renderContext);-->
<!--            });-->
<!--        };-->
<!--        //创建和pdf页数等同的canvas数-->
<!--        function createSeriesCanvas(num,template) {-->
<!--            var id = '';-->
<!--            for(var j = 1; j <= num; j++){-->
<!--                id = template + j;-->
<!--                createPdfContainer(id,'pdfClass');-->
<!--            }-->
<!--        }-->
<!--        //读取pdf文件，并加载到页面中-->
<!--        function loadPDF(fileURL) {-->
<!--            PDFJS.getDocument(fileURL).then(function(pdf) {-->
<!--                //用 promise 获取页面-->
<!--                var id = '';-->
<!--                var idTemplate = 'cw-pdf-';-->
<!--                var pageNum = pdf.numPages;-->
<!--                //根据页码创建画布-->
<!--                createSeriesCanvas(pageNum,idTemplate);-->
<!--                //将pdf渲染到画布上去-->
<!--                for (var i = 1; i <= pageNum; i++) {-->
<!--                    id = idTemplate + i;-->
<!--                    renderPDF(pdf,i,id);-->
<!--                }-->
<!---->
<!--            });-->
<!--        }-->
<!--        //如果在本地运行，需要从服务器获取pdf文件-->
<!--        //loadPDF('http://www.cityworks.cn/baoan_water/234.pdf');-->
<!--        //如果在服务端运行，需要再不跨域的情况下，获取pdf文件-->
<!--        loadPDF("{$fileUrl}");-->
<!---->
<!--    };-->
<!---->
<!--</script>-->

