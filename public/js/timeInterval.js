// 先引入jq3 ,ajax.js
log= console.log;
var timeIntervalObj = {
    start : startTimeInterval ,
    stop : stopTimeInterval
};


function startTimeInterval(){
    if(timeInterval===null){
        timeInterval = setInterval(function(ajax,timeIntervalObj){
            ajax('/posts/runTime', "" ,function (res) {
                if(!res[0]){
                    timeIntervalObj.stop();
                    log("通讯异常, 时间动画更新失败");
                    return;
                }
                var time = res[1];
                $('.runYears').html(time['year']);
                $('.runMonths').html(time['month']);
                $('.runDays').html(time['day']);
                $('.runHours').html(time['hour']);
                $('.runMinutes').html(time['minute']);
                $('.runSeconds').html(time['second']);
            });
        },1000,ajax,timeIntervalObj);
    }
    return timeInterval ;
}

function stopTimeInterval(){
    if(timeInterval!==null){
        clearInterval(timeInterval);
        timeInterval = null ;
    }
}