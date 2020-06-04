// 富文本对象
function createEditor(){
    window.onload=function () {
            editor = new window.wangEditor( document.getElementById('editor') );
            editor.customConfig.uploadImgServer = '/posts/image/upload';
            editor.customConfig.uploadImgParams = {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
            editor.create();
            // // 上传文件名
            // editor.customConfig.uploadFileName = new Date().getTime() ;
            // // 3s 超时
            // editor.customConfig.uploadImgTimeout = 3000
    };
}

