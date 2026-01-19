@include("layouts.base.public.start")
@include("layouts.base.public.nav")

<!-- Content -->
<main class="container mx-auto mt-8 px-4">
    @yield('content')
</main>

@include("layouts.base.public.footer")
