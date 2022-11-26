@extends('layouts.app')

@section('title', ucfirst($category->title))

@section('content')

    <div class="flex flex-wrap w-full mb-20">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ ucfirst($category->title) }}</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
        <div>
            {{ $category->content }}
        </div>
      </div>
    </div>

    @include ('recipes/_list')
    
    {{ $recipes->onEachSide(5)->links() }}

@endsection
