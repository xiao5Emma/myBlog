@if($count>0)
    @foreach ($articles as $article)
        <div class="row" style="background-color: white;margin: 10px 0px 10px 0px"  >

            <div class="col-sm-12 font-weight-bold border-bottom pointer" onclick="redirectArticle({{$article->id}})">
                <div style="line-height: 1em;font-size: 1em;margin: 1em auto">
                    {{ $article->title  }}
                </div>
            </div>

            <div class="col-sm-12 showArticleContent pointer" onclick="redirectArticle({{$article->id}})">
                {!! $article->content !!}
                {{--                {!!   \Illuminate\Support\Str::limit($article->content,500, '...')  !!}--}}
            </div>
            <div class="col-sm-12 border-top">
                <div class="row" style="margin-bottom: 1em;margin-top: 1em;">
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-sm-3">
                                <button type="button" value="{{ $article->tid }}" class="btn btn btn-sm btn-primary"
                                        onclick="tagsManager(this)">
                                    {{ $article->type_name }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <svg  t="1590941603961" class="icon svgIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2927" width="200" height="200"><path d="M512 320c-105.6 0-192 86.4-192 192s86.4 192 192 192 192-86.4 192-192-86.4-192-192-192z m0 320c-70.4 0-128-57.6-128-128s57.6-128 128-128 128 57.6 128 128-57.6 128-128 128z m428.8-156.8C883.2 403.2 713.6 192 512 192 310.4 192 140.8 403.2 83.2 483.2c-12.8 19.2-12.8 41.6 0 60.8 57.6 76.8 227.2 288 428.8 288 201.6 0 371.2-211.2 428.8-291.2 12.8-16 12.8-41.6 0-57.6z m-64 48C835.2 588.8 688 768 512 768S188.8 588.8 147.2 531.2c-9.6-12.8-9.6-25.6 0-38.4C188.8 435.2 336 256 512 256s323.2 179.2 364.8 236.8c9.6 12.8 9.6 25.6 0 38.4z" p-id="2928" fill="#bfbfbf"></path></svg>
                        {{ $article->watch }}
                    </div>
                    <div class="col-sm-1">
                        <svg t="1590941629831" class="icon svgIcon" viewBox="0 0 1076 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3962" width="200" height="200"><path d="M1007.916144 0.02187H66.926943A66.926943 66.926943 0 0 0 0 66.948813v643.499453a66.926943 66.926943 0 0 0 66.926943 66.926944h208.141823l4.349997 3.011997 394.532664 234.242801a52.202956 52.202956 0 0 0 25.766979 7.696993c19.073984 0 33.462972-15.058987 33.462971-41.159965l60.233949-205.464825h216.173816a66.926943 66.926943 0 0 0 66.925943-66.926943V66.948813a66.926943 66.926943 0 0 0-68.599941-66.926943z m0 710.426396H773.672343a33.462972 33.462972 0 0 0-31.455974 22.419981l-15.726986 44.506963-61.572948 159.619864-256.998782-159.619864-52.536955-30.451975-63.914946-36.474969H66.925943v-643.499453h940.989201z" p-id="3963" fill="#bfbfbf"></path><path d="M197.098833 389.200539a66.926943 66.926943 0 1 0 133.853886 0 66.926943 66.926943 0 1 0-133.853886 0zM468.486602 389.200539a66.926943 66.926943 0 1 0 133.853886 0 66.926943 66.926943 0 1 0-133.853886 0zM739.539372 389.200539a66.926943 66.926943 0 1 0 133.853886 0 66.926943 66.926943 0 1 0-133.853886 0z" p-id="3964" fill="#bfbfbf"></path></svg>
                        {{ $article->comment }}
                    </div>
                    <div class="col-sm-2">{{ $article->created_at }}</div>

                </div>
            </div>
        </div>
    @endforeach
@else
    <div class="row" style="background-color: white;margin: 10px 0px 10px 0px">
        <div class="col-sm-12 border-bottom" style="cursor: auto;font-size: 1em;color: #8c8c8c;line-height: 3em;" >
                作者还没有发布过文章
        </div>
    </div>
@endif

<style>
    .showArticleContent{
        font-size: 0.8em;
        font-weight: 100;
        padding: 1em 1em;
    }
</style>
