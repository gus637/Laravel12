<!-- nav -->
<nav class="w-full bg-white md:pt-0 px-6 relative border-t border-b border-gray-300">
    <div class="container mx-auto max-w-4xl md:flex justify-between items-center text-sm md:text-md md:justify-start">
        <div class="w-full md:w-3/4 text-center md:text-left py-4 flex flex-wrap justify-center items-stretch md:justify-start md:items-start">
            <a href="{{ route("home") }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Home</a>
            <a href="{{ route("open.projects.index") }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Projects </a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">About Us</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">News</a>
            <a href="#" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline md:border-r border-gray-300">Contact</a>
        </div>
        <div class="w-full md:w-1/4 text-center md:text-right pb-4 md:p-0">
            <input type="search" placeholder="Search..." class="bg-gray-200 border text-sm p-1" />
        </div>
        <div class="w-full md:w-1/4 text-center md:text-right pb-4 md:p-0">
            @auth
                <p class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">{{ Auth::user()->name }}</p>
                <a href="{{route("logout")}}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Logout</a>
            @endauth
            @guest
                <a href="{{ route("login") }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Login</a>
                <a href="{{ route("register") }}" class="px-2 md:pl-0 md:mr-3 md:pr-3 text-gray-700 no-underline">Register</a>
            @endguest
        </div>
    </div>
</nav>
<!-- /nav -->
