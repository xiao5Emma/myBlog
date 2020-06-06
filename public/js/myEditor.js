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

        // editor.customConfig.onchange = function (html) {
        //     log (html);
        //     $('.contentInput').val(html);
        // }
        editor.create();
        return editor;
        // console.log(editor,callback , callback==="");
        // if(callback!=='')callback(editor);
        // // 上传文件名
        // editor.customConfig.uploadFileName = new Date().getTime() ;
        // // 3s 超时
        // editor.customConfig.uploadImgTimeout = 3000

}


function initEditorData(title,html){
    $('.create_title').val(title);
    createEditor();
    editor.txt.html(html);
}

