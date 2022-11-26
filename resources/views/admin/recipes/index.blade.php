@extends('admin.layouts.app')

@section('content')

    <div class="flex flex-wrap w-full mb-8">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Mes recettes</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
        @can('recipe-create')
        <div class="mt-4">
          <a href="{{ route('admin.recipes.create') }}" class='button-admin-confirm'>
            Ajouter
          </a>
        </div>
        @endcan
      </div>
    </div>
    
    @include ('admin/recipes/_list')

    {{ $recipes->onEachSide(5)->links() }}

@endsection
