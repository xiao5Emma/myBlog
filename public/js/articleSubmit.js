// 文章操作 ,ajax 要放在前面引入, myblog 后面调用
var articleObj = {
    validate : validateArticle,
    submit : submitArticle,
    delete : deleteArticle,
};
function validateArticle(title,content) {
    title = $.trim(title);
    content = $.trim(content);
    content=content.replace(/<.*?>/g,"");

    if(title==="" )return "标题为空"
    if(content==="" )return "内容为空"
    if( title.length<1 )return "标题不得少于1个字"
    if( title.length>255 )return "标题不得超过255个字"
    if( content.length<1 )return "内容不得少于1个字"
    if( content.length>3000 )return "内容不得超过3000个字"
    return true;
}



function deleteArticle(){
    var id = $.trim($('[name="deleteConfirm"]').attr('id')) ;
    var data ={ 'id' : id };
    ajax('/posts/delete', data ,function (res) {
        window.location.href = '/posts/articles';
    },'post','text');
}


function submitArticle(title,content,callback="") {
    var data = {
        "title": title,
        "content" : content
    }
    ajax('/posts', data ,function (res) {
        if(callback!=="")callback(res);
        console.log(res)
    });
}