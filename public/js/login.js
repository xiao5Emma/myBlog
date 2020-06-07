log = console.log ;


function login(){
    var data = {
        "userID": $('.loginUser').val(),
        "password" :  MD5.createMD5String($('.loginPassword').val())  ,
    };
    ajax('/posts/login', data ,function (res) {
        log(res)
        if(res[0]===1) {
            var validate =  res[1]['validate'] ;
            if( validate===true ){
                window.location.href="/posts" ;
            }else if(validate === false){
                printErrorMsg(['用户id或密码错误,请重新输入! ']);
            }else{
                printErrorMsg(res[1]);
            }
        }else{
            var status = res[1]['status'] ;
            log( status );

            if(status==422)printErrorMsg(res[1]['responseJSON']['errors']);
        }
    });
}



$('.loginForm input').on('keypress',function (e) {
    if(e.charCode===13){
        login();
    }
})