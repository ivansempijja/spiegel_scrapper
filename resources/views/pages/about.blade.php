@extends('layouts.base')

@section('content')
<div class="container px-5 about-us">
    {{ Illuminate\Mail\Markdown::parse(file_get_contents(base_path() . '/README.md')) }}
    <p class="mt-4">This page is generated from README.md</p>
</div>   
@endsection
