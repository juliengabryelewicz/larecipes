@extends('layouts.app')

@section('title', $recipe->title)

@section('content')

<div class="flex flex-wrap w-full mb-8">
  <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ $recipe->title }}</h1>
    <div class="h-1 w-20 bg-green-500 rounded"></div>
    <div>
      @each('categories/_item', $recipe->categories, 'category')
    </div>
  </div>
</div>

<div class="container px-5 py-4 mx-auto">
  <div class="flex flex-wrap -m-4 text-center bg-green-500">
    <div class="p-4 sm:w-1/4 w-1/2">
      <h2 class="title-font font-medium sm:text-4xl text-3xl text-white">{{ $recipe->serving }}</h2>
      <p class="leading-relaxed text-white">Nombre de personnes</p>
    </div>
    @if(!empty($recipe->calories))
      <div class="p-4 sm:w-1/4 w-1/2">
        <h2 class="title-font font-medium sm:text-4xl text-3xl text-white">{{ $recipe->calories }}</h2>
        <p class="leading-relaxed text-white">Calories</p>
      </div>
    @endif
    @if(!empty($recipe->preparation_time))
    <div class="p-4 sm:w-1/4 w-1/2">
      <h2 class="title-font font-medium sm:text-4xl text-3xl text-white">{{ $recipe->preparation_time }}</h2>
      <p class="leading-relaxed text-white">Temps de préparation</p>
    </div>
    @endif
    <div class="p-4 sm:w-1/4 w-1/2">
      <h2 class="title-font font-medium sm:text-4xl text-3xl text-white">{{ config('enum.difficulties.'.$recipe->difficulty) }}</h2>
      <p class="leading-relaxed text-white">Difficulté</p>
    </div>
  </div>
</div>

<div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
  <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
    <div class="mb-8 leading-relaxed">
      {!! $recipe->content !!}
    </div>
  </div>
  <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
    <img class="object-cover object-center rounded" alt="hero" src="{{ '/images_recipes/' . $recipe->image }}">
  </div>
</div>

  @include ('comments/_list')

@endsection
