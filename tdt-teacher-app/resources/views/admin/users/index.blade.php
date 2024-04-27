@extends('admin.dashboard')
@section('title','Quản lý người dùng')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            Xem danh sách người dùng
        </h2>
        <form method="GET" action="{{ route('admin.users.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-50 mr-2"
                type="text"
                name="keyword"
                required autocomplete=""
                placeholder="tên hoặc email" />
                <x-primary-button class="">Tìm</x-primary-button></div>
        </form>
    </div>

    <x-table :headers="['ID', 'Tên', 'Email', 'Vai trò' ,'Lượt tải về','Thao tác']" :data="$users" class="border-collapse border border-gray-200">
        @foreach ($users as $user)
        <tr>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->id }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->name }}</td>
            <td class="px-6 py-4 whitespace-no-wrap">{{ $user->email }}</td>
            <td class="px-6 py-4 whitespace-no-wrap"> 
                   @if ($user->user_type == 'admin')
                       <span class="font-bold text-green-400 text-1xl hover:text-green-700 uppercase cursor-pointer">
                         admin
                       </span>
                   @else
                   <span class="font-bold text-gray-400 text-1xl hover:text-gray-700 cursor-pointer">
                    user
                  </span>
                   @endif
           </td>
           

            <td class="px-6 py-4 whitespace-no-wrap">
                <x-nav-link :href="''" class="text-yellow-600 hover:text-yellow-900">
                  {{ $user->downloads->count() }}
                </x-nav-link>
            </td>

            <td class="px-6 py-4 whitespace-no-wrap flex">
                @if ($user->user_type != 'admin')
                <form method="POST" action="{{ route('admin.users.delete', ['id' => $user->id]) }}" class="inline">
                    @csrf
                    @method('DELETE')
                    <x-nav-link onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900 cursor-pointer">
                        {{ __('Delete') }}
                    </x-nav-link>
                </form>
                @else
                    <span>Không thao tác</span>
                @endif
             
            </td>
            <tr>
                <td colspan="6" class="border-t border-gray-200"></td>
            </tr>
        </tr>
        @endforeach
    </x-table>

    {{ $users->links() }}
</div>
@endsection