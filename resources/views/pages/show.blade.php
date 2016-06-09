@extends('layouts.website')

@section('content')

    <h1>{{ $page->post_title }}</h1>
    {!! $page->post_content !!}

    {{--<img src="{{ $page->attachment->first()->guid }}" />--}}
@stop