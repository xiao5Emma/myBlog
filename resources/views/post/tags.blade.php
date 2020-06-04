{{--标签文章展示--}}
@extends('layout.main')
@section('content')
    <style> div{border: 1px #ccc solid}</style>
    <div class="container-fluid">
        <div class="row" style="height: 80%;background-color: #f8f8f8;" >
            <div class="col-sm-9" style="min-height: 35em">
                @include('layout.singleTagArticle')
            </div>

            @include('layout.sideBar')

            <div class="col-sm-1"></div>
        </div>

    </div>


@endsection
