<div class="container-fluid">
    <div class="row" style="height: 80%;background-color: #f8f8f8;" >
        <div class="col-sm-9 content_height">
            <div class="container" >
                @include('layout.singleArticle')
                {{$articles->links()}}
            </div>
        </div>
        @include('layout.sideBar')
    </div>
</div>