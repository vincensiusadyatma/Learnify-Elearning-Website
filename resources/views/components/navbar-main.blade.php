<nav id="navbar" class="px-4 py-4 flex justify-between items-center bg-transparent top-0 left-0 fixed w-full z-30">
    <div class="flex items-center space-x-4">
        <a class="text-3xl font-bold leading-none" href="#">
            <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="Learnify Logo" class="w-[30px] lg:mr-4">
        </a>
        <h1 class="text-xl font-bold text-white">Learnify</h1>
    </div>
    <div class="lg:hidden">
        <button id="navbarToggle" aria-expanded="false" class="navbar-burger flex items-center text-white shadow-2xl p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:items-center lg:w-auto lg:space-x-6">
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#">Home</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#tentang">Tentang Kami</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#manfaat">Manfaat</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#fitur">Alur Belajar</a></li>
        <li><a class="text-sm text-white hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#faq">FAQ</a></li>
    </ul>
    @guest
        <a id="openModalButton" href="#" class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold rounded-xl transition duration-200">Sign In</a>
        <!-- Modal Pop-up -->
        <div id="loginModal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="bg-white sm:px-6 lg:w-[498px] rounded-[10px]">
                        <div class="flex justify-between items-end mt-12 sm:mx-auto sm:w-full sm:max-w-sm">
                            <h2 class="text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in</h2>
                            <button id="closeModalButton" class="text-end">X</button>
                        </div>
                        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                            <form class="space-y-6" action="{{ route('handle-login') }}" method="POST">
                                @csrf
                                <div>
                                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900 text-start">Username atau email</label>
                                    <div class="mt-2">
                                        <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div>
                                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                                    <div class="mt-2">
                                        <input id="password" name="password" type="password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                    <div class="text-sm text-end">
                                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
                                </div>
                                <div class="border border-black"></div>
                                <div>
                                    <button class="mb-10">
                                        <img src="https://placehold.co/50x50" alt="">
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('show-register') }}" class="hidden lg:inline-block py-2 px-6 bg-blue-500 hover:bg-blue-600 text-sm text-white font-bold rounded-xl transition duration-200">Sign Up</a>
    @else
        <img src="img/assets/profile.png" id="avatarButton" aria-haspopup="true" aria-expanded="false" class="w-10 h-10 rounded-full cursor-pointer" alt="User dropdown">
        <!-- Dropdown menu -->
        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
            <div class="px-4 py-3 text-sm text-gray-900">
                <div>{{ auth()->user()->username ?? 'User' }}</div>
                <div class="font-medium truncate">{{ auth()->user()->email ?? 'User' }}</div>
            </div>
            <ul class="py-2 text-sm text-gray-700" aria-labelledby="avatarButton">
                <li><a href="{{ route('show-dashboard') }}" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a></li>
                <li><a href="/admin/dashboard" class="block px-4 py-2 hover:bg-gray-100">Admin Dashboard</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a></li>
                <li><a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a></li>
            </ul>
            <div class="py-1">
                <a href="" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
            </div>
        </div>
    @endguest
</nav>

<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 right-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-l overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-4" href="#">
                <img src="{{ asset('img/logo/learnify-logo.png') }}" alt="Learnify Logo" class="w-[30px] lg:mr-4">
            </a>
            <h1 class="text-xl font-bold text-black">Learnify</h1>
            <button class="navbar-close ml-auto">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <ul>
            <li><a class="text-black hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#">Home</a></li>
            <li><a class="text-black hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#tentang">Tentang Kami</a></li>
            <li><a class="text-black hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#manfaat">Manfaat</a></li>
            <li><a class="text-black hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#fitur">Alur Belajar</a></li>
            <li><a class="text-black hover:bg-blue-900 p-3 hover:rounded-lg drop-shadow-2xl" href="#faq">FAQ</a></li>
        </ul>
    </nav>
</div>
