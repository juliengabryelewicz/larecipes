@extends('admin.layouts.app')


@section('content')
<div class="flex flex-wrap w-full mb-8">
    <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Modifier un utilisateur</h1>
    <div class="h-1 w-20 bg-green-500 rounded"></div>
    </div>
    <a href="{{ route('admin.users.index') }}" class='button-admin-confirm'>
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


{!! Form::model($user, ['method' => 'PATCH','route' => ['admin.users.update', $user->id]]) !!}
<div class="my-4">
    {!! Form::label('name', "Nom", ['class' => 'label-form']) !!}
    {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'input-text-form')) !!}
</div>
<div class="my-4">
    {!! Form::label('email', "Email", ['class' => 'label-form']) !!}
    {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'input-text-form')) !!}
</div>
<div class="my-4">
    {!! Form::label('password', "Mot de passe", ['class' => 'label-form']) !!}
    {!! Form::password('password', array('placeholder' => 'Password','class' => 'input-text-form')) !!}
</div>
<div class="my-4">
    {!! Form::label('confirm-password', "Confirmer le mot de passe", ['class' => 'label-form']) !!}
    {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'input-text-form')) !!}
</div>
<div class="my-4">
    {!! Form::label('roles[]', "Rôles", ['class' => 'label-form']) !!}
    {!! Form::select('roles[]', $roles,$userRole, array('class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500','multiple')) !!}
</div>
<button type="submit" class='button-admin-confirm'>Modifier</button>
{!! Form::close() !!}

@endsection