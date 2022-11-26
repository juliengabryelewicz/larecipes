@extends('admin.layouts.app')


@section('content')

<div class="flex flex-wrap w-full mb-8">
  <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
    <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Utilisateurs</h1>
    <div class="h-1 w-20 bg-green-500 rounded"></div>
    <div class="mt-4">
      <a href="{{ route('admin.users.create') }}" class='button-admin-confirm'>
        Ajouter
      </a>
    </div>
  </div>
</div>

<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
<table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <th>No</th>
    <th>Name</th>
    <th>Email</th>
    <th>Roles</th>
    <th width="280px">Action</th>
    </thead>
    <tbody>
      @foreach ($data as $key => $user)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
          <td class="py-4 px-6">{{ ++$i }}</td>
          <td class="py-4 px-6">{{ $user->name }}</td>
          <td class="py-4 px-6">{{ $user->email }}</td>
          <td class="py-4 px-6">
            @if(!empty($user->getRoleNames()))
              @foreach($user->getRoleNames() as $v)
                <label>{{ $v }}</label>
              @endforeach
            @endif
          </td>
          <td>
            <a class='button-admin-primary' href="{{ route('admin.users.edit',$user->id) }}">Edit</a>
              {!! Form::open(['method' => 'DELETE','route' => ['admin.users.destroy', $user->id],'class'=>'inline']) !!}
                  {!! Form::submit('Delete', ['class' => 'button-admin-confirm']) !!}
              {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


{!! $data->render() !!}

@endsection