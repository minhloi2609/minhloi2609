@extends('layouts.client_layout')

@section('content')

<main id="content">
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>
                <a href="#">
                    <img src="src/img/ads/ads_728.jpg" alt="advertisement area">
                </a>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="flex-shrink max-w-full w-full px-3">
                            <div class="w-full py-3 mb-4">
                                <h2 class="text-gray-800 text-3xl font-bold">
                                    <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Kết quả tìm kiếm cho:<b>"{{$keyword}}"</b>
                                </h2>
                            </div>
                        </div>

                        @if($results->isNotEmpty())
                        @foreach($results as $news)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('tin-tuc.detail', $news->id) }}">
                                    <img class="max-w-full w-full mx-auto" src="{{ asset($news->hinhanh) }}" alt="{{ $news->tieude }}">
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('tin-tuc.detail', $news->id) }}">{{ $news->tieude }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($news->tomtat, 100) }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="flex flex-col items-center justify-center w-full">
                            <span class="text-gray-500 text-lg font-semibold">Không có bài viết bạn cần tìm</span>
                            <svg class="w-12 h-12 text-gray-400 mt-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12h3m-3 4h3m-3-8h-3m6 12h-3m0-8H6m6-4H9m-3 4h3m0 4H6m3 4H6m0-8H3m0-4h6m3 4h-3m3 4h3m0-8h6m-6 8h3m-3 4h-3M9 3a9 9 0 11-9 9 9 9 0 019-9z" />
                            </svg>
                            <span class="text-gray-400 mt-2">Thử tìm kiếm với từ khóa khác hoặc kiểm tra lại sau.</span>
                        </div>
                        @endif

                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-white">
                        <div class="mb-6">
                            <div class="p-4 bg-gray-100">
                                <h2 class="text-lg font-bold">Xem Nhiều</h2>
                            </div>
                            <ul class="post-number">
                                @foreach($xemnhieu as $post)
                                <li class="border-b border-gray-100 hover:bg-gray-50">
                                    <a class="text-lg font-bold px-6 py-3 flex flex-row items-center" href="{{ route('tin-tuc.detail', $post->id) }}">
                                        {{ $post->tieude }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="text-sm py-6 sticky">
                        <div class="w-full text-center">
                            <a class="uppercase" href="#"></a>
                            <a href="#">
                                <img class="mx-auto" src="src/img/ads/web-tin-tuc-gioi-thieu.png" alt="advertisement area">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main><!-- end main -->

@endsection