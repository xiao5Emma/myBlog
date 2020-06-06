@foreach($errors->all() as $error)
    <div class="alert alert-danger col-sm-12" role="alert">
        {{$error}}
    </div>
@endforeach