<x-frontend-layout>


    {{$categories}}

    <section>
        <div class="container py-10">
            <a href="" class="block shadow-md p-5 rounded-2xl">
                <h1 class="text-3xl font-semibold mb-2">{{ $latest_article->title }}</h1>
                <img class="w-full" src="{{ asset(Storage::url($latest_article->image)) }}"
                    alt="{{ $latest_article->title }}">
            </a>
        </div>
    </section>

</x-frontend-layout>
