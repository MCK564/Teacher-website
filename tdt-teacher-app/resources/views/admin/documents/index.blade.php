@extends('home')
@section('title','Quản lý tài liệu')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem danh sách tài liệu 
        </h2>
        <form method="GET" action="{{ route('admin.documents.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-50 mr-2"
                    type="text"
                    name="keyword"
                    autocomplete=""
                    placeholder="tiêu đề ..." />
                    <select name="type" id="type" class="block mt-1 sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                        <option value="" selected>Loại tài liệu</option>
                        <option value="theory" {{ isset($document) && $document->type == 'theory' ? 'selected' : '' }}> Lý thuyết</option>
                        <option value="lab" {{ isset($document) && $document->type == 'lab'? 'selected' : '' }}>Thực hành</option>
                        <option value="other"{{ isset($document) && $document->type == 'other' ? 'selected' : ''}} >Khác</option>
                    </select>
                    @if (isset($subjects))
                    <select name="subject_id" id="subject_id" class="block mt-1 sm:col-span-1 md: text-gray-500 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mx-2">
                        <option value="" selected>Môn học</option>
                        @foreach ($subjects as $item)
                            <option value={{ $item->id }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                       
                    </select>
                    @endif
                <x-primary-button class="font-bold text-2xl">Tìm</x-primary-button>
               
                <a href={{ route("admin.documents.show_form_create") }} class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl mx-2">Tạo</a>
            </div>
        </form>
    </div>
    @if (isset($documents))
    <x-table :headers="['ID', 'Môn','Loại tài liệu','Tiêu đề','Nội dung','File đính kèm','Thao tác']" :data="$documents" class="border-collapse border border-gray-200">
        @foreach ($documents as $document)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $document->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $document->subject->name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">
                @if ($document->type == 'theory')
                    lí thuyết
                @else
                    @if ($document->type == 'lab')
                        thực hành
                    @else
                        khác
                    @endif
                @endif
            </td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $document->title }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $document->content }}</td>
           
            <td class="px-6 py-4 whitespace-no-wrap">
                <x-nav-link :href="''" class="text-yellow-600 hover:text-yellow-900">
                  {{ $document->attach_files->count() }}
                </x-nav-link>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                <form method="POST" action="{{ route('admin.documents.delete', ['id' => $document->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                 
                    <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer hover:underline">
                        Delete
                       </button>
                </form>
                <form method="GET" action="{{ route('admin.documents.show_form_update', ['id' => $document->id]) }}" class="inline mx-2">
                    @csrf
                   <button type="submit" class="text-yellow-600 hover:text-yellow-900 cursor-pointer hover:underline">
                    Edit
                   </button>
                  
                </form>

            </td>
            <tr>
                <td colspan="6" class="border-t border-gray-200"></td>
            </tr>
        </tr>
        @endforeach
    </x-table>
    @endif
    
    @if (isset($message))
        <span class="text-red-700 font-bold text-2xl px-2">
            {{ $message }}
        </span>
    @endif
   </div>
@endsection