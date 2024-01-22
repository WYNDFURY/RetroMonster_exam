<div class="container mx-auto flex justify-between pt-4 pb-12">
    <main class="md:w-3/4 p-4">
        @yield('content')
    </main>

    <!-- Sidebar -->
    @include('templates.partials._aside')
</div>
