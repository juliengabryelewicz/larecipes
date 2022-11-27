{!! Form::hidden('user_id', auth()->user()->id) !!}

<div class="my-4">
    {!! Form::label('title', "Titre", ['class' => 'label-form']) !!}
    {!! Form::text('title', null, ['class' => 'input-text-form' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('image', "Image", ['class' => 'label-form']) !!}
    {!! Form::file('image', null, ['class' => 'block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400']) !!}
    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Maximum 2 Mo (jpeg, gif, png, svg)</p>
    @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('difficulty', "Difficulté", ['class' => 'label-form']) !!}
    {!! Form::select('difficulty', config('enum.difficulties'), null, ['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}

    @error('difficulty')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('calories', "Nombre de calories", ['class' => 'label-form']) !!}
    {!! Form::number('calories', null, ['class' => 'input-text-form']) !!}

    @error('calories')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('serving', "Nombre de personnes", ['class' => 'label-form']) !!}
    {!! Form::number('serving', null, ['class' => 'input-text-form'], 'required') !!}

    @error('serving')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('preparation_time', "Temps de préparation", ['class' => 'label-form']) !!}
    {!! Form::text('preparation_time', null, ['class' => 'input-text-form' . ($errors->has('preparation_time') ? ' is-invalid' : ''), 'required']) !!}

    @error('preparation_time')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<div class="my-4">
    {!! Form::label('categories[]', "Catégories", ['class' => 'label-form']) !!}
    {!! Form::select('categories[]', $categories, null, ['multiple'=>'multiple', 'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}

    @error('preparation_time')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>


<div class="my-4">
    {!! Form::label('content', "Description", ['class' => 'label-form']) !!}
    {!! Form::textarea('content', null, ['class' => 'tinymce textarea-form' . ($errors->has('content') ? ' is-invalid' : ''), 'required']) !!}

    @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
