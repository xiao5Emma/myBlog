<div class="container-fluid " style="position: relative;top:3em">
    <div class="row" style="height: 80%;background-color: #f8f8f8;" >
        <div class="col-sm-12" >
            <div class="container" >
                <div class="row content_height" >
                    @csrf
                    <div class="col-sm-12" style="padding: 0">
                        <div class="input-group mb-3" style="margin: 8px 0 8px 0;margin-bottom: 8px!important;">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">标题 :</span>
                            </div>
                            <input type="text" value="1" name="title" class="form-control create_title"  autocomplete="off" placeholder="请输入文章标题" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>

                    <div class="col-sm-12" id="editor" style="padding: 0;height: 35em;background-color: white;" >
                    </div>
                    @include('layout.error')



                    <div class="col-sm-12" style="padding: 0;background-color: white;" >
                        <button class="btn btn-primary" onclick="store()"> 提交</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-1"></div>
    </div>
</div>
<script src="{{asset('/js/jquery-3.5.1.min.js')}}"></script>
<script src="{{asset('/js/ajax.js')}}" ></script>
<script src="{{asset('/js/wangEditor.min.js')}}" ></script>
<script src="{{asset('/js/myEditor.js')}}"></script>