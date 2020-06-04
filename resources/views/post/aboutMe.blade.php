{{--关于我--}}
@extends('layout.main')
@section('content')
    <style> div{border: 1px #ccc solid}</style>

    <div class="container-fluid">
        <div class="row" style="height: 200px ;background-color: #f8f8f8;" >
            <img style="width: 100%;height: 100%;background-color: lightblue"></img>
        </div>

    </div>
    <div class="container-fluid" style="background-color: #ccc">
        <div class="container" id="aboutContent" style="background-color: white">
            <h3 class="border-left row" style="border-color: lightblue">关于我</h3>
            <div class="row">
                    <div class="col-sm-12">
                        伍晓莹, 90后普通程序员！现居广州, 主要专注PHP开发, 目前工作{{  ceil(date('Y', strtotime(now()))-2017)  }}年。<br>开发过MES管理后台, 也做过CS架构的产品。
                    曾经从事前端开发, 对 Vue 以及一些前端打包技术也有所了解 <br>热衷于关注互联网技术, 每天实现自我提升。<br>
                    目前渴望得到优秀企业和平台的认可,期待未来能有更好的发展。
                    </div>
                </div>


            <h3 class="border-left row" style="border-color: lightblue">我的一些开源项目</h3>
            <div class="row">
                <div class="col-sm-12">
                    <div class="" style="">公众号&小程序 :</div>
                    <img src="{{asset('/images/publicAccount.jpg')}}" style="width: 150px;height: 150px">
                    <div class="col-sm-2" style="background-color: cornflowerblue;color: white">欢迎关注我的公众号</div>
                </div>
                <div class="col-sm-12">
                    本站博客代码 : <a href="https://github.com/xiao5Emma/myBlog">https://github.com/xiao5Emma/myBlog</a>
                </div>


            </div>

            <h3 class="border-left row" style="border-color: lightblue">技术博客</h3>
            <div class="row">
                <div class="col-sm-12">
                    简书 ：<a href="https://www.jianshu.com/u/fd751e19ec5f">https://www.jianshu.com/u/fd751e19ec5f</a>
                </div>

            </div>

            <h3 class="border-left row" style="border-color: lightblue">联系我</h3>
            <div class="row">
                <div class="col-sm-12">
                    邮箱 : 1111.qq.com
                </div>
                <div class="col-sm-12">
                    Github : <a href="https://github.com/xiao5Emma">https://github.com/xiao5Emma</a>
                </div>
            </div>

            <h3 class="border-left row" style="border-color: lightblue">作者说明</h3>
            <div class="row">
                <ul>
                    <li>本站由本人独立开发, 使用技术包括...</li>
                    <li>目前仅提供个人博客, 仅便利个人发布技术文章, 后期会开发多人分享模式</li>
                    <li> 支持chrome 和部分手机, 如有显示问题请发邮件通知作者</li>
                    <li>对本站有更好的开发建议, 请发邮件通知作者</li>
                    <li>寻求PHP开发人员, 或有更好的发展平台需要招聘开发工程师, 欢迎随时联系!</li>
                </ul>
            </div>
        </div>
    </div>

@endsection
