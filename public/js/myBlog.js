

log = console.log;

function editArticle(obj){
    window.location.href = '/posts/'+$(obj).attr('id') +'/edit' ;
}

function  tagsManager(obj){
    window.location.href = '/posts/tags/'+$(obj).val() ;
}

function showArticle (obj){
    window.location.href = '/posts/'+ $(obj).attr('id') ;
}

function mobieLinkShow(){
    $('#mobieQrcode').show();
}

function mobieLinkHide(){
    $('#mobieQrcode').hide();
}


function store(){
    var data = {
        "title": $('#create_title').val(),
        "content" : editor.txt.html()
    }
    // console.log()
    ajax('/posts', data ,function (res) {
        var flag = res[0];
        var id = res[1];
        if(!flag){alert("提交失败 : " + msg);return;}
        window.location.href="/posts/" + id;
    });
}



// 事件监听
$('.head_list_left a,.head_list_right a').on('mouseover',function (e) {
    ele = $(e.target).closest('div') ;
    ele.css({
        "background-color": "darkgray",
    });
    $(e.target).css({
        "color": "white"
    });
}).on('mouseout',function (e) {
    ele = $(e.target).closest('div') ;
    ele.css({
        "background-color": "unset",
    });

    $(e.target).css({
        "color": "#495057"
    });
})