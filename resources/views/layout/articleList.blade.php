<div class="container-fluid" style="position:relative;top:3em">
    <div class="row" style="min-height: 38em;background-color: #f8f8f8;" >
        <div class="col-sm-9 content_height">
            <div class="container" >
                @include('layout.singleArticle')
                {{$articles->links()}}
                <div class="col-sm-12">
                    共 : {{$articles->total()}} 条数据
                </div>
            </div>
        </div>
        @include('layout.sideBar')
    </div>
</div>