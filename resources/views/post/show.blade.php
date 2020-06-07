{{--文章详情--}}
@extends('layout.editorMain')
@section('content')
    <div class="container-fluid topPosition">
        <div class="row " style="min-height:44em;background-color: #f8f8f8;overflow-y: scroll" >

                <div class="col-sm-2">
                    <div class="row" style="position:fixed;top:13em;left: 11em;" ><button onclick="like()" class="btnA btn btn-xs btn-primary cycleBtn">like</button></div>
                    <div class="row" style="position:fixed;top:19em;left: 11em;"><button onclick="share({{$article->id}})" class="btnB btn btn-xs btn-success cycleBtn">share</button></div>
                </div>

                <div class="col-sm-8" style="background-color: white;">
                    <div class="row border-bottom"   style="padding: 0.5em;">
                        <h1 class="col-sm-12 title text-center font-weight-bold ">
                            {{$article->title}}

                        </h1>
                    </div>
                    <div class="row border-bottom" name="info" style=" padding: 0.5em;">
                        <div class="author col-sm-2 ">
                            作者 :
                            {{$article->user_id}}
                        </div>
                        <div class="wordsCount col-sm-2 ">
                            字数 :
{{--                            {{str_word_count($article->content)}}--}}
                            {{strlen(strip_tags($article->content))}}
                        </div>
                        <div class="watched col-sm-2 ">
                            观看 : {{$articleInfo->watch}}
                        </div>
                        <div class="created_at col-sm-3 " >
                            {{$article->created_at}}
                        </div>

{{--                        @if($logged)--}}
                        <div class="created_at col-sm-3 editGroup" >
                            <a  href="javascript:void(0);"  onclick="deleteComfirm('{{$article->id}}')" class="float-right" >
                                <svg t="1591169329810" class="icon svgIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3645" width="200" height="200"><path d="M608 768c-17.696 0-32-14.304-32-32V384c0-17.696 14.304-32 32-32s32 14.304 32 32v352c0 17.696-14.304 32-32 32zM416 768c-17.696 0-32-14.304-32-32V384c0-17.696 14.304-32 32-32s32 14.304 32 32v352c0 17.696-14.304 32-32 32zM928 224H768v-64c0-52.928-42.72-96-95.264-96H352c-52.928 0-96 43.072-96 96v64H96c-17.696 0-32 14.304-32 32s14.304 32 32 32h832c17.696 0 32-14.304 32-32s-14.304-32-32-32z m-608-64c0-17.632 14.368-32 32-32h320.736C690.272 128 704 142.048 704 160v64H320v-64z" p-id="3646" fill="#bfbfbf"></path><path d="M736.128 960H288.064c-52.928 0-96-43.072-96-96V383.52c0-17.664 14.336-32 32-32s32 14.336 32 32V864c0 17.664 14.368 32 32 32h448.064c17.664 0 32-14.336 32-32V384.832c0-17.664 14.304-32 32-32s32 14.336 32 32V864c0 52.928-43.072 96-96 96z" p-id="3647" fill="#bfbfbf"></path></svg>
                            </a>
                            <a href="/posts/{{$article->id}}/edit" class="float-right" style="margin-right: 1em;">
                                <svg  t="1591169149455" class="icon svgIcon" viewBox="0 0 1089 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2714" width="200" height="200"><path d="M1062.01504 124.471168 963.208019 25.664192C946.526317 8.982464 923.42857 0 900.330829 0 875.949875 0 854.135341 8.982464 837.453632 25.664192L788.691731 74.426048 788.691731 74.426048 271.558899 591.558912C270.275686 592.842112 268.99248 594.125312 268.99248 595.408512 268.99248 595.408512 268.99248 596.691712 267.709274 596.691712 266.426067 597.974912 266.426067 599.258176 265.142854 600.541376 265.142854 600.541376 265.142854 600.541376 265.142854 601.824576 265.142854 603.107776 265.142854 603.107776 263.859648 604.390976L193.283206 862.315776C190.716794 871.29824 193.283206 881.563904 199.699251 887.979968 204.832083 893.112768 211.248122 895.679168 218.947366 895.679168 221.513786 895.679168 224.080198 895.679168 225.363411 894.395968L484.57143 822.53632C485.854637 822.53632 485.854637 822.53632 487.137843 821.25312L488.42105 821.25312C489.704262 821.25312 490.987469 819.96992 492.270675 818.68672 492.270675 818.68672 493.553882 818.68672 493.553882 817.40352 494.837094 816.12032 496.120301 816.12032 497.403507 814.83712L1013.253133 298.987456 1062.01504 250.225536C1096.661651 216.862144 1096.661651 159.117824 1062.01504 124.471168L1062.01504 124.471168ZM317.754387 813.553856 274.125312 769.9248 303.639098 660.85216 426.827066 784.040128 317.754387 813.553856 317.754387 813.553856ZM328.020051 609.52384 806.65664 130.887232 819.488723 143.719296 863.117792 187.348352 384.481203 665.98496 328.020051 609.52384 328.020051 609.52384ZM478.155386 759.659136 421.694234 703.198016 900.330829 224.561408 956.791981 281.022528 478.155386 759.659136 478.155386 759.659136ZM1023.518797 214.295744 994.005011 243.809536 843.869677 93.674176 874.666669 62.877184C881.082707 56.461184 890.065165 52.61152 900.330829 52.61152 910.596493 52.61152 919.57895 56.461184 925.994989 62.877184L1024.802003 161.684224C1037.634086 177.082688 1037.634086 200.18048 1023.518797 214.295744L1023.518797 214.295744ZM949.09273 476.070144C934.977446 476.070144 922.145363 487.619072 922.145363 503.017536L922.145363 934.175424C922.145363 955.989952 904.180448 973.95488 882.365914 973.95488L153.503757 973.95488C131.689222 973.95488 113.724314 955.989952 113.724314 934.175424L113.724314 204.03008C113.724314 182.215552 131.689222 164.250624 153.503757 164.250624L584.661651 164.250624C598.776941 164.250624 611.609024 152.70176 611.609024 137.303232 611.609024 121.904768 600.060147 110.355904 584.661651 110.355904L153.503757 110.355904C102.175437 110.355904 61.112781 151.41856 61.112781 202.74688L61.112781 931.609024C61.112781 982.937344 102.175437 1024 153.503757 1024L882.365914 1024C933.694234 1024 974.75689 982.937344 974.75689 931.609024L974.75689 503.017536C976.040102 488.902272 964.491226 476.070144 949.09273 476.070144L949.09273 476.070144Z" p-id="2715" fill="#bfbfbf"></path></svg>
                            </a>
                        </div>
{{--                        @endif--}}

                    </div>
                    <div class="row articleContent" style="    padding: 1em;">
                            <p>{!! $article->content !!}</p>
                    </div>
                </div>

                {{--                @include('layout.singleArticleEdit')--}}


        </div>
    </div>

@include('layout.delete',['id'=>$article->id])


{{--微信接口--}}
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.2.0.js"></script>

@endsection



