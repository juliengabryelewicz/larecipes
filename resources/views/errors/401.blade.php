@extends('layouts.app')

@section('content')

<div class="flex flex-wrap w-full mb-20">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">{{ __('Unauthorized') }}</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
      </div>
</div>


@endsection