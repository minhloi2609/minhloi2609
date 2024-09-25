@extends('layouts.client_layout')

@section('content')
<!-- <script src="https://cdn.tailwindcss.com"></script> -->
<section class="h-screen">
    <div class="h-full">
        <!-- Left column container with background-->
        <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
            <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-full" alt="Sample image" />
            </div>

            <!-- Right column container -->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Separator between social media sign in and email/password sign in -->
                    <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                        <p class="mx-4 mb-0 text-center font-semibold">Đăng Nhập</p>
                    </div>
                    <!-- Display error messages -->
                    @if ($errors->any())
                    <div class="mb-4 text-red-500">
                        @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                        @endforeach
                    </div>
                    @endif
                    <!-- Email input -->
                    <div class="relative mb-6">
                        <!-- <input id="email" type="email" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('email') border-red-500 @enderror" placeholder="Email address" value="{{ old('email') }}" required autocomplete="email" autofocus />
                        @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror -->
                        <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                        <input id="email" type="email" class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('email') border-red-500 @else border-black @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Password input -->
                    <div class="relative mb-6">
                        <!-- <input id="password" type="password" class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('password') border-red-500 @enderror" placeholder="Password" required autocomplete="current-password" />
                        @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror -->
                        <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Mật Khẩu</label>

                        <input id="password" type="password" class="peer block min-h-[auto] w-full rounded border bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('password') border-red-500 @else border-black @enderror" placeholder="Password" required autocomplete="current-password" name="password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-6 flex items-center justify-between">
                        <!-- Remember me checkbox -->
                        <div class="flex items-center">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="inline-block ps-2" for="remember">Remember me</label>
                        </div>

                        <!-- Forgot password link -->
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot password?</a>
                        @endif
                    </div>

                    <!-- Login button -->
                    <div class="text-center lg:text-left">
                        <button type="submit" class="inline-block w-full rounded bg-black px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2">
                            Login
                        </button>
                    </div>

                </form>

                <!-- Register link -->
                <p class="mt-2 pt-1 text-sm font-semibold text-center">
                    Don't have an account? <a href="{{ route('register') }}" class="text-red-600 transition duration-150 ease-in-out hover:text-danger-600 focus:text-danger-600 active:text-danger-700">Register</a>
                </p>
            </div>
        </div>
    </div>
</section>
@endsection