@extends('layouts.client_layout')

@section('content')
<section class="h-screen">
    <div class="h-full">
        <div class="flex h-full flex-wrap items-center justify-center lg:justify-between">
            <!-- Image -->
            <div class="shrink-1 mb-12 grow-0 basis-auto md:mb-0 md:w-9/12 md:shrink-0 lg:w-6/12 xl:w-6/12">
                <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-full" alt="Sample image" />
            </div>

            <!-- Registration form -->
            <div class="mb-12 md:mb-0 md:w-8/12 lg:w-5/12 xl:w-5/12">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="my-4 flex items-center before:mt-0.5 before:flex-1 before:border-t before:border-neutral-300 after:mt-0.5 after:flex-1 after:border-t after:border-neutral-300">
                        <p class="mx-4 mb-0 text-center font-semibold">Đăng Ký</p>
                    </div>
                    <!-- Role input (hidden) -->
                    <input type="hidden" name="role" value="user">
                    <input type="hidden" name="status" value="1">

                    <!-- Name input -->
                    <div class="relative mb-6">
                        <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tên</label>
                        <input id="name" type="text" class="peer block min-h-[auto] w-full rounded border border-black bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('name') border-red-500 @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="relative mb-6">
                        <label for="email" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email</label>
                        <input id="email" type="email" class="peer block min-h-[auto] w-full rounded border border-black bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Image input -->
                    <div class="relative mb-6">
                        <label for="img" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Ảnh đại diện</label>
                        <input id="img" type="file" class="peer block min-h-[auto] w-full rounded border border-black bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('img') border-red-500 @enderror" name="img" required>
                        @error('img')
                        <span class="invalid-feedback text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Password input -->
                    <div class="relative mb-6">
                        <label for="password" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Mật Khẩu</label>
                        <input id="password" type="password" class="peer block min-h-[auto] w-full rounded border border-black bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback text-red-500 text-sm" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Confirm Password input -->
                    <div class="relative mb-6">
                        <label for="password-confirm" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Xác Nhận Mật Khẩu</label>
                        <input id="password-confirm" type="password" class="peer block min-h-[auto] w-full rounded border border-black bg-transparent px-3 py-2 leading-[2.15] outline-none transition-all duration-200 ease-linear dark:text-white dark:placeholder:text-neutral-300 placeholder-transparent" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <!-- Register button -->
                    <div class="text-center lg:text-left">
                        <button type="submit" class="inline-block w-full rounded bg-black px-7 pb-2 pt-3 text-sm font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2">
                            Đăng Ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection