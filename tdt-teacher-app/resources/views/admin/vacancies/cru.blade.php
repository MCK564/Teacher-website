@extends('home')
@section('title', isset($vacancy) ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            {{ isset($vacancy) ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng' }}
        </h2>
        <form method="POST" action="{{ isset($vacancy) ? route('admin.vacancies.update', ['id' => $vacancy->id]) : route('admin.vacancies.create') }}" enctype="multipart/form-data" class="space-y-4">
            @csrf 
            <div>
                <label for="company_name" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Tên công ty
                    </span>
                    <x-text-input id="company_name" class="block w-full flex-1" type="text" name="company_name" required autocomplete="off" placeholder="tên công ty" value="{{ isset($vacancy) ? $vacancy->company_name : '' }}" />
                </label>
            </div>
            <div>
                <label for="job_name" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Tên công việc
                    </span>
                    <x-text-input id="job_name" class="block w-full flex-1" type="text" name="job_name" required autocomplete="off" placeholder="tên công việc" value="{{ isset($vacancy) ? $vacancy->job_name : '' }}" />
                </label>
            </div>
            <div>
                
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Ảnh đại diện
                    </span>
                    <input type="file" name='thumbnail' class="border-gray-400 rounded-md shadow-sm px-2 py-1"/>
                    @if (isset($vacancy))
                    <img src={{ $vacancy->thumnails }} class="rounded-md border-gray-500" alt="thumbnail"/>
                    @endif    
               
            </div>
            <div>
                <label for="position">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Vị trí
                    </span>
                    <x-text-input id="position" class="block w-full flex-1" type="text" name="position" required autocomplete="off" placeholder="vị trí" value="{{ isset($vacancy) ? $vacancy->position : '' }}" />
                </label>
            </div>
            <div>
                <label for="welfare" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Phúc lợi
                    </span>
                    <x-text-input id="welfare" class="block w-full flex-1" type="text" name="welfare" autocomplete="off" placeholder="phúc lợi" value="{{ isset($vacancy) ? $vacancy->welfare : '' }}" />
                </label>
            </div>
            <div>
                <label for="salary" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Lương 
                    </span>
                    <x-text-input id="salary" class="block w-full flex-1" type="text" name="salary" required autocomplete="off" placeholder="lương/ hỗ trọ" value="{{ isset($vacancy) ? $vacancy->salary : '' }}" />
                </label>
            </div>
            <div>
                <label for="detail_link" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Link chi tiết
                    </span>
                    <x-text-input id="detail_link" class="block w-full flex-1" type="text" name="detail_link" required autocomplete="off" placeholder="link chi tiết" value="{{ isset($vacancy) ? $vacancy->detail_link : '' }}" />
                </label>
            </div>
            <div>
                <label for="description" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Mô tả công việc
                    </span>
                    <textarea id="description" class="block w-full flex-1 rounded-md border-gray-300" name="description" required autocomplete="off" placeholder="mô tả">{{ isset($vacancy) ? $vacancy->description : '' }}</textarea>
                </label>
            </div>
            <div>
                <label for="requirements" >
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mr-2">
                        Yêu cầu
                    </span>
                    <textarea id="requirements" class="block w-full flex-1 rounded-md border-gray-300" name="requirements" autocomplete="off" placeholder="yêu cầu">{{ isset($vacancy) ? $vacancy->requirements : '' }}</textarea>
                </label>
            </div>
            <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl w-full">
                {{ isset($vacancy) ? 'Cập nhật' : 'Tạo' }}
            </button>
        </form>
    </div>
</div>
@endsection
