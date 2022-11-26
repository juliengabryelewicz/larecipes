{!! Form::open(['id' => 'contact_form', 'route' => ['contact.send'], 'method' => 'POST']) !!}

    <div class="relative mb-4">
      {!! Form::text('name', null, ['class' => 'input-text-form' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Votre nom', 'required']) !!}

      @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
      @enderror
    </div>

    <div class="relative mb-4">
      {!! Form::email ('email', null, ['class' => 'input-text-form' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Votre email', 'required']) !!}

      @error('email')
        <span class="invalid-feedback">{{ $message }}</span>
      @enderror
    </div>

    <div class="relative mb-4">
      {!! Form::textarea('message', null, ['class' => 'w-full bg-white rounded border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out' . ($errors->has('content') ? ' is-invalid' : ''), 'placeholder' => 'Votre message', 'required']) !!}

      @error('message')
        <span class="invalid-feedback">{{ $message }}</span>
      @enderror
    </div>

    <div class="relative mb-4">
      {!! Form::submit("Envoyer un message", ['class' => 'text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg']) !!}
    </div>
  {!! Form::close() !!}