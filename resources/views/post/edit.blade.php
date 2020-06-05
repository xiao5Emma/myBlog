{{--编辑文章--}}
@extends('layout.main')
@section('content')

    @include('layout.editor')

    <script>
        initEditorData('{{$post->title}}' ,'{!! $post->content!!}')
    </script>
@endsection





