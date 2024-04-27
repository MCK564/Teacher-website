@extends('home')
@section('title',isset($document) ? 'Cập nhật tài liệu' : 'Thêm mới tài liệu')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            {{ isset($document) ? 'Cập nhật tài liệu' : 'Thêm mới tài liệu' }}
        </h2>
        <form method="POST" action="{{ isset($document) ? route('admin.documents.update', ['id' => $document->id]) : route('admin.documents.create') }}"  enctype="multipart/form-data">
            @csrf 
            <div class="grid gap-2">

                <x-text-input id="name" class="block mt-1 w-50 mr-2 col-span-1" type="text" name="title" required autocomplete="off" placeholder="tiêu đề" value="{{ isset($document) ? $document->title : '' }}" />
                    <select name="type" id="type" class="block mt-1 sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="" selected>Loại tài liệu</option>
                        <option value="theory" {{ isset($document) && $document->type == 'theory' ? 'selected' : '' }}> Lý thuyết</option>
                        <option value="lab" {{ isset($document) && $document->type == 'lab'? 'selected' : '' }}>Thực hành</option>
                        <option value="other"{{ isset($document) && $document->type == 'other' ? 'selected' : ''}} >Khác</option>
                    </select>
                    @if (isset($subjects))
                    <select name="subject_id" id="subject_id" class="block mt-1 sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="" selected>Môn học</option>
                        @foreach ($subjects as $item)
                            <option value={{ $item->id }} {{ isset($document) && $item->id == $document->subject_id ? 'selected' : ''}}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @endif
                    @if (isset($document))
                    <img src={{ $document->thumbnail }} class="" alt="thumbnail"/>
                @endif    
                <input type="file" name='thumbnail' class="border-gray-400 rounded-md shadow-sm px-2 py-1"/>
                <textarea id="keyword" class="block mt-1 w-50 mr-2 rounded-md border-gray-300 col-span-1" name="content" required autocomplete="off" placeholder="nội dung">{{ isset($document) ? $document->content : '' }}</textarea>
                <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl">
                    {{ isset($document) ? 'Cập nhật' : 'Tạo' }}
                </button>
            </div>
        </form>
        <hr class="border-gray-100 my-2 border-4 rounded"/>
        @if (isset($document))
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Cập nhật file đính kèm    
        </h2>
        @if ($document->attach_files()->count()>0)
        <div class="grid grid-cols-1">
           
            @foreach ($document->attach_files as $file)
            <div class="flex">
            <form action={{ route('download')}} method="GET"  class="text-gray-400 hover:text-gray-700 hover:underline mb-2">
                <input name="url" value={{ $file->url }} class="hidden"/>
                <input name="file_id" value={{ $file->id }} class="hidden"/>
                <input name="user_id" value={{ Auth::id() }} class="hidden"/>
               <button type="submit" class="rounded-md bg-lime-400 hover:bg-lime-600 border-gray-500 shadow-sm px-2 py-1">
                {{ $file->file_name }}
               </button>
            </form>
            <form action = {{ route('admin.documents.attach_files.delete',['id'=>$file->id]) }} method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="rounded-md bg-red-400 hover:bg-red-600 border-white-500 shadow-sm px-2 py-1">
                    X
                </button>
            </form>
        </div>
            @endforeach
       
    </div>
         @endif
            <form action={{route( 'admin.documents.update_attach_files' ,['id'=>$document->id]) }} method="POST" enctype="multipart/form-data" class="p-2" >
                @csrf
                <input type="file" name="files[]" class="border-gray-400 rounded-md shadow-sm px-2 py-1" multiple/>
                <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl">
                    Cập nhật
                </button>
            </form>
        @endif
    </div>
</div>
@endsection