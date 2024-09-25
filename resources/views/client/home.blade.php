@extends('layouts.client_layout')

@section('content')

<!-- =========={ MAIN }==========  -->
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

    <!-- hero big grid -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <!-- big grid 1 -->
            <div class="flex flex-row flex-wrap">
                <!--Start left cover-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2 pb-1 lg:pb-0 lg:pr-1">
                    <div class="relative hover-img max-h-98 overflow-hidden">
                        <a href="{{ route('tin-tuc.detail', ['id' => $firstTin->id]) }}">
                            <img class="max-w-full w-full mx-auto h-auto" src="{{ asset($firstTin->tintuc_hinhanh) }}" alt="Image description">
                        </a>
                        <div class="absolute px-5 pt-8 pb-5 bottom-0 w-full bg-gradient-cover">
                            <a href="{{ route('tin-tuc.detail', ['id' => $firstTin->id]) }}">
                                <h2 class="text-3xl font-bold capitalize text-white mb-3">{{ $firstTin->tieude }}</h2>
                            </a>
                            <p class="text-gray-100 hidden sm:inline-block">{{ $firstTin->tomtat }}</p>
                            <div class="pt-2">
                                <div class="text-gray-100">
                                    <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>{{ $firstTin->tenloaitin }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Start box news-->
                <div class="flex-shrink max-w-full w-full lg:w-1/2">
                    <div class="box-one flex flex-row flex-wrap">
                        @foreach($nextFourTin as $tin)
                        <article class="flex-shrink max-w-full w-full sm:w-1/2">
                            <div class="relative hover-img max-h-48 overflow-hidden">
                                <a href="{{ route('tin-tuc.detail', ['id' => $tin->id]) }}">
                                    <img class="max-w-full w-full mx-auto h-auto" src="{{ asset($tin->tintuc_hinhanh) }}" alt="Image description">
                                </a>
                                <div class="absolute px-4 pt-7 pb-4 bottom-0 w-full bg-gradient-cover">
                                    <a href="{{ route('tin-tuc.detail', ['id' => $tin->id]) }}">
                                        <h2 class="text-lg font-bold capitalize leading-tight text-white mb-1">{{ $tin->tieude }}</h2>
                                    </a>
                                    <div class="pt-1">
                                        <div class="text-gray-100">
                                            <div class="inline-block h-3 border-l-2 border-red-600 mr-2"></div>{{ $tin->tenloaitin }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-white">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <!-- Left -->
                <div class="flex-shrink max-w-full w-full lg:w-2/3 overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Tin tức mới nhất:
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach($NewsTin as $news)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ route('tin-tuc.detail', ['id' => $news->id]) }}"> <!-- Sử dụng route cho chi tiết tin tức -->
                                    <!-- <img class="max-w-full w-full mx-auto" src="{{ asset($news->tintuc_hinhanh) }}" alt="{{ $news->tieude }}"> -->
                                    <div class="relative w-full h-44 overflow-hidden">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset($news->tintuc_hinhanh) }}" alt="{{ $tin->tieude }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ route('tin-tuc.detail', ['id' => $news->id]) }}">{{ $news->tieude }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($news->tomtat, 100) }}</p>
                                    <a class="text-gray-500" href="{{ route('loai-tin.showByCategory', ['id' => $news->loai_tin_id]) }}">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $news->tenloaitin }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                <!-- right -->
                <div class="flex-shrink max-w-full w-full lg:w-1/3 lg:pl-8 lg:pt-14 lg:pb-8 order-first lg:order-last">
                    <div class="w-full bg-gray-50 h-full">
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
    </div>

    <!-- slider news -->
    <div class="relative bg-gray-50" style="background-image: url('src/img/bg.jpg');background-size: cover;background-position: center center;background-attachment: fixed">
        <div class="bg-black bg-opacity-70">
            <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                <div class="flex flex-row flex-wrap">
                    <div class="flex-shrink max-w-full w-full py-12 overflow-hidden">
                        <div class="w-full py-3">
                            <h2 class="text-white text-2xl font-bold text-shadow-black">
                                <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Tin tức nổi bật:
                            </h2>
                        </div>

                        <div id="post-carousel" class="splide post-carousel">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($manyViews as $news)
                                    <li class="splide__slide">
                                        <div class="w-full pb-3">
                                            <div class="hover-img bg-white">
                                                <a href="{{ route('tin-tuc.detail', ['id' => $news->id]) }}">
                                                    <div class="relative w-full h-60 overflow-hidden">
                                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset($news->tintuc_hinhanh) }}" alt="{{ $news->tieude }}">
                                                    </div>
                                                </a>
                                                <div class="py-3 px-6">
                                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                                        <a href="{{ route('tin-tuc.detail', ['id' => $news->id]) }}">{{ $news->tieude }}</a>
                                                    </h3>
                                                    <a class="text-gray-500" href="{{ route('loai-tin.showByCategory', ['id' => $news->loai_tin_id]) }}">
                                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>{{ $news->tenloaitin }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-white py-6">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex flex-row flex-wrap">
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3">
                        <h2 class="text-gray-800 text-2xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span>Tổng Hợp
                        </h2>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        @foreach($tinNgauNhien as $tin)
                        <div class="flex-shrink max-w-full w-full sm:w-1/3 lg:w-1/4 px-3 pb-3 pt-3 sm:pt-0 border-b-2 sm:border-b-0 border-dotted border-gray-100">
                            <div class="flex flex-row sm:block hover-img">
                                <a href="{{ url('/tin-tuc/' . $tin->id) }}">
                                    <div class="relative w-full h-52 overflow-hidden">
                                        <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset($tin->tintuc_hinhanh) }}" alt="{{ $tin->tieude }}">
                                    </div>
                                </a>
                                <div class="py-0 sm:py-3 pl-3 sm:pl-0">
                                    <h3 class="text-lg font-bold leading-tight mb-2">
                                        <a href="{{ url('/tin-tuc/' . $tin->id) }}">{{ $tin->tieude }}</a>
                                    </h3>
                                    <p class="hidden md:block text-gray-600 leading-tight mb-1">{{ Str::limit($tin->tomtat, 100) }}</p>
                                    <a class="text-gray-500" href="{{ url('/loai-tin/' . $tin->id) }}">
                                        <span class="inline-block h-3 border-l-2 border-red-600 mr-2"></span>
                                        {{ $tin->tenloaitin }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- end main -->
@endsection