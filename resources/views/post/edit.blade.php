{{--文章编辑--}}
@extends('layout.main')
@section('content')
    <style> div{border: 1px #ccc solid}</style>
    <div class="container-fluid">
        <div class="row" style="height: 80%;background-color: #f8f8f8;" >
            <div class="col-sm-12" >
                <div class="container" style="background-color: white;height: 500px">
                        <form action="/posts" class="row" method="post">
                            <div class="col-sm-12" style="padding: 0">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">标题 :</span>
                                    </div>
                                    {{csrf_field()}}
                                    <input type="text" id="create_title" value="{{ $post->title  }}"
                                           class="form-control"  autocomplete="off" placeholder="请输入文章标题" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                            </div>

                            <div class="col-sm-12" id="editor" style="padding: 0" >
                            </div>

                            @include('layout.error')


                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger col-sm-12" role="alert">
                                    {{$error}}
                                </div>
                            @endforeach

                            <div class="col-sm-12" style="padding: 0" >
                                <input type="submit" class="btn btn-primary" value="提交">
                            </div>
                        </form>
                </div>

{{--                @include('layout.singleArticleEdit')--}}

            </div>

{{--            @include('layout.sideBar')--}}

            <div class="col-sm-1"></div>
        </div>
    </div>

    <script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('/js/wangEditor.min.js')}}" ></script>
    <script src="{{asset('/js/myEditor.js')}}"></script>
    <script>
        initEditorData('{!! $post->content!!}')
    </script>

@endsection
