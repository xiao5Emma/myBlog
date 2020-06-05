{{--博客首页--}}
@extends('layout.main')
@section('content')
{{--<div class="content_height" style="width: 100%">--}}

<div class="container-fluid " style="height:40em;background-color:bisque;background-size: cover;position:relative;top:3em">
    <div class="row " id="index_banner" style="position:relative;top:12em">
        <div class="col-sm-12"  >
            <div class="row">
                <div class="col-sm-4"></div>
                <h1 class="col-sm-4 text-center bold" style="font-size: 4em">Xiao5`s Blog</h1>
                <div class="col-sm-4"></div>
            </div>
        </div>
        <div class="col-sm-12 text-center" style="margin:2em auto 2em;">
            <h3 style="font-size: 2.5em">Online technology article sharing blog</h3>
        </div>
        <div class="col-sm-12 text-center">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-4">
							<button type="button" class="btn btn-lg btn-block btn-primary">github</button>
						</div>
						<div class="col-sm-4">
							 <button type="button" class="btn btn-lg btn-block btn-secondary">博客列表</button>
						</div>
						<div class="col-sm-2"></div>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
        </div>
    </div>
</div>

<div class="container-fluid" style="position:relative;top:3em">
        <div class="row" id="index_technology">
            <h1 class="col-sm-12 text-center" style="font-size: 2em;margin: 2em auto 3em">
                博客新版尝试使用如下技术/工具构建
            </h1>
            <div class="col-sm-12  text-center" style="height: 40em">
                <div class="row" style="margin-bottom: 3em;">
                    <div class="col-sm-4"  style="margin-right: 1em"></div>
{{--                    圆形--}}
                    <div class="col-sm-2 text-center">
                        <h1 class="btn-success float-right" style="background-color: rgba(78,187,170,.75); opacity: 0.6;line-height:5em;border-radius: 50%;width: 5em;height: 5em">
                            <span style="opacity: 1">frontEnd</span>
                        </h1>
                    </div>
                    <div class="col-sm-2 text-center" style="margin-left: -3em">
                        <h1 class="btn-primary float-left" style="background-color: rgba(107,195,13,.75);opacity: 0.6;line-height:5em;border-radius: 50%;width: 5em;height: 5em">
                            <span style="opacity: 1">backEnd</span>
                        </h1>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
                <div class="row" style="margin-top: 1em">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <div class="techList_line  float-right"></div>
                        <ul class="techList float-right techListLi1" style="margin-right: 3em;">
                            <li>Vue</li>
                            <li>Jquery</li>
                            <li>Bootstrap4</li>
                            <li>WangEditor</li>
                            <li>...</li>
                        </ul>
                    </div>
                    <div class="col-sm-2">
                        <div class="techList_line  float-left" ></div>
                        <ul class="techList  float-left techListLi2" style="margin-left: 3em;">
                            <li>php7</li>
                            <li>Redis</li>
                            <li>Mysql8</li>
                            <li>Laravel7.12</li>
                            <li>...</li>
                        </ul>
                    </div>
                    <div class="col-sm-4"></div>

                </div>


            </div>
        </div>

        <div class="row" id="index_introdution" style="background-color:#efefee;padding: 35px 0 35px 0">
            <div class="col-sm-12 bold text-center" style="font-weight: 500;font-size: 3em; margin: 3em auto .5em;">
                关于我，关于博客
            </div>
            <div class="col-sm-12 text-center" style="font-size: 1.7em; margin-bottom: 2em;">一段简单的自我介绍</div>
            <div class="col-sm-1"></div>
            <p class="col-sm-10 text-center" style="font-size: 1.2em; font-weight: 200;margin-bottom: 4em;">             伍晓莹, 90后普通程序员！现居广州, 主要专注PHP开发, 目前工作{{  ceil(date('Y', strtotime(now()))-2017)  }}年。<br>开发过MES管理后台, 也做过CS架构的产品。
                曾经从事前端开发, 对 Vue 以及一些前端打包技术也有所了解; <br>热衷于关注互联网技术, 每天实现自我提升。<br>
                目前渴望得到优秀企业和平台的认可,期待未来有更好的发展。</p>
            <div class="col-sm-1"></div>

            <div class="col-sm-12 " style="margin-bottom: 2em" >
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-1 ">
                        <div class="border-bottom"  style="height: 50%;border-bottom: 1px solid #aaa!important;"></div>
                        <div class="text-center"  style="height: 50%;line-height: 2.5em;">累计运行</div>
                    </div>

                    <div class="col-sm-4">
                        <div class="row" style="">
                            <div class="col-sm-2">
                                <div class="row text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->year }}
                                </div>
                                <div class="row text-center" style="height: 30%">年</div>
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-12 text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->month }}
                                </div>
                                <div class="text-center" style="height: 30%">月</div>
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-12 text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->day }}
                                </div>
                                <div class="text-center" style="height: 30%">日</div>
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-12 text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->hour }}
                                </div>
                                <div class="text-center" style="height: 30%">时</div>
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-12 text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->minute }}
                                </div>
                                <div class="text-center" style="height: 30%">分</div>
                            </div>

                            <div class="col-sm-2">
                                <div class="col-sm-12 text-center timeToolBox" style="height: 70%">
                                    {{ $runTime->second }}
                                </div>
                                <div class="text-center" style="height: 30%">秒</div>
                            </div>

                        </div>




                    </div>

                    <div class="col-sm-1 ">
                        <div class="border-bottom"  style="border-bottom: 1px solid #aaa!important;height: 50%;"></div>
                        <div class="text-center"  style="height: 50%;line-height: 2.5em;">到现在</div>
                    </div>
                    <div class="col-sm-3"></div>

                </div>
            </div>


        </div>

</div>

@endsection


