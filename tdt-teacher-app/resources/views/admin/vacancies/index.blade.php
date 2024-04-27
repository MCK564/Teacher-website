@extends('home')
@section('title','Quản lý thông tin tuyển dụng')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem danh sách thông tin tuyển dụng
        </h2>
        <form method="GET" action="{{ route('admin.vacancies.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-50 mr-2 flex-1"
                type="text"
                name="keyword"
                required autocomplete=""
                placeholder="job hoặc tên công ty hoặc vị trí" />
                <x-primary-button class="">Tìm</x-primary-button>
                <a href={{ route("admin.vacancies.show_form_create") }} class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl mx-2">Tạo</a>
            </div>
        </form>

    </div>

    <x-table :headers="['ID', 'Công ty', 'Công việc', 'Vị trí' ,'Lương','Thao tác']" :data="$vacancies" class="border-collapse border border-gray-200">
        @foreach ($vacancies as $vacancy)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $vacancy->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $vacancy->company_name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $vacancy->job_name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $vacancy->position }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $vacancy->salary }}</td>
            

            

            <td class="px-6 py-4 whitespace-no-wrap flex">
                <form method="POST" action="{{ route('admin.vacancies.delete', ['id' => $vacancy->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-nav-link onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900 cursor-pointer">
                        {{ __('Delete') }}
                    </x-nav-link>
                </form>
                <form method="GET" action="{{ route('admin.vacancies.show_form_update', ['id' => $vacancy->id]) }}" class="inline mx-2">
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

    {{ $vacancies->links() }}
</div>
@endsection