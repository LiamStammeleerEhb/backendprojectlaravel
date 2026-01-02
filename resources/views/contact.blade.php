<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Contact
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(session('success'))
                        <div class="mb-4 text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="/contact" class="space-y-4">
                        @csrf

                        <div>
                            <label>Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', auth()->user()?->email) }}"
                                class="w-full border rounded p-2"
                                required
                            >
                        </div>

                        <div>
                            <label>Message</label>
                            <textarea
                                name="message"
                                rows="5"
                                class="w-full border rounded p-2"
                                required
                            >{{ old('message') }}</textarea>
                        </div>

                        <button class="px-4 py-2 rounded">
                            Send
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6 max-w-2xl mx-auto">
       
    </div>
</x-app-layout>