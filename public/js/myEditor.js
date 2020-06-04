// 富文本对象
var editor = "";
function createEditor(){
        if(editor !== "")return editor;
        editor = new window.wangEditor( document.getElementById('editor') );
        editor.customConfig.uploadImgServer = '/posts/image/upload';
        editor.customConfig.debug = true;
        editor.customConfig.uploadImgParams = {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
        editor.create();
        return editor;
        // console.log(editor,callback , callback==="");
        // if(callback!=='')callback(editor);
        // // 上传文件名
        // editor.customConfig.uploadFileName = new Date().getTime() ;
        // // 3s 超时
        // editor.customConfig.uploadImgTimeout = 3000

}


function initEditorData(html){
    createEditor();
    editor.txt.html(html);
}