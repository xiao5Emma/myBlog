<div class="col-sm-3" style="padding-right: 3em;margin-top: 10px">
    <div style="background-color: white;min-height: 36em" class="row">
        <div class="col-sm-12" style="padding: 1em;">
            <div class="input-group">
                <input id="search" type="text" class="form-control border" placeholder="检索文章" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-sm-12 sideBarBox " style="    margin-top: 1em;">
            <div class="row border-bottom border-top sideBarTitle">
                文章分类
            </div>
            {{--        @foreach ($articleTypes as $articleType)--}}
            {{--            <div class="col-sm-12 border-bottom">--}}
            {{--                {{$articleType}}--}}
            {{--            </div>--}}
            {{--        @endforeach--}}
        </div>

        <div class="col-sm-12 sideBarBox">
            <div class="row  border-bottom border-top sideBarTitle" >
                最多点击
            </div>
            {{--        @foreach ($hotArticles as $hotArticle)--}}
            {{--            <div class="col-sm-12 border-bottom">--}}
            {{--                {{$hotArticle}}--}}
            {{--            </div>--}}
            {{--        @endforeach--}}
        </div>
    </div>
</div>
<style>
    .sideBarBox{
        margin-bottom: 20%;padding-left: 2em;padding-right: 2em;
    }
    .sideBarTitle{
        line-height: 2em;
        font-size: 1.5em;
        font-weight: 500;
        color: #8c8c8c;
        padding-left: 0.2em
    }
</style>