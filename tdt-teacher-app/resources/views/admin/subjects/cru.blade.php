@extends('home')

@section('title', isset($subject) ? 'Cập nhật môn học' : 'Thêm mới môn học')

@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            {{ isset($subject) ? 'Cập nhật môn học' : 'Thêm mới môn học' }}
        </h2>
        <form method="POST" action="{{ isset($subject) ? route('admin.subjects.update', ['id' => $subject->id]) : route('admin.subjects.create') }}">
            @csrf 
            <div class="grid gap-2">
                <x-text-input id="name" class="block mt-1 w-50 mr-2 col-span-1" type="text" name="name" required autocomplete="off" placeholder="tên" value="{{ isset($subject) ? $subject->name : '' }}" />
                <textarea id="keyword" class="block mt-1 w-50 mr-2 rounded-md border-gray-300 col-span-1" name="description" required autocomplete="off" placeholder="mô tả">{{ isset($subject) ? $subject->description : '' }}</textarea>
                <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl">
                    {{ isset($subject) ? 'Cập nhật' : 'Tạo' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
