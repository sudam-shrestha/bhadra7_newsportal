<x-frontend-layout title="{{ $article->title }}" description="{{ $article->meta_description }}" image="{{asset(Storage::url($article->image))}}">
    <section class="py-10">
        <div class="container space-y-8">
            <div class="grid grid-cols-3 gap-8">
                <div class="col-span-2 space-y-4">
                    <div>
                        <span>
                            {{ $article->author->name }}
                        </span>
                        <span>
                            {{ $article->created_at->format('d M, Y') }}
                        </span>
                    </div>
                    <h1 class="text-2xl border-l-4 border-(--primary) pl-2 font-semibold mb-2">
                        {{ $article->title }}
                    </h1>

                    <img src="{{ asset(Storage::url($article->image)) }}" alt="{{ $article->title }}">

                    <div>
                        {!! $article->content !!}
                    </div>
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
    </section>

</x-frontend-layout>
