@extends('home')
@section('title','Tin tức')
@section('content')
<div class="container mx-auto">
    <div class="p-2 mb-4">
        <form method="GET" action="{{ route('news.search') }}">
            <div class="flex"> 
                <x-text-input id="keyword" class="block mt-1 w-100 mr-2 flex-1 "
                    type="text"
                    name="keyword"
                    required autocomplete=""
                    placeholder="tiêu đề ..." />
                    <button type="submit" class=" text-2xl text-white bg-blue-500 transition ease-in-out hover:bg-blue-700 border-gray-400 rounded-md shadow-md px-2">
                        tìm
                       </button>
            </div>
        </form>
    </div>
        @if (isset($news))
        <div class="grid md:grid-cols-2 grid-cols-1 gap-3">
            @foreach ($news as $new)
            <a href={{ '/news/'. $new->id }} class="flex md:col-span-1 flex-row items-center bg-blue-50 rounded-md p-2 shadow hover:scale-105  hover:shadow-lg transition ease-in-out duration-300  border-gray-700">
                <img class="object-cover w-full h-full md:w-48 mr-1 " src={{ $new->thumbnail }} alt={{ 'image '.$new->id }}>
                <div class="flex flex-col justify-between  leading-normal">
                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 ">{{ $new->title }}</h5>
                <h6 class="text-end text-gray-400 text-sm">
                    {{ $new->created_at }}
                </h6>
            </div>
            </a>

            @endforeach
        </div>
        @endif
    </div>
    </div>
    <div class="flex justify-center">
        {{ $news->links() }}
    </div>
@endsection