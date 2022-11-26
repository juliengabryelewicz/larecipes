@extends('admin.layouts.app')

@section('content')

    <div class="flex flex-wrap w-full mb-8">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Modifier la recette</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
      </div>
    </div>

    {!! Form::model($recipe, ['route' => ['admin.recipes.update', $recipe], 'method' =>'PUT', 'files' => true]) !!}
        @include('admin/recipes/_form')

        <div class="pull-left">
            {{ link_to_route('admin.recipes.index', "Retour", [], ['class' => 'button-admin-primary']) }}
            {!! Form::submit("Modifier", ['class' => 'button-admin-confirm']) !!}
        </div>
    {!! Form::close() !!}

    @can('recipe-delete')
      {!! Form::model($recipe, ['method' => 'DELETE', 'route' => ['admin.recipes.destroy', $recipe], 'class' => 'form-inline pull-right', 'data-confirm' => "Etes-vous sur?"]) !!}
          {!! Form::button('Supprimer', ['class' => 'button-admin-confirm', 'name' => 'submit', 'type' => 'submit']) !!}
      {!! Form::close() !!}
    @endcan
@endsection
