<div class="container-fluid headBox" style="position: fixed;top:0;left: 0;z-index: 10000;height:3em ">
    <div class="row " id="index_nav" style="background-color: #dadada;color: #5e5e5e" >
                <div class="col-sm-1 text-center head_list_right" style=""><a class="home list-group-item list-group-item-action" style="background-color: unset;border: 0px" href="/posts">首页</a></div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-3 text-center head_list_right" style=""><a class="list-group-item list-group-item-action" style="background-color: unset;border: 0px" action="login" href="javascript:void(0);">登录</a></div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="row">
                        <div class="col-sm-3 text-center head_list_left" style=""><a class="list-group-item list-group-item-action" style="background-color: unset;border: 0px"  action="create" href="javascript:void(0);">创建文章</a></div>
                        <div class="col-sm-3 text-center head_list_left" style=""><a class="list-group-item list-group-item-action" style="background-color: unset;border: 0px"  action="articles" href="javascript:void(0);">文章列表</a></div>
                        <div class="col-sm-3 text-center head_list_left" style=""><a class="list-group-item list-group-item-action" style="background-color: unset;border: 0px"  action="about" href="javascript:void(0);" >关于我</a></div>
                        <div class="col-sm-3 text-center head_list_left" id="qrcode" style="position: relative">
                            <a class="list-group-item list-group-item-action phone" style="background-color: unset;border: 0px;" onmouseover="mobieLinkShow()" onmouseout="mobieLinkHide()" href="javascript:void(0);" id="qrcode">手机访问</a>
                            <div id="mobieQrcode" style="height: 9em;width: 9em;position: absolute;right:10%;z-index: 10000;display: none">
                                <img src="{{URL::asset('/images/indexQrcode.png')}}" style="width: 100%;height: 100%">
                            </div>
                        </div>
                    </div>
                </div>

{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
