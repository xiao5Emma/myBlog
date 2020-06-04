{{--创建文章--}}
@extends('layout.main')
@section('content')
    <style> div{border: 1px #ccc solid}</style>
    <div class="container-fluid">
        <div class="row" style="height: 80%;background-color: #f8f8f8;" >
            <div class="col-sm-12" >

                <div class="container" style="background-color: white;height: 500px">
                    <div action="/posts" class="row" method="post">
                        <div class="col-sm-12" style="padding: 0">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">标题 :</span>
                                </div>
                                {{csrf_field()}}
                                <input type="text" id="create_title" class="form-control"  autocomplete="off" placeholder="请输入文章标题" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </div>

                        <div class="col-sm-12" id="editor" style="padding: 0;height: 25em" >
                        </div>
                            @include('layout.error')

                        <div class="col-sm-12" style="padding: 0" >
                            <button  class="btn btn-primary" onclick="store()"> 提交</button>
                        </div>
                    </div>
                </div>

                {{--                @include('layout.singleArticleEdit')--}}

            </div>


            <div class="col-sm-1"></div>
        </div>

    </div>
@endsection



<script>
    createEditor();
</script>