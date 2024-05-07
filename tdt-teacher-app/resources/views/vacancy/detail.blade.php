
@extends('home')
@section('title', 'Chi tiết thông tin tuyển dụng')
@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-3xl font-semibold text-green-600 mb-4">{{ $vacancy->company_name }}</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <img src={{ $vacancy->thumnails }} alt="Thumbnail" class="w-full rounded-lg shadow-lg mb-4">
                <p class="text-lg text-gray-700"><span class="font-semibold">Vị trí:</span>{{ $vacancy->position }}</p>
                <p class="text-lg text-gray-700"><span class="font-semibold">Lương:</span>{{ $vacancy->salary }}</p>
                <p class="text-lg text-gray-700"><span class="font-semibold">Link chi tiết:</span> <a href={{ $vacancy->detail_link }} class="text-blue-500">Chi tiết</a></p>
            </div>
            <div class="md:col-span-1">
                <h2 class="text-xl font-semibold text-red-600 mb-2">Mô tả công việc</h2>
                {!! $vacancy->description !!}
                <h2 class="text-xl font-semibold text-red-600 mt-4 mb-2">Yêu cầu</h2>
                 {!! $vacancy->requirements !!}
            </div>
            <div class="md:col-span-1">
                <h2 class="text-xl font-semibold text-red-600 mb-2">Phúc lợi</h2>
                {!! $vacancy->welfare !!}
            </div>

        </div>
       
    </div>
</div>
@endsection
