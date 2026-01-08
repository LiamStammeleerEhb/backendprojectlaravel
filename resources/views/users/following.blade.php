<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            People You Follow
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($following->isEmpty())
                        <p>You are not following anyone yet.</p>
                    @endif

                    @foreach($following as $user)
                        <div class="flex items-center gap-4 p-3 rounded">
                            @if($user->profile_picture)
                                <img
                                    src="{{ asset('storage/' . $user->profile_picture) }}"
                                    class="rounded-full" style="width:32px; height:32px;"
                                >
                            @endif

                            <div class="flex-1">
                                <a href="{{ route('users.show', $user) }}"
                                class="font-medium text-blue-600">
                                    {{ $user->name }}
                                </a>

                                @if($user->about_me)
                                    <p class="text-sm text-gray-600">
                                        {{ \Illuminate\Support\Str::limit($user->about_me, 80) }}
                                    </p>
                                @endif
                            </div>

                            <form method="POST" action="{{ route('users.unfollow', $user) }}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 text-sm">
                                    Unfollow
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
