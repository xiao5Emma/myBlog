{{--编辑文章--}}
@extends('layout.main')
@section('content')
@include('layout.editor')





    <script>
        initEditorData('{{$id}}');
    </script>
@endsection





