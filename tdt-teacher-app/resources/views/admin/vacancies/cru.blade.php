@extends('home')
@section('title',isset($vacancy) ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <h2 class="font-bold text-2xl py-2 text-gray-600">
            {{ isset($vacancy) ? 'Cập nhật thông tin tuyển dụng' : 'Thêm mới thông tin tuyển dụng' }}
        </h2>
        <form method="POST" action="{{ isset($vacancy) ? route('admin.vacancies.update', ['id' => $vacancy->id]) : route('admin.vacancies.create') }}" enctype="multipart/form-data">
            @csrf 
            <div class="grid gap-2">
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Tên công ty
                    </span>
                    <x-text-input id="company_name" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="company_name" required autocomplete="off" placeholder="tên công ty" value="{{ isset($vacancy) ? $vacancy->company_name : '' }}" />
                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Tên công việc
                    </span>
                    <x-text-input id="job_name" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="job_name" required autocomplete="off" placeholder="tên công việc" value="{{ isset($vacancy) ? $vacancy->job_name : '' }}" />
                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Ảnh đại diện
                    </span>
                    <input type="file" name='thumbnail' class="border-gray-400 rounded-md shadow-sm px-2 py-1"/>

                        @if (isset($vacancy))
                        <img src={{ $vacancy->thumnails }} class="rounded-md border-gray-500" alt="thumbnail"/>
                    @endif    
                </div>
             
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                      Vị trí
                    </span>
                    <x-text-input id="position" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="position" required autocomplete="off" placeholder="vị trí" value="{{ isset($vacancy) ? $vacancy->position : '' }}" />

                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Phúc lợi
                    </span>
                    <x-text-input id="welfare" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="welfare"  autocomplete="off" placeholder="phúc lợi" value="{{ isset($vacancy) ? $vacancy->welfare : '' }}" />

                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Lương 
                    </span>
                    <x-text-input id="salary" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="salary" required autocomplete="off" placeholder="lương/ hỗ trọ" value="{{ isset($vacancy) ? $vacancy->salary : '' }}" />

                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                       Link chi tiết
                    </span>
                    <x-text-input id="detail_link" class="block mt-1 w-50 mr-2 col-span-1 flex-1" type="text" name="detail_link" required autocomplete="off" placeholder="link chi tiết" value="{{ isset($vacancy) ? $vacancy->detail_link : '' }}" />
                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                       Mô tả công việc
                    </span>
                    <textarea id="description" class="block mt-1 w-50 mr-2 rounded-md border-gray-300 col-span-1 flex-1" name="description" required autocomplete="off" placeholder="mô tả">{{ isset($vacancy) ? $vacancy->description : '' }}</textarea>
                    {{-- <textarea id="description" name="description">{{ isset($vacancy) ? $vacancy->description : '' }}</textarea> --}}


                </div>
                <div class="flex items-center">
                    <span class="rounded-md px-2 py-1 bg-blue-500 text-red-200 font-bold mx-1">
                        Yêu cầu
                    </span>
                    <textarea id="requirements" class="block mt-1 w-50 mr-2 rounded-md border-gray-300 col-span-1 flex-1" name="requirements"  autocomplete="off" placeholder="yêu cầu">{{ isset($vacancy) ? $vacancy->requirements : '' }}</textarea>

                </div>

                <button type="submit" class="border-1 border-gray-400 shadow-sm bg-green-400 hover:bg-green-600 rounded-md px-2 py-1 font-bold text-white text-2xl">
                    {{ isset($vacancy) ? 'Cập nhật' : 'Tạo' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection