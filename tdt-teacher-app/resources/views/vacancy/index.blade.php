@extends('home')
@section('title','Thông tin tuyển dụng')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <form method="GET" action="{{ route('vacancies.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-100 mr-2 flex-1 "
                    type="text"
                    name="keyword"
                    required autocomplete=""
                    placeholder="tên công ty | vị trí | ngôn ngữ ...." />
                    <button type="submit" class=" text-2xl text-white bg-blue-500 transition ease-in-out hover:bg-blue-700 border-gray-400 rounded-md shadow-md px-2">
                        tìm
                       </button>
            </div>
        </form>
    </div>
        @if (isset($vacancies))
        <div class="grid md:grid-cols-2 grid-cols-1 gap-3">
            @foreach ($vacancies as $vacancy)
            <a href={{ '/vacancies/'. $vacancy->id }} class="flex md:col-span-1 flex-row items-center bg-blue-50 rounded-md p-1 shadow hover:scale-105  hover:shadow-lg transition ease-in-out duration-300  border-gray-700">
                <img class="object-cover w-full h-full md:w-48 mr-1 " src={{ $vacancy->thumnails }} alt={{ 'image '.$vacancy->id }}>
                <div class="flex flex-col">
                    <div class="p-1">
                        <p class=" text-gray-400">
                      {{ $vacancy->company_name }}
                        </p>
                    </div>
                        <p class=" text-dark p-1">
                            {{ $vacancy->job_name }}
                        </p>
                    <p class="p-1  text-red-500">
                        {{ $vacancy->salary }}
                    </p>
                </div>
                <h6 class="text-end text-gray-400 text-sm">
                    {{ $vacancy->created_at }}
                </h6>
                
          
            </a>
        
            @endforeach
        </div>
        <div class="flex justify-center my-4">
            {{ $vacancies->links() }}
    </div>
        </div>
        @endif
      
  


@endsection