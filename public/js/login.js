log = console.log ;

function login(){
    var data = {
        "userID": $('.loginUser').val(),
        "password" :  $.md5($('.loginPassword').val()) ,
    };
    ajax('/posts/login', data ,function (flag) {
        log(flag);return
        if(!flag){alert("登录失败! ");return;}

        window.location.href="/posts" ;
    });
}