function ajax(url,p_data={},callback="",type="post",dataType ="json"){
    var data =  {_token: $('meta[name="_token"]').attr('content')} ;
    Object.assign(data, p_data);

    $.ajax({
        url: url,
        data: data ,
        type:type,
        dataType:dataType,
        success:function(res){
            if(callback)callback([1, res]);
        },
        error: function(res) {
            if(callback)callback([0, res]);
            console.log('ajax 请求失败, url '+ url +" data " , data , "type" + type );
        }
    });
}

// ajax('/posts',{  "name":"aaa" },function (res) {
//     var flag = res[0];
//     var msg = res[1];
//     console.log(res);
// });