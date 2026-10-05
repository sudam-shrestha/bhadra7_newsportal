@php
    $limit_categories = $categories->take(6);
    $remaining_categories = $categories->skip(6);
@endphp

<header class="sticky top-0 bg-white z-20">
    <div class="py-2 container flex justify-between items-center">
        <a href="{{ route('home') }}">
            <img class="h-[40px] md:h-[80px]" src="{{ asset('frontend/images/logo.png') }}" alt="Jawaaf Logo">
        </a>

        <div>
            <span class="text-sm md:text-xl" id="date"></span>
            <img class="h-[10px] md:h-[20px]" src="{{ asset('frontend/images/line.png') }}" alt="Line">
        </div>
    </div>

    <nav class="bg-(--primary) text-white py-4 text-xl">
        <div class="container hidden md:flex justify-between items-center">
            <div class="space-x-6">
                <a href="{{ route('home') }}"
                    class="{{ Request::routeIs('home') ? 'text-(--secondary)' : '' }}">Home</a>

                @foreach ($limit_categories as $category)
                    <a href="{{ route('category', $category->slug) }}"
                        class="{{ request()->routeIs('category') && request()->route('slug') == $category->slug ? 'text-(--secondary)' : '' }}">{{ $category->title }}</a>
                @endforeach
                @if (count($remaining_categories) > 0)
                    <button id="nav_dropdown" data-dropdown-toggle="dropdown"
                        class="inline-flex gap-2 cursor-pointer items-center" type="button">
                        more
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 9-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                        <ul class="p-2 text-sm text-body font-medium" aria-labelledby="nav_dropdown">
                            @foreach ($remaining_categories as $cat)
                                <li>
                                    <a href="{{ route('category', $cat->slug) }}"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">{{ $cat->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <form action="{{ route('search') }}" method="get" class="relative text-base">
                <input type="text" name="q" id="q"
                    class="bg-white text-(--text) py-2 px-4 rounded-full" placeholder="search article">
                <button type="submit" class="absolute right-0 top-1/2 -translate-1/2 text-(--primary)"><i
                        class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>

        <div class="container text-right text-2xl md:hidden">
            <button type="button" data-drawer-target="nav-drawer" data-drawer-show="nav-drawer"
                aria-controls="nav-drawer">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
    </nav>
</header>


<!-- drawer component -->
<div id="nav-drawer"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-neutral-primary-soft w-96 border-e border-default"
    tabindex="-1" aria-labelledby="drawer-label">
    <div class="border-b border-default pb-4 mb-5 flex items-center">
        <h5 id="drawer-label" class="inline-flex items-center text-lg font-medium text-body">
            <svg class="w-5 h-5 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            Menu
        </h5>
        <button type="button" data-drawer-hide="nav-drawer" aria-controls="nav-drawer"
            class="text-body bg-transparent hover:text-heading hover:bg-neutral-tertiary rounded-base w-9 h-9 absolute top-2.5 end-2.5 flex items-center justify-center">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
    </div>
    <div class="flex flex-col gap-6 text-xl">
        <a href="">Home</a>
        <a href="">समाचार</a>
        <a href="">मनोरञ्जन</a>
        <a href="">खेलकुद</a>
        <a href="">विचार</a>
        <a href="">शिक्षा</a>
        <a href="">स्वास्थ्य</a>
        <a href="">अर्थतन्त्र</a>
    </div>
</div>
