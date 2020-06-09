




<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>Xiao5`s Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/css/myBlog.css')}}">
    <link rel="stylesheet" href="{{asset('/css/polygonAnimation.css')}}">
    <link rel="stylesheet" href="{{asset('/css/polygonAnimation2.css')}}">

</head>
<body>

<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/common.js')}}" ></script>
<script src="{{asset('/js/ajax.js')}}" ></script>

<script src="{{asset('/js/wangEditor.min.js')}}" ></script>
<script src="{{asset('/js/myEditor.js')}}" ></script>


{{--头部--}}
@include('layout.header')


{{--内容--}}
@yield('content')

{{--警告框--}}
@include('layout.alert')

{{--确认框--}}

{{--底部--}}
@include('layout.footer')



<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<script src="{{asset('/js/modal.js')}}" ></script>


<script src="{{asset('/js/timeInterval.js')}}" ></script>
<script src="{{asset('/js/articleSubmit.js')}}" ></script>

<script src="{{asset('/js/myBlog.js')}}" ></script>



<script>
    // createEditor();
    // window.onload=function(){
    //     createEditor();     // 初始化文本编辑器
    // }

</script>


</body>
</html>


