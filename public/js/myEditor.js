// 富文本对象
var editor = "";
log =console.log ;
function createEditor(){
        if(editor !== "")return editor;
        editor = new window.wangEditor( document.getElementById('editor') );
        editor.customConfig.uploadImgServer = '/posts/image/upload';
        editor.customConfig.debug = true;
        editor.customConfig.uploadImgParams = {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        // 3s 超时
        editor.customConfig.uploadImgTimeout = 3000

        // 配置服务器端请求地址
        editor.customConfig.uploadImgServer = '/posts/image/upload'

        // 自定义上传参数
        editor.customConfig.uploadImgParams = {
            _token: $('meta[name="_token"]').attr('content'),
        }

        // 上传回调
        editor.customConfig.uploadImgHooks = {
            customInsert: function (insertImg, result, editor) {
                // 举例：假如上传图片成功后，服务器端返回的是 {url:'....'} 这种格式，即可这样插入图片：
                var url = result.url
                insertImg(url)
            }
        };

        // 上传文件名
        editor.customConfig.uploadFileName = "wangEditorImgage" ;
        editor.create();
        return editor;



}


function initEditorData(title,html){
    $('.create_title').val(title);
    createEditor();
    editor.txt.html(html);
}

