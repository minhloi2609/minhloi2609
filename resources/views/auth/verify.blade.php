@extends('layouts.client_layout')

@section('content')
<section class="h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg">
        <div class="text-center mb-4">
            <h2 class="text-lg font-semibold">{{ __('Verify Your Email Address') }}</h2>
        </div>

        <div class="mb-4">
            @if (session('resent'))
            <div class="alert alert-success bg-green-100 border border-green-300 text-green-800 rounded-lg py-2 px-4 mb-4" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
            @endif
        </div>

        <p class="mb-4">
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
        <form class="inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="text-blue-600 hover:underline">
                {{ __('click here to request another') }}
            </button>.
        </form>
        </p>
    </div>
</section>
@endsection