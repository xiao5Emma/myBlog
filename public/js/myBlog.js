

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
    
    ajax('/posts', data ,function (res) {
        var flag = res[0];
        var id = res[1];
        if(!flag){alert("提交失败 : " + msg);return;}
        window.location.href="/posts/" + id;
    });
}
function deleteArticle(){
    var id = $('[name="deleteConfirm"]').attr('id') ;
    alert("http://xiao5.fun:8000/posts/" + id + '/delete')
    window.location.href = "http://xiao5.fun:8000/posts/" + id + '/delete';
}


function deleteComfirm(id){
    $('#deleteComfirm').modal();
    $('[name="deleteConfirm"]').attr('id',id) ;
}

function like(){
    // UI变化
}

function share(id){
    alert('功能开发中..');
    return ;
    wx.config({
        debug: false, // 开启调试模式,调用的所有api的返回值会在客户端alert出来，若要查看传入的参数，可以在pc端打开，参数信息会通过log打出，仅在pc端时才会打印。
        appId: 'gh_3d08a12d9f9a', // 必填，公众号的唯一标识
        timestamp: ((new Date().getTime() +"").substr(0,10))*1, // 必填，生成签名的时间戳
        nonceStr: 'nonceStrnonceStr', // 必填，生成签名的随机串
        signature: data.signature,// 必填，签名，见附录1
        jsApiList: ['checkJsApi',
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'translateVoice',
            'startRecord',
            'stopRecord',
            'onRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard'] // 必填，需要使用的JS接口列表，所有JS接口列表见附录2
    });
    wx.ready(function () {
        wx.onMenuShareAppMessage({
            title: '分享标题', // 分享标题
            desc: '分享描述', // 分享描述
            link: 'http://xiao5.fun:8000/posts/1', // 分享链接，该链接域名或路径必须与当前页面对应的公众号JS安全域名一致
            imgUrl: '#', // 分享图标
            type: 'link', // 分享类型,music、video或link，不填默认为link
            dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
            success: function () {
                alert('分享成功')
            }
        });
    });

    wx.error(function (res) {
        alert("error: " + res.errMsg);
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