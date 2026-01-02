<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('News') }}
        </h2>
    </x-slot>

    <div class="py-6">
        @foreach($articles as $article)
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-2">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div style="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight"><a href="{{ url('/news', $article->id) }}">{{ $article->title }}</a></h2>
                    @if($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="max-width:300px;">
                    @endif
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($article->content), 150) }}...</p>
                    <small>Published: {{ $article->publication_date->format('d-m-Y') }}</small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</x-app-layout>
