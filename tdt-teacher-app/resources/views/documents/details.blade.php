@extends('home')
@section('title','Chi tiết tài liệu')
@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl  mb-4 text-blue-600">
            Môn học - <span class="text-gray-800">{{ $document->subject->name }}</span>
        </h2>
        <hr class="my-4 border-b border-red-400">
        <h2 class="text-2xl  mb-4 text-blue-600">
            Tiêu đề - <span class="text-gray-800">{{ $document->title }}</span>
        </h2>
        <hr class="my-4 border-b border-red-400">
        <h3 class="text-2xl  mb-4 text-blue-600">
            Nội dung cơ bản
        </h3>
        <p class="mb-8 text-gray-800">{{ $document->content }}</p>
        <h2 class="text-2xl  mb-4 text-blue-600">
            Danh sách file đính kèm
        </h2>
        <hr class="my-4 border-b border-red-400">
        @if ($document->attach_files->count() > 0)
            <ul class="grid grid-cols-1 gap-4">
                @foreach ($document->attach_files as $file)
                <div class="flex">
                    <form action={{ route('download')}} method="GET"  class="text-white hover:underline mb-2">
                        <input name="url" value={{ $file->url }} class="hidden"/>
                        <input name="file_id" value={{ $file->id }} class="hidden"/>
                        <input name="user_id" value={{ Auth::id() }} class="hidden"/>
                       <button type="submit" class="rounded-md bg-blue-500 hover:bg-blue-700 border-gray-500 shadow-sm px-2 py-1">
                        {{ $file->file_name }}  <i class="fas fa-download mr-2"></i>
                       </button>
                    </form>
                   
                </div>
                @endforeach
            </ul>
        @else
            <p class="text-gray-800">Không có file đính kèm.</p>
        @endif
    </div>
</div>
@endsection
