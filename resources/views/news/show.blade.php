@extends('layouts.website')

@section('content')
    <h1>{{ $article->title }}</h1>
    <p>
        {{ $article->post_content }}
    </p>
    <p>
        {{ \Options::get('minus40_acf_options_phone') }}
    </p>
@stop