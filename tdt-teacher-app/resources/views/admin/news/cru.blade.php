@extends('home')
@section('title', isset($new) ? 'Cập nhật tin tức' : 'Thêm mới tin tức')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            {{ isset($new) ? 'Cập nhật tin tức' : 'Thêm mới tin tức' }}
        </h2>
        <form method="POST" action="{{ isset($new) ? route('admin.news.update', ['id' => $new->id]) : route('admin.news.create') }}" enctype="multipart/form-data">
            @csrf 
            <div class="grid gap-2">

                <x-text-input id="name" class="block mt-1 w-50 mr-2 col-span-1" type="text" name="title" required autocomplete="off" placeholder="tiêu đề" value="{{ isset($new) ? $new->title : '' }}" />
                
                @if (isset($new))
                    <img src={{ $new->thumbnail }} class="" alt="thumbnail"/>
                @endif    
                <input type="file" name='thumbnail' class="border-gray-400 rounded-md shadow-sm px-2 py-1"/>
                <textarea id="content" class="block mt-1 w-50 mr-2 rounded-md border-gray-300 col-span-1" name="content"  placeholder="nội dung">{{ isset($new) ? $new->content : '' }}</textarea>
                <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl">
                    {{ isset($new) ? 'Cập nhật' : 'Tạo' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection