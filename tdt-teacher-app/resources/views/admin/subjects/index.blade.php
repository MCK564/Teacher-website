@extends('home')
@section('title','Môn học')
@section('content')
   <div class="container mx-auto">
   
    
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem danh sách môn học
        </h2>
        <form method="GET" action="{{ route('admin.subjects.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-50 mr-2"
                    type="text"
                    name="keyword"
                    required autocomplete=""
                    placeholder="tên" />
                <x-primary-button class="font-bold text-2xl">Tìm</x-primary-button>
                <a href={{ route("admin.subjects.show_form_create") }} class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl mx-2">Tạo</a>
            </div>
        </form>
    </div>
    @if (isset($subjects))
    <x-table :headers="['ID', 'Tên','Mô tả','Tài liệu','Thao tác']" :data="$subjects" class="border-collapse border border-gray-200">
        @foreach ($subjects as $subject)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $subject->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $subject->name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $subject->description }}</td>
           
            <td class="px-6 py-4 whitespace-no-wrap">
                <x-nav-link :href="''" class="text-yellow-600 hover:text-yellow-900">
                  
                </x-nav-link>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap flex items-center">
                <form method="POST" action="{{ route('admin.subjects.delete', ['id' => $subject->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                 
                    <button type="submit" class="text-red-600 hover:text-red-900 cursor-pointer hover:underline">
                        Delete
                       </button>
                </form>
                <form method="GET" action="{{ route('admin.subjects.show_form_update', ['id' => $subject->id]) }}" class="inline mx-2">
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