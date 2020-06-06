{{--标签文章展示--}}
@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row" style="height: 5em;background-color: white;" >
            <div class="col-sm-9">
                <div class="container">
                    <h3 style="padding-top: 1em;padding-left: 0.3em;">
                        当前标签 :
                        <button class="btn btn-sm btn-primary">{{$articles[0]->type_name}}</button>

                        ,   总条目数 : {{ count($articles) }} </h3>
                </div>
            </div>
        </div>
    </div>
    @include('layout.articleList')


@endsection
