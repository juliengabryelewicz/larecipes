@extends('layouts.app')

@section('content')

<div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Créer un compte</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="relative mb-4">
            <label for="email" class="label-form">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus class="input-form">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="relative mb-4">
            <label for="password" class="label-form">Mot de passe</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="input-form">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="relative mb-4">
            <label for="password-confirm" class="label-form">Confirmer le mot de passe</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password" class="input-form">
        </div>
        <div class="relative mb-4">
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
        </div>
    </form>
</div>

@endsection
