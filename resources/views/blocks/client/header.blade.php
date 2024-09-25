<header class="fixed top-0 left-0 right-0 z-50">
    <nav class="bg-black">
        <div class="xl:container mx-auto px-3 sm:px-4 xl:px-2">
            <div class="flex justify-between">
                <div class="mx-w-10 text-2xl font-bold capitalize text-white flex items-center">THỂ THAO 24h</div>

                <div class="flex flex-row">
                    <!-- nav menu -->
                    <ul class="navbar hidden lg:flex lg:flex-row text-gray-400 text-sm items-center font-bold">
                        <li class="relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent" href="/">Trang Chủ</a>
                        </li>
                        <li class="dropdown relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent" href="#">Danh Mục Tin Tức</a>

                            <ul class="dropdown-menu font-normal absolute left-0 right-auto top-full z-50 border-b-0 text-left bg-white text-gray-700 border border-gray-100" style="min-width: 12rem;">
                                @foreach($loaiTin as $loai)
                                <li class="relative hover:bg-gray-50"><a class="block py-2 px-6 border-b border-gray-100" href="{{ route('loai-tin.showByCategory', ['id' => $loai->id]) }}">{{ $loai->tenloaitin }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent" href="{{ route('contact') }}">Liên hệ</a>
                        </li>
                        @guest
                        @if (Route::has('login'))
                        <li class="relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent hover:border-gray-300" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="relative border-l border-gray-800 hover:bg-gray-900">
                            <a class="block py-3 px-6 border-b-2 border-transparent hover:border-gray-300" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="relative">
                            <a id="navbarDropdown" class="block py-3 px-6 border-b-2 border-transparent relative border-l border-gray-800 hover:bg-gray-900 cursor-pointer flex items-center space-x-2">
                                <!-- Avatar -->
                                <img src="{{ asset(Auth::user()->img) }}" alt="User Avatar" class="w-8 h-8 rounded-full border border-gray-300">
                                <!-- User Name -->
                                <span>{{ Auth::user()->name }}</span>
                            </a>
                            <div class="absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-md shadow-lg z-50 hidden" id="dropdown-menu">
                                @if(Auth::check() && Auth::user()->role === 'admin')
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('admin.home') }}" target="_blank">Trang Quản trị</a>
                                @endif

                                <hr>
                                <a class="block px-4 py-2 text-gray-700 hover:bg-gray-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                    <script>
                        document.getElementById('navbarDropdown').addEventListener('click', function() {
                            const menu = document.getElementById('dropdown-menu');
                            menu.classList.toggle('hidden');
                        });
                    </script>
                    <!-- search form & mobile nav -->
                    <div class="flex flex-row items-center text-gray-300">
                        <div class="search-dropdown relative border-r lg:border-l border-gray-800 hover:bg-gray-900">
                            <button class="block py-3 px-6 border-b-2 border-transparent">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="open bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="close bi bi-x-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z" />
                                    <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z" />
                                </svg>
                            </button>

                            <div class="dropdown-menu absolute left-auto right-0 top-full z-50 text-left bg-white text-gray-700 border border-gray-100 mt-1 p-3" style="min-width: 15rem;">
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="flex flex-wrap items-stretch w-full relative">
                                        <input type="text" class="flex-shrink flex-grow max-w-full leading-5 w-px flex-1 relative py-2 px-5 text-gray-800 bg-white border border-gray-300 overflow-x-auto focus:outline-none focus:border-gray-400 focus:ring-0 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-700 dark:focus:border-gray-600" name="text" placeholder="Search..." aria-label="search">
                                        <div class="flex -mr-px">
                                            <button class="flex items-center py-2 px-5 -ml-1 leading-5 text-gray-100 bg-black hover:text-white hover:bg-gray-900 hover:ring-0 focus:outline-none focus:ring-0" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="relative hover:bg-gray-800 block lg:hidden">
                            <button type="button" class="menu-mobile block py-3 px-6 border-b-2 border-transparent">
                                <span class="sr-only">Mobile menu</span>
                                <svg class="inline-block h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                                    </path>
                                </svg> Menu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header><!-- end header -->