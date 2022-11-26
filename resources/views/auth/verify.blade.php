@extends('layouts.app')

@section('content')

<div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:mx-auto w-full mt-10 md:mt-0">
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Vérifier votre adresse mail</h2>
    {{ __('Before proceeding, please check your email for a verification link.') }}
    {{ __('If you did not receive the email') }},
    <form method="POST" action="{{ route('verification.resend') }}">
        @csrf
        <div class="relative mb-4">
            <button type="submit" class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">{{ __('click here to request another') }}</button>
        </div>
    </form>
</div>

@endsection
