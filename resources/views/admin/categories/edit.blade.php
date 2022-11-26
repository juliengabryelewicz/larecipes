@extends('admin.layouts.app')

@section('content')

    <div class="flex flex-wrap w-full mb-8">
      <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Modifier la catégorie</h1>
        <div class="h-1 w-20 bg-green-500 rounded"></div>
      </div>
    </div>

    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' =>'PUT']) !!}
        @include('admin/categories/_form')

        <div class="pull-left">
            {{ link_to_route('admin.categories.index', "Retour", [], ['class' => 'button-admin-primary']) }}
            {!! Form::submit("Modifier", ['class' => 'button-admin-confirm']) !!}
        </div>
    {!! Form::close() !!}

    @can('category-delete')
      {!! Form::model($category, ['method' => 'DELETE', 'route' => ['admin.categories.destroy', $category], 'class' => 'form-inline pull-right', 'data-confirm' => "Etes-vous sur?"]) !!}
          {!! Form::button('Supprimer', ['class' => 'button-admin-confirm', 'name' => 'submit', 'type' => 'submit']) !!}
      {!! Form::close() !!}
    @endcan
@endsection
