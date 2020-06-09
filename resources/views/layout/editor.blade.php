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
                            <input type="text" name="title" class="form-control create_title"  autocomplete="off" placeholder="请输入文章标题" id="basic-url" aria-describedby="basic-addon3">
                        </div>
                    </div>

                    <div class="col-sm-12" id="editor" style="padding: 0;height: 35em;background-color: white;" >
                    </div>
                    @include('layout.error')



                    <div class="col-sm-12" style="padding: 0;background-color: white;" >
                        @if(isset($id))
                        <button class="btn btn-primary" onclick="store({{$id}})"> 提交</button>
                            @else
                            <button class="btn btn-primary" onclick="store()"> 提交</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-1"></div>
    </div>
</div>
