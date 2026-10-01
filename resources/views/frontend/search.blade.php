<x-frontend-layout>
    <section class="py-10">
        <div class="container space-y-8">
            <div>
                <h1 class="text-2xl border-l-4 border-(--primary) pl-2 font-semibold mb-2">Result for "{{ $query }}"
                </h1>

                <div class="grid grid-cols-3 gap-8">
                    <div class="col-span-2 space-y-4">
                        @foreach ($articles as $article)
                            <a href="{{ route('article', $article->slug) }}"
                                class="shadow grid grid-cols-3 gap-4 items-center">
                                <img class="h-[300px] w-full object-cover"
                                    src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">
                                <div class="p-3 col-span-2 space-y-2">
                                    <h3 class="text-xl font-semibold line-clamp-2">{{ $article->title }}</h3>
                                    <div class="line-clamp-4">
                                        {!! $article->content !!}
                                    </div>
                                    <span>
                                        {{ $article->created_at->format('d M, Y') }}
                                    </span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <aside class="space-y-6">
                        @foreach ($advertises as $ads)
                            <a class="block" href="{{ $ads->redirect_link }}" target="_blank">
                                <img src="{{ asset(Storage::url($ads->banner)) }}" alt="{{ $ads->company_name }}">
                            </a>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </section>

</x-frontend-layout>
