{{--文章列表--}}
@extends('layout.main')
@section('content')
    <div class="container-fluid">
        <div class="row" style="height: 80%;background-color: #f8f8f8;" >
            <div class="col-sm-9" style="min-height: 42em">
                <div class="container" >
                    @include('layout.singleArticle')
                    {{$articles->links()}}
                </div>
            </div>
            @include('layout.sideBar')

        </div>

    </div>


@endsection
