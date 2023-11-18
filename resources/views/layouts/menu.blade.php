<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{route('home')}}">Home</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{route('blog')}}">Blog</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{route('about')}}">About</a></li>
                <li><a class="hover:text-gray-200 hover:underline px-4" href="{{ route('contact') }}">Contact</a></li>
            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <a class="" href="#">
                <i class="fab fa-facebook"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-instagram"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-twitter"></i>
            </a>
            <a class="pl-6" href="#">
                <i class="fab fa-linkedin"></i>
            </a>
        </div>
        <div>
            @guest 
                <a class="text-xl text-white" href="{{route('login')}}">Login</a>
            @endguest

            @auth
            <a class="text-xl text-white" href="{{route('admin.dashboard')}}">Dashboard</a>
            @endauth
        </div>
    </div>

</nav>