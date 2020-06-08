    {{--关于我--}}
    @extends('layout.main')
    @section('content')

{{--        <div class="container-fluid topPosition" >--}}
{{--            <div class="row" style="height: 200px ;background-color: #f8f8f8;" >--}}
{{--                <div class="polygonContent2">--}}
{{--                    <h1>Pure Css Animated Background</h1>--}}
{{--                </div>--}}
{{--                <div class="area" >--}}
{{--                    <ul class="circles">--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                        <li></li>--}}
{{--                    </ul>--}}
{{--                </div >--}}

{{--                <img style="width: 100%;height: 100%;background-color: lightblue">--}}
{{--            </div>--}}
{{--        </div>--}}





        <div class="area row topPosition aboutMe " style="">
            <ul class="circles col-sm-12">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>


            <div class="col-sm-1"></div>
            <div class="col-sm-10" style="background-color: white;    padding: 3em;">
                <h3 class="row aboutTitle" >关于我</h3>
                <div class="row aboutContent" >
                    <p>
                        {!!$personalInfo1  !!} {{  ceil(date('Y', strtotime(now()))-2017)  }}    {!!$personalInfo2 !!}
                    </p>
                </div>
                <h3 class="row aboutTitle" >个人项目</h3>

                <div class="row aboutContent" >
                    <p>
                        &nbsp;&nbsp;公众号&小程序 :<br><br>

                        <img src="{{asset('/images/publicAccount.jpg')}}" style="width: 150px;height: 150px"><br><br>

                        欢迎关注我的公众号<br><br>
                        本站博客代码 : <a href="https://github.com/xiao5Emma/myBlog">https://github.com/xiao5Emma/myBlog</a>
                    </p>
                </div>



                <h3 class="row aboutTitle" >技术博客</h3>

                <div class="row aboutContent" >
                    <p>
                        简书 ：<a href="https://www.jianshu.com/u/fd751e19ec5f">https://www.jianshu.com/u/fd751e19ec5f</a>
                    </p>
                </div>




                <h3 class="row aboutTitle" >联系我</h3>

                <div class="row aboutContent" >
                    <p>
                        邮箱 : xiao5@gmail.com
                        <br><br>
                        Github : <a href="https://github.com/xiao5Emma">https://github.com/xiao5Emma</a>
                    </p>
                </div>



                <h3 class="row aboutTitle" >作者说明</h3>
{{--                <p class="row aboutContent">--}}
{{--                </p>--}}
                <div class="row">
                    <div class="col-sm-4">
                        <div class="font-bold">
                            <ul><li>技术架构</li> </ul>
                        </div> <br>
                        本站独立开发, 使用前端技术 JQuery + Vue + Bootstrap4 <br>
                        富文本编辑器使用wangEditor3<br>
                        后端使用Laravel7 + php7 + mysql8 + Redis<br>
                        服务框架选择 Workerman3.5 <br>
                    </div>

                    <div class="col-sm-4">
                        <div class="font-bold"> <ul><li>版本信息</li> </ul>
                        </div><br>
                        1. 当前版本号为V1.0, 此版本仅提供个人博客分享, 后续版本会完成多人模式 <br>
                        2. 支持chrome 和部分手机, 如有问题或者建议请发邮件通知作者 <br>
                        3. 有合适的工作欢迎随时联系!
                    </div>
                    <div class="col-sm-4">
                        <div class="font-bold"> <ul><li>博客功能</li> </ul>
                            </div><br>
                        1. 登录认证 <br>
                        2. 首页和个人主页 <br>
                        3. 创建文章 , 编辑文章, 文章列表
                        4. 访客记录, 文章查看统计
                    </div>
                </div>


            </div>
		</div>

    @endsection
