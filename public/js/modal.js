// 警告框
var myAlert={
    show : alertShow ,
    hide : alertHide ,
};
// 确认框
var myModel={
    show : modalShow ,
    hide : modalHide ,
};


function alertShow( msg , className='.modelAlert') {
    $(className+" .content").html(msg);
    $(className).modal('show');
}

function  alertHide( msg , className='.modelAlert') {
    $(className+" .content").html("");
    $(className).modal('hide');
}

function modalShow() {

}

function modalHide() {

}