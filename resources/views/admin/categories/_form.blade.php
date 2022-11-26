<div class="my-4">
    {!! Form::label('title', "Titre", ['class' => 'label-form']) !!}
    {!! Form::text('title', null, ['class' => 'input-text-form' . ($errors->has('title') ? ' is-invalid' : ''), 'required']) !!}

    @error('title')
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