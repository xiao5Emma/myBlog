<div class="col-sm-2 border" style=";background-color: white">
    <div class="row">

        <div class="input-group mb-3">
            <input id="search" type="text" class="form-control border" placeholder="检索文章" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    </div>
    <div class="row" style="margin-bottom: 20%">
        <div class="col-sm-12 font-weight-bold">文章分类</div>
        @foreach ($articleTypes as $articleType)
            <div class="col-sm-12 border-bottom">
                {{$articleType}}
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-sm-12 font-weight-bold">热门文章</div>
        @foreach ($hotArticles as $hotArticle)
            <div class="col-sm-12 border-bottom">
                {{$hotArticle}}
            </div>
        @endforeach
    </div>
</div>