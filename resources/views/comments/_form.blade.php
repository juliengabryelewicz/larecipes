<h3 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">Laisser un commentaire</h3>

{!! Form::open(['id' => 'comments_form', 'route' => ['comments.store'], 'method' => 'POST']) !!}
    {!! Form::hidden('recipe_id', $recipe->id) !!}

    <div class="relative mb-4">
      {!! Form::text('name', null, ['class' => 'input-text-form' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Titre du commentaire', 'required']) !!}

      @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
      @enderror
    </div>

    <div class="relative mb-4">
      {!! Form::textarea('content', null, ['class' => 'w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Votre commentaire', 'required']) !!}

      @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
      @enderror
    </div>

    <div class="relative mb-4">
      {!! Form::submit("Ajouter un commentaire", ['class' => 'text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg']) !!}
    </div>
  {!! Form::close() !!}