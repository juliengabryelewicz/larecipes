@extends('admin.layouts.app')


@section('content')
<div class="flex flex-wrap w-full mb-8">
    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Créer un rôle</h1>
    <div class="h-1 w-20 bg-green-500 rounded"></div>
    </div>
    <a href="{{ route('admin.roles.index') }}" class='button-admin-confirm'>
        Retour
    </a>
</div>


@if (count($errors) > 0)
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif


{!! Form::open(array('route' => 'admin.roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'input-text-form')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class='button-admin-confirm'>Sauvegarder</button>
    </div>
</div>
{!! Form::close() !!}

@endsection