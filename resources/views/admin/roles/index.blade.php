@extends('admin.layouts.app')


@section('content')

<div class="flex flex-wrap w-full mb-8">
  <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Rôles</h1>
    <div class="h-1 w-20 bg-green-500 rounded"></div>
    @can('role-create')
    <div class="mt-4">
      <a href="{{ route('admin.roles.create') }}" class='button-admin-confirm'>
        Ajouter
      </a>
    </div>
    @endcan
  </div>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
  <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <th scope="col" class="py-3 px-6">No</th>
      <th scope="col" class="py-3 px-6">Name</th>
      <th scope="col" class="py-3 px-6">Action</th>
    </thead>
      @foreach ($roles as $key => $role)
      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="py-4 px-6">{{ ++$i }}</td>
          <td class="py-4 px-6">{{ $role->name }}</td>
          <td class="py-4 px-6">
              @can('role-edit')
                  <a class='button-admin-primary' href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
              @endcan
              @can('role-delete')
                  {!! Form::open(['method' => 'DELETE','route' => ['admin.roles.destroy', $role->id],'class'=>'inline']) !!}
                      {!! Form::submit('Delete', ['class' => 'button-admin-confirm']) !!}
                  {!! Form::close() !!}
              @endcan
          </td>
      </tr>
      @endforeach
  </table>
</div>


{!! $roles->render() !!}

@endsection