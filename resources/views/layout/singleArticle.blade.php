
    @foreach ($articles as $article)
        <div class="row" style="background-color: white;margin: 10px 0px 10px 0px">
            <div class="col-sm-10 font-weight-bold border-bottom" style="cursor: pointer" onclick="window.location.href='/posts/{{$article->id}}'"><h1>
                    {{ $article->title  }}
                </h1>
            </div>

            <div class="col-sm-1 border-bottom">
                <a href="/posts/{{$article->id}}/edit" class="float-right" style="line-height: 2em;">
                    <svg t="1591169149455" class="icon svgIcon" viewBox="0 0 1089 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2714" width="200" height="200"><path d="M1062.01504 124.471168 963.208019 25.664192C946.526317 8.982464 923.42857 0 900.330829 0 875.949875 0 854.135341 8.982464 837.453632 25.664192L788.691731 74.426048 788.691731 74.426048 271.558899 591.558912C270.275686 592.842112 268.99248 594.125312 268.99248 595.408512 268.99248 595.408512 268.99248 596.691712 267.709274 596.691712 266.426067 597.974912 266.426067 599.258176 265.142854 600.541376 265.142854 600.541376 265.142854 600.541376 265.142854 601.824576 265.142854 603.107776 265.142854 603.107776 263.859648 604.390976L193.283206 862.315776C190.716794 871.29824 193.283206 881.563904 199.699251 887.979968 204.832083 893.112768 211.248122 895.679168 218.947366 895.679168 221.513786 895.679168 224.080198 895.679168 225.363411 894.395968L484.57143 822.53632C485.854637 822.53632 485.854637 822.53632 487.137843 821.25312L488.42105 821.25312C489.704262 821.25312 490.987469 819.96992 492.270675 818.68672 492.270675 818.68672 493.553882 818.68672 493.553882 817.40352 494.837094 816.12032 496.120301 816.12032 497.403507 814.83712L1013.253133 298.987456 1062.01504 250.225536C1096.661651 216.862144 1096.661651 159.117824 1062.01504 124.471168L1062.01504 124.471168ZM317.754387 813.553856 274.125312 769.9248 303.639098 660.85216 426.827066 784.040128 317.754387 813.553856 317.754387 813.553856ZM328.020051 609.52384 806.65664 130.887232 819.488723 143.719296 863.117792 187.348352 384.481203 665.98496 328.020051 609.52384 328.020051 609.52384ZM478.155386 759.659136 421.694234 703.198016 900.330829 224.561408 956.791981 281.022528 478.155386 759.659136 478.155386 759.659136ZM1023.518797 214.295744 994.005011 243.809536 843.869677 93.674176 874.666669 62.877184C881.082707 56.461184 890.065165 52.61152 900.330829 52.61152 910.596493 52.61152 919.57895 56.461184 925.994989 62.877184L1024.802003 161.684224C1037.634086 177.082688 1037.634086 200.18048 1023.518797 214.295744L1023.518797 214.295744ZM949.09273 476.070144C934.977446 476.070144 922.145363 487.619072 922.145363 503.017536L922.145363 934.175424C922.145363 955.989952 904.180448 973.95488 882.365914 973.95488L153.503757 973.95488C131.689222 973.95488 113.724314 955.989952 113.724314 934.175424L113.724314 204.03008C113.724314 182.215552 131.689222 164.250624 153.503757 164.250624L584.661651 164.250624C598.776941 164.250624 611.609024 152.70176 611.609024 137.303232 611.609024 121.904768 600.060147 110.355904 584.661651 110.355904L153.503757 110.355904C102.175437 110.355904 61.112781 151.41856 61.112781 202.74688L61.112781 931.609024C61.112781 982.937344 102.175437 1024 153.503757 1024L882.365914 1024C933.694234 1024 974.75689 982.937344 974.75689 931.609024L974.75689 503.017536C976.040102 488.902272 964.491226 476.070144 949.09273 476.070144L949.09273 476.070144Z" p-id="2715" fill="#bfbfbf"></path></svg>
                </a>
            </div>
            <div class="col-sm-1 border-bottom">
                <a href="/posts/{{$article->id}}/delete" class="float-right" style="line-height: 2em;">
                    <svg t="1591169329810" class="icon svgIcon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3645" width="200" height="200"><path d="M608 768c-17.696 0-32-14.304-32-32V384c0-17.696 14.304-32 32-32s32 14.304 32 32v352c0 17.696-14.304 32-32 32zM416 768c-17.696 0-32-14.304-32-32V384c0-17.696 14.304-32 32-32s32 14.304 32 32v352c0 17.696-14.304 32-32 32zM928 224H768v-64c0-52.928-42.72-96-95.264-96H352c-52.928 0-96 43.072-96 96v64H96c-17.696 0-32 14.304-32 32s14.304 32 32 32h832c17.696 0 32-14.304 32-32s-14.304-32-32-32z m-608-64c0-17.632 14.368-32 32-32h320.736C690.272 128 704 142.048 704 160v64H320v-64z" p-id="3646" fill="#bfbfbf"></path><path d="M736.128 960H288.064c-52.928 0-96-43.072-96-96V383.52c0-17.664 14.336-32 32-32s32 14.336 32 32V864c0 17.664 14.368 32 32 32h448.064c17.664 0 32-14.336 32-32V384.832c0-17.664 14.304-32 32-32s32 14.336 32 32V864c0 52.928-43.072 96-96 96z" p-id="3647" fill="#bfbfbf"></path></svg>
                </a>
            </div>

            <div class="col-sm-12">
                {!!   \Illuminate\Support\Str::limit($article->content,500, '...')  !!}
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