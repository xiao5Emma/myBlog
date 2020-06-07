{{--用户登录--}}
@extends('layout.main')
@section('content')
    <div class="container content_height">
        <div style="margin-top: 15em;" class="row loginForm" >
            <div class="form-group col-sm-12 text-center">
                <label for="user" stype="display:inline;">账户：</label>
                <input type="text" class="form-control loginUser" name="user" style="display:inline;width:20em;" />
            </div>
            <div class="form-group col-sm-12 text-center">
                <label for="password" style="display:inline;">密码：</label>
                <input type="password" class="form-control loginPassword" oncopy="return false" name="password" style="display:inline;width:20em;" />
            </div>
            <div class="form-group col-sm-12 text-center">
                @include('layout.error')
            </div>
            <div class="form-group col-sm-12 text-center">
                        <button class="btn btn-lg btn-primary" onclick="login()" style="margin: 1em;">登录</button>
            </div>

{{--            <div class="form-group col-sm-12 text-center">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-5"></div>--}}
{{--                    <div class="col-sm-1">--}}
{{--                        <button type="submit" class="btn btn-primary">登录</button>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-1 ">--}}
{{--                        <button type="submit" class="btn btn-primary ">注册</button>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-5"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>




    <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/MD5.js')}}"></script>

    <script src="{{asset('/js/ajax.js')}}" ></script>
    <script src="{{asset('/js/login.js')}}" ></script>
@endsection