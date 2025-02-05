@extends('layouts.client_layout')

@section('content')
<main id="content">
    <!-- advertisement -->
    <div class="bg-gray-50 py-4 hidden">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="mx-auto table text-center text-sm">
                <a class="uppercase" href="#">Advertisement</a>

            </div>
        </div>
    </div>

    <!-- block news -->
    <div class="bg-gray-50 py-6">
        <div class="xl:container mx-auto px-6 sm:px-8 xl:px-10">
            <div class="flex flex-row flex-wrap">
                <!-- full -->
                <div class="flex-shrink max-w-full w-full overflow-hidden">
                    <div class="w-full py-3 mb-3">
                        <h2 class="text-gray-800 text-3xl font-bold">
                            <span class="inline-block h-5 border-l-3 border-red-600 mr-2"></span> {{ $result->tieude }}
                        </h2>
                    </div>
                    <div class="w-full py-3 mb-3">
                        <h5 class="text-gray-800 text-1xl font-bold">
                            <span class="inline-block h-5 border-l-3 mr-2"></span> {{ $result->tomtat }}
                        </h5>
                    </div>
                    <div class="flex flex-row flex-wrap -mx-3">
                        <div class="max-w-full w-full px-4">
                            <!-- Post content -->
                            <div class="leading-relaxed pb-4">
                                <div class="bg-gray-50 py-6">
                                    <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
                                        <div class="flex flex-row flex-wrap">
                                            <!-- Left -->
                                            <div class="flex-shrink max-w-full w-full lg:w-2/3  overflow-hidden">
                                                {!! html_entity_decode($result->noidung) !!}
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative flex flex-row items-center justify-between overflow-hidden bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20 mt-12 mb-2 px-6 py-2">
                                    <div class="my-4 text-sm">
                                        <!--author-->
                                        <span class="mr-2 md:mr-4">
                                            <!-- <i class="fas fa-user me-2"></i> -->
                                            <svg class="bi bi-person mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"></path>
                                            </svg> Đăng bởi <a class="font-semibold" href="#">{{$result->user_name}}</a>
                                        </span>
                                        <!--date-->
                                        <time class="mr-2 md:mr-4" datetime="2020-10-22 10:00">
                                            <!-- <i class="fas fa-calendar me-2"></i> -->
                                            <svg class="bi bi-calendar mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M14 0H2a2 2 0 00-2 2v12a2 2 0 002 2h12a2 2 0 002-2V2a2 2 0 00-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" clip-rule="evenodd"></path>
                                                <path fill-rule="evenodd" d="M6.5 7a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm-9 3a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2zm3 0a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                                            </svg> {{ \Carbon\Carbon::parse($result->ngaydang)->format('d/m/Y') }}
                                        </time>
                                        <!--view-->
                                        <span class="mr-2 md:mr-4">
                                            <!-- <i class="fas fa-eye me-2"></i> -->
                                            <svg class="bi bi-eye mr-2 inline-block" width="1rem" height="1rem" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 001.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0014.828 8a13.133 13.133 0 00-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 001.172 8z" clip-rule="evenodd"></path>
                                                <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z" clip-rule="evenodd"></path>
                                            </svg> {{$result->luot_xem}} view
                                        </span>
                                        <!--end view-->
                                    </div>
                                    <div class="hidden lg:block">
                                        <ul class="space-x-3">
                                            <!--facebook-->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-red-700" href="#" title="Share to Facebook">
                                                    <!-- <i class="fab fa-facebook fa-2x"></i> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!--twitter-->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-red-700" href="#" title="Share to Twitter">
                                                    <!-- <i class="fab fa-twitter fa-2x"></i> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z"></path>
                                                    </svg>
                                                </a>
                                            </li>
                                            <!--instagram-->
                                            <li class="inline-block">
                                                <a target="_blank" class="hover:text-red-700" href="#" title="Share to Instagram">
                                                    <!-- <i class="fab fa-instagram fa-2x"></i> -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 512 512">
                                                        <path fill="currentColor" d="M349.33,69.33a93.62,93.62,0,0,1,93.34,93.34V349.33a93.62,93.62,0,0,1-93.34,93.34H162.67a93.62,93.62,0,0,1-93.34-93.34V162.67a93.62,93.62,0,0,1,93.34-93.34H349.33m0-37.33H162.67C90.8,32,32,90.8,32,162.67V349.33C32,421.2,90.8,480,162.67,480H349.33C421.2,480,480,421.2,480,349.33V162.67C480,90.8,421.2,32,349.33,32Z"></path>
                                                        <path fill="currentColor" d="M377.33,162.67a28,28,0,1,1,28-28A27.94,27.94,0,0,1,377.33,162.67Z"></path>
                                                        <path fill="currentColor" d="M256,181.33A74.67,74.67,0,1,1,181.33,256,74.75,74.75,0,0,1,256,181.33M256,144A112,112,0,1,0,368,256,112,112,0,0,0,256,144Z"></path>
                                                    </svg>
                                                </a>
                                            </li><!--end instagram-->
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Comments -->
                            <div id="comments" class="pt-16">
                                <!--title-->
                                <h3 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">Bình Luận</h3>

                                <!--comment list-->
                                <ol class="mb-4">
                                    @if($comments->isEmpty())
                                    <p>Chưa có bình luận nào.</p>
                                    @else
                                    <ul id="comments-list">
                                        @foreach($comments->take(3) as $comment)
                                        <li class="py-2 mt-6">
                                            <div class="pb-4 border-b border-gray-200 dark:border-gray-600 border-dashed">
                                                <footer class="flex items-center space-x-4">
                                                    <div class="w-20 h-20 rounded-full bg-gray-200 border border-gray-300 overflow-hidden">
                                                        <img class="w-full h-full object-cover" src="{{ asset($comment->user_img) }}" alt="avatar">
                                                    </div>
                                                    <div class="flex flex-col w-full">
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">{{ $comment->user_name }}</span>
                                                            <span class="text-sm">
                                                                <time datetime="{{ $comment->ngaybinhluan }}">{{ \Carbon\Carbon::parse($comment->ngaybinhluan)->format('d/m/Y') }}</time>
                                                            </span>
                                                        </div>
                                                        <div class="mt-2">
                                                            <p>{{ $comment->noidung }}</p>
                                                        </div>
                                                    </div>
                                                </footer>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- Nút xem thêm -->
                                    <button id="load-more" data-page="1" data-id-tintuc="{{ $result->id }}" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Xem thêm</button>
                                    <script>
                                        document.getElementById('load-more').addEventListener('click', function() {
                                            var button = this;
                                            var page = button.getAttribute('data-page');
                                            var id_tintuc = button.getAttribute('data-id-tintuc'); // Lấy ID của tin tức từ thuộc tính data

                                            var url = `/comments?page=${page}&id_tintuc=${id_tintuc}`; // Cập nhật đường dẫn API

                                            fetch(url)
                                                .then(response => {
                                                    if (!response.ok) {
                                                        throw new Error('Network response was not ok');
                                                    }
                                                    return response.json();
                                                })
                                                .then(data => {
                                                    if (data.error) {
                                                        console.error(data.error);
                                                        return;
                                                    }

                                                    var commentsList = document.getElementById('comments-list');
                                                    var newComments = '';
                                                    var baseUrl = window.location.origin; // Lấy URL gốc của trang

                                                    data.comments.forEach(comment => {
                                                        var imageUrl = baseUrl + '/' + comment.user_img; // Tạo URL đầy đủ cho hình ảnh
                                                        newComments += `
                    <li class="py-2 mt-6">
                        <div class="pb-4 border-b border-gray-200 dark:border-gray-600 border-dashed">
                            <footer class="flex items-center space-x-4">
                                <div class="w-20 h-20 rounded-full bg-gray-200 border border-gray-300 overflow-hidden">
                                    <img class="w-full h-full object-cover" src="${imageUrl}" alt="avatar">
                                </div>
                                <div class="flex flex-col w-full">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">${comment.user_name}</span>
                                        <span class="text-sm">
                                            <time datetime="${comment.ngaybinhluan}">${new Date(comment.ngaybinhluan).toLocaleDateString('en-GB')}</time>
                                        </span>
                                    </div>
                                    <div class="mt-2">
                                        <p>${comment.noidung}</p>
                                    </div>
                                </div>
                            </footer>
                        </div>
                    </li>
                `;
                                                    });

                                                    commentsList.insertAdjacentHTML('beforeend', newComments);

                                                    if (!data.hasMore) {
                                                        button.style.display = 'none';
                                                    } else {
                                                        button.setAttribute('data-page', parseInt(page) + 1);
                                                    }
                                                })
                                                .catch(error => console.error('Error:', error));
                                        });
                                    </script>

                                    @endif
                                </ol>
                                <!--comment form-->
                                <div id="comment-form" class="mt-12">
                                    <h4 class="text-2xl leading-normal mb-2 font-semibold text-gray-800 dark:text-gray-100">ĐỂ LẠI BÌNH LUẬN NGAY</h4>
                                    @auth
                                    <!-- Nếu người dùng đã đăng nhập -->
                                    <form action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <div class="mt-2"></div>
                                        <div class="mb-6">
                                            <textarea class="w-full leading-5 relative py-3 px-5 text-gray-800 bg-white border border-gray-100 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" placeholder="Comment" aria-label="insert comment" rows="4" name="noidung" required></textarea>
                                        </div>
                                        <input type="hidden" name="trangthai" value="1">
                                        <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                        <input type="hidden" name="id_tintuc" value="{{ $result->id }}">
                                        <div class="mb-6">
                                            <button type="submit" class="flex items-center py-3 px-5 leading-5 text-gray-100 bg-black hover:text-white hover:bg-gray-900 hover:ring-0 focus:outline-none focus:ring-0">Gửi bình luận</button>
                                        </div>
                                    </form>
                                    @else
                                    <!-- Nếu người dùng chưa đăng nhập -->
                                    <p class="text-gray-800 dark:text-gray-100">Vui lòng <a href="{{ route('login') }}" class="text-blue-500 hover:underline">đăng nhập</a> để bình luận.</p>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- end main -->


@endsection