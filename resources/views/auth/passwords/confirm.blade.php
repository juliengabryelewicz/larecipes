@extends('layouts.app')

@section('content')

<div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Confirmer le mot de passe</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="relative mb-4">
            <label for="password" class="label-form">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="input-form">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="relative mb-4">
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Confirmer le mot de passe</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
    </form>
</div>
@endsection
