@extends('admin.layouts.app')

@section('content')
    <div class="flex flex-wrap w-full mb-8">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Créer une recette</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
      </div>
    </div>

    {!! Form::open(['route' => ['admin.recipes.store'], 'method' =>'POST', 'files' => true]) !!}
        @include('admin/recipes/_form')

        {{ link_to_route('admin.recipes.index', "Retour à la liste", [], ['class' => 'button-admin-primary']) }}
        {!! Form::submit("Sauvegarder", ['class' => 'button-admin-confirm']) !!}
    {!! Form::close() !!}
@endsection
