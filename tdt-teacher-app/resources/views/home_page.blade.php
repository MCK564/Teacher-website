@extends('home')
@section('title','Đại học Tôn Đức Thắng')
@section('content')
   

<div id="controls-carousel" class="relative w-full mb-5 shadow-md rounded-md" data-carousel="static">
   
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src={{ asset('images/home_page_logos/Banner-tuyensinh-Ths-KHMT.png') }} class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="images/home_page_logos/yee.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>

<div class="grid grid-cols-1 gap-4">
    <div class="mb-5 shadow-md px-2 py-1 rounded-md">
        <a href="/news">
            <h2 class=" text-2xl mb-1 text-blue-600 hover:underline">
                Tin tức nổi bật
             </h2>
        </a>
      
        <hr class="rounded-md my-1 border-red-300 mb-4 border-1"/> 
        <div class="grid md:grid-cols-5 grid-cols-1 gap-4">
            @if (isset($news))
                @foreach ($news as $item)
                <a href={{ 'news/'.$item->id }} class="max-w-sm bg-white  rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105 hover:bg-blue-200 h-full">
                   
                        <img class="rounded-t-lg w-full h-32" src={{ $item->thumbnail }} alt="..." />
                        <div class="p-5 mb-2">
                            <p class="mb-3  text-dark">
                                {{ $item->title }}
                                <p class="text-sm text-gray-400 ">
                                    {{ $item->created_at }}
                                </p>
                            </p>
                        </div>
                        
                </a>
                @endforeach
            @endif
        </div>
    </div>

    <div class="mb-5 shadow-md px-2 py-1 rounded-md">
        <a href="/documents">
            <h2 class=" text-2xl mb-1 text-blue-600 hover:underline">
                Tài liệu mới cập nhật
             </h2>
        </a>
      
        <hr class="border-1 rounded-md border-red-400 mb-3"/> 
        <div class="grid md:grid-cols-5 grid-cols-1 gap-4">
            @if (isset($documents))
                @foreach ($documents as $item)
                <a href={{ 'documents/'.$item->id }}>
                    <div class="max-w-sm bg-white  rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105 hover:bg-red-200 h-full">
                        <img class="rounded-t-lg w-full h-32" src={{ $item->thumbnail }} alt="..." />
                        <div class="p-2">
                            <p class=" text-gray-400">
                              môn - {{ $item->subject->name }}
                            </p>
                        </div>
                        <div class="p-2">
                            <p class="mb-2  text-dark">
                                {{ $item->title }}
                            </p>
                        </div>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>

    <div class="mb-5 shadow-md px-2 py-1 rounded-md">
        <a href="/vacancies">
            <h2 class=" text-2xl mb-1 text-blue-600 hover:underline">
                Thông tin tuyển dụng
             </h2>
        </a>
      
        <hr class="border-1 rounded-md border-red-400 mb-3"/> 
        <div class="grid md:grid-cols-5 grid-cols-1 gap-4">
            @if (isset($vacancies))
                @foreach ($vacancies as $item)
                <a href={{ 'vacancies/'.$item->id }}>
                    <div class="max-w-sm bg-white  rounded-lg shadow transition duration-300 ease-in-out transform hover:scale-105 hover:bg-lime-300 hover:text-white h-full">
                        <img class="rounded-t-lg w-full h-32" src={{ $item->thumnails }} alt="..." />
                        <div class="p-1">
                            <p class=" text-gray-400">
                          {{ $item->company_name }}
                            </p>
                        </div>
                            <p class=" text-dark p-1">
                                {{ $item->job_name }}
                            </p>
                        <p class="p-1  text-red-500">
                            {{ $item->salary }}
                        </p>
                    </div>
                </a>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection