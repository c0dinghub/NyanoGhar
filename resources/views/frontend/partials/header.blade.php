<header class="bg-white shadow-md">
    <!-- Header Top (Static) -->
    <div class="bg-gray-900 text-white py-2">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Contact Info -->
            <ul class="flex space-x-6 text-sm">
                <li class="flex items-center">
                    <ion-icon name="mail-outline" class="mr-1 text-lg"></ion-icon>
                    <a href="mailto:info@nyanoghar.com" class="hover:text-orange-400 italic">info@nyanoghar.com</a>
                </li>
                <li class="flex items-center">
                    <ion-icon name="location-outline" class="mr-1 text-lg"></ion-icon>
                    <address class="italic">Nepalgunj, Banke, Nepal</address>
                </li>
            </ul>

            <!-- Social Media Icons & Add Property Button -->
            <div class="flex space-x-4 items-center">
                <ul class="flex space-x-4">
                    <li><a href="" class="hover:text-orange-400"><ion-icon name="logo-facebook"></ion-icon></a></li>
                    <li><a href="" class="hover:text-orange-400"><ion-icon name="logo-twitter"></ion-icon></a></li>
                    <li><a href="" class="hover:text-orange-400"><ion-icon name="logo-instagram"></ion-icon></a></li>
                    <li><a href="" class="hover:text-orange-400"><ion-icon name="logo-pinterest"></ion-icon></a></li>
                </ul>
                <a href="{{ route('addProperty') }}" class="bg-orange-500 text-white font-semibold px-4 py-2 hover:bg-orange-600">
                    Add Property
                </a>
            </div>
        </div>
    </div>

    <!-- Sticky Navbar (Header Bottom) -->
    <div class="bg-white shadow-md "> <!-- Ensure sticky is applied here -->
        <div class="container mx-auto py-1 px-2 flex justify-between items-center">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold text-gray-800">
                <img src="{{ asset('assets/frontend/images/logoimg.jpg') }}" alt="nyanoghar logo" class="w-40">
            </a>

            <!-- Navbar Links -->
            <nav class="hidden w-1/2 md:flex font-semibold justify-evenly">
                <a href="/" class="flex text-gray-800 hover:text-orange-500 items-center gap-1"><ion-icon name="home-outline" class="text-lg"></ion-icon>Home</a>
                <a href="{{ route('searchPage') }}" class="flex text-gray-800 hover:text-orange-500 items-center gap-1"><ion-icon name="business-outline" class="text-lg"></ion-icon>Property</a>
                <a href="#blog" class="text-gray-800 hover:text-orange-500 flex items-center gap-1"><ion-icon name="book-outline" class="text-lg"></ion-icon>Blog</a>
                <a href="#service" class="text-gray-800 hover:text-orange-500 flex items-center gap-1"><ion-icon name="call-outline" class="text-lg"></ion-icon>Customer Care</a>
                <a href="#about" class="flex text-gray-800 hover:text-orange-500 items-center gap-1"><ion-icon name="information-circle-outline" class="text-lg"></ion-icon>About Us</a>
            </nav>

            <!-- Mobile Menu & Profile Dropdown -->
            <div class="flex space-x-4 items-center">
                @auth
                    <div class="relative group p-1 rounded-full">
                        <button class="bg-gray-200 p-2 rounded-full focus:outline-none  active:bg-orange-500  flex items-center text-gray-800 hover:text-white hover:bg-orange-500 transition ease-in duration-150">
                            <ion-icon name="person"></ion-icon>
                        </button>
                        <div class="hidden group-hover:block absolute -right-9 top-[40px] z-10 w-32 bg-white shadow-md rounded-lg ">
                            <a href="{{ route('userProfile') }}" class="block px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">My Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-800 hover:bg-gray-100">Log Out</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="hidden md:flex items-center text-gray-900 font-semibold hover:text-orange-500">
                        <ion-icon name="log-in-outline" class="mr-1 font-bold text-lg"></ion-icon>Login
                    </a>
                @endguest

                <!-- Mobile Menu Button -->
                <button class="md:hidden focus:outline-none text-gray-700" aria-label="Open Menu" data-nav-open-btn>
                    <ion-icon name="menu-outline"></ion-icon>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Visible on small screens) -->
    <nav class="md:hidden bg-white shadow-md" data-navbar>
        <ul class="p-4 space-y-4">
            <li><a href="/" class="text-gray-700 hover:text-blue-600">Home</a></li>
            <li><a href="#about" class="text-gray-700 hover:text-blue-600">About</a></li>
            <li><a href="#service" class="text-gray-700 hover:text-blue-600">Service</a></li>
            <li><a href="{{ route('searchPage') }}" class="text-gray-700 hover:text-blue-600">Property</a></li>
            <li><a href="#blog" class="text-gray-700 hover:text-blue-600">Blog</a></li>

            @guest
                <li><a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600">Login</a></li>
            @endguest

            @auth
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left text-gray-700 hover:text-red-600">Log Out</button>
                    </form>
                </li>
            @endauth
        </ul>
    </nav>
</header>
