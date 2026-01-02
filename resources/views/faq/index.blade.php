<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">FAQ</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
        @foreach($categories as $category)
            <div>
                <h3 class="font-bold text-lg">{{ $category->name }}</h3>

                <div class="space-y-2">
                    @foreach($category->faqs as $faq)
                        <div class="bg-white shadow-sm rounded p-4 mb-2">
                            <p class="font-semibold">{{ $faq->question }}</p>
                            <div class="text-gray-700">{!! $faq->answer !!}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>