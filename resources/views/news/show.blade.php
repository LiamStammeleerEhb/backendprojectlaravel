<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $article->title }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <p class="text-gray-500 text-sm">
                    Published: {{ $article->publication_date->format('d-m-Y') }}
                </p>
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="mb-4" style="max-width:600px;">
                @endif

                <div class="text-gray-900 mt-4">
                    {!! $article->content !!}
                </div>

                <a href="{{ url('/news') }}" class="text-blue-500 hover:underline mt-4 inline-block">
                    &larr; Back to all news
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
