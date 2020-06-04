{{--博客首页--}}
@extends('layout.main')
@section('content')

<div class="container-fluid">
    <div class="row border" id="index_banner" style="height: 80%;position:relative;">
{{--        <img class="" src="{{URL::asset('/images/timg.jpg')}}" style="width:100%;height:100%;pointer-events: none;position:absolute;opacity: 0.65">--}}
        <div class="col-sm-12 text-center bold" style="height: 10%;margin-top: 10%">
                <h1>Xiao5`s Blog</h1>
        </div>
        <div class="col-sm-12 text-center" style="height: 10%">
            <h3>Online technology article sharing blog</h3>

        </div>

        <div class="col-sm-12 text-center">
            <button type="button" class="btn btn-primary">github</button>
            <button type="button" class="btn btn-secondary">博客列表</button>
        </div>
    </div>
</div>

<div class="container-fluid">

        <div class="row" id="index_technology">

            <div class="col-sm-12 text-center">
                博客新版尝试使用如下技术/工具构建
            </div>
            <div class="col-sm-12  text-center">前端: bootstrap , vue , jquery ... </div>
            <div class="col-sm-12 text-center">后端 : laravel7 , mysql , redis , php ... </div>
        </div>

        <div class="row" id="index_introdution" style="background-color:#ccc;padding: 35px 0 35px 0">
            <div class="col-sm-12 bold text-center"><h1>关于我，关于博客</h1></div>
            <div class="col-sm-12 text-center"><h1>一段简单的自我介绍</h1></div>
            <div class="col-sm-1"></div>
            <div class="col-sm-10 text-center">             伍晓莹, 90后普通程序员！现居广州, 主要专注PHP开发, 目前工作{{  ceil(date('Y', strtotime(now()))-2017)  }}年。<br>开发过MES管理后台, 也做过CS架构的产品。
                曾经从事前端开发, 对 Vue 以及一些前端打包技术也有所了解; <br>热衷于关注互联网技术, 每天实现自我提升。<br>
                目前渴望得到优秀企业和平台的认可,期待未来能有更好的发展。</div>
            <div class="col-sm-1"></div>
        </div>
    <div class="container">
        <div class="row " style="" >
            <div class="col-sm-3 ">
                <div class="border-bottom"  style="height: 50%;"></div>
                <div class="text-center"  style="height: 50%;">累计运行</div>
            </div>


            <div class="col-sm-6">
                {{--       2019-10-01 09:00:00 --}}
                <div class="row" style="">
                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                    <div class="col-sm-2">
                        <div class="col-sm-12 text-center" style="height: 70%">
                            {{ floor ((strtotime("now") - strtotime("2019-10-01 09:00:00") ) /60 / 60 / 24 / 365) }}
                        </div>
                        <div class="text-center" style="height: 30%">年</div>
                    </div>

                </div>




            </div>

            <div class="col-sm-3 ">
                <div class="border-bottom"  style="height: 50%;"></div>
                <div class="text-center"  style="height: 50%;">到现在</div>
            </div>
        </div>


    </div>
</div>
@endsection


