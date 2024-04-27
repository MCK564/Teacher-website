@extends('home')
@section('title','Quản lý tin tức')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem danh sách tin tức 
        </h2>
        <form method="GET" action="{{ route('admin.news.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-50 mr-2"
                    type="text"
                    name="keyword"
                    required autocomplete=""
                    placeholder="tiêu đề ..." />
                <x-primary-button class="font-bold text-2xl">Tìm</x-primary-button>
               
                <a href={{ route("admin.news.show_form_create") }} class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl mx-2">Tạo</a>
            </div>
        </form>
    </div>
    @if (isset($news))
    <x-table :headers="['ID','Ảnh đại diện','Tiêu đề','Thao tác']" :data="$news" class="border-collapse border border-gray-200">
        @foreach ($news as $new)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $new->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">
                <img src={{ $new->thumbnail }} alt=`image {{ $new->id }}` class="w-16 h-16 object-cover rounded"/>
            </td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $new->title }}</td>
    
            <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                <form method="POST" action="{{ route('admin.news.delete', ['id' => $new->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                 
                    <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer hover:underline">
                        Delete
                       </button>
                </form>
                <form method="GET" action="{{ route('admin.news.show_form_update', ['id' => $new->id]) }}" class="inline mx-2">
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