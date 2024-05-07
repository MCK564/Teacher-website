@extends('home')
@section('title','Tài liệu')
@section('content')
<div class="container mx-auto">
    <form method="GET" action="{{ route('documents.search') }}">
        <div class="grid md:grid-cols-4 grid-cols-1 gap-3"> 
            <x-text-input id="keyword" class="block  w-50 "
                type="text"
                name="keyword"
                autocomplete=""
                placeholder="tiêu đề ..." />
                <select name="type" id="type" class="block  sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    <option value="" selected>Loại tài liệu</option>
                    <option value="theory" {{ isset($document) && $document->type == 'theory' ? 'selected' : '' }}> Lý thuyết</option>
                    <option value="lab" {{ isset($document) && $document->type == 'lab'? 'selected' : '' }}>Thực hành</option>
                    <option value="other"{{ isset($document) && $document->type == 'other' ? 'selected' : ''}} >Khác</option>
                </select>
                @if (isset($subjects))
                <select name="subject_id" id="subject_id" class="block  sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ">
                    <option value="" selected>Môn học</option>
                    @foreach ($subjects as $item)
                        <option value={{ $item->id }}>
                            {{ $item->name }}
                        </option>
                    @endforeach
                   
                </select>
                @endif
           <button type="submit" class=" text-2xl text-white bg-blue-500 transition ease-in-out hover:bg-blue-700 border-gray-400 rounded-md shadow-md">
            tìm
           </button>
        </div>
    </form>
    
    <hr class="w-96 h-1 mx-auto my-2 border-0 rounded  bg-blue-500  hover:w-full transition ease-in-out duration-300">
    @if (isset($documents))
    <span class=" text-sm text-blue-500 mb-2">
        Có khoảng {{ $documents->count() }} <span class="underline">tài liệu</span> môn học được tìm thấy
    </span>
    @endif
 
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mt-3">
            @foreach ($documents as $item)
            
            <a href={{'/documents/'.$item->id }} class=" flex flex-col items-center  border border-gray-200 rounded-lg shadow hover:scale-105  hover:shadow-lg transition ease-in-out duration-300 text-gray-700 ">
                <img class="object-cover rounded-t-lg h-48 w-full" src={{ $item->thumbnail }} alt={{ $item->title }}>
                <div class="flex flex-col justify-between p-2 leading-normal">
                    <span class="text-gray-400 ">{{ $item->subject->name }}</span>
                    <h5 class="mb-2 text-2xl tracking-tight text-gray-900 "> {{ $item->title }}</h5>
                    <div class="flex justify-end flex-col text-end text-sm text-gray-400">
                            <span class="text-end text-sm ">
                                @if ($item->attach_files->count() > 0)
                                   có {{ $item->attach_files->count() }} tệp đính kèm
                                @endif
                            </span>
                            <span>
                                @if ($item->created_at)
                                    {{ $item->created_at }}
                                @endif
                            </span>
                    </div>
                </div>
            </a>
           
            @endforeach
        </div>
        
        <div class="flex justify-center mt-3">
            {{ $documents->links() }}
    </div>
   
</div>
@endsection