@extends('home')
@section('title','Chi tiết tin tức')
@section('content')
<div class="container mx-auto">
    <h2 class="font-semibold text-2xl">
        {{ $new->title }}
    </h2>
    <h6 class="italic text-xs text-gray-400">
        TDTU, {{ $new->created_at }} , GMT+7
    </h6>
    <hr class="mt-2 mb-4 border border-red-400">
    <div class="content">
        {!! $new->content !!} 
    </div>
</div>
@endsection