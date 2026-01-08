<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}'s Profile
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" class="w-32 h-32 rounded-full mx-auto">
                    @endif

                    <div>
                        <p><strong>Username:</strong> {{ $user->name }}</p>
                        <p><strong>Email:</strong> {{ $user->email }}</p>
                        @if($user->birthdate)
                            <p><strong>Birthdate:</strong> {{ $user->birthdate->format('d-m-Y') }}</p>
                        @endif

                        @auth
                            @if(auth()->id() !== $user->id)
                                @if(auth()->user()->isFollowing($user))
                                    <form method="POST" action="{{ route('users.unfollow', $user) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-4 py-2 rounded">
                                            Unfollow
                                        </button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('users.follow', $user) }}">
                                        @csrf
                                        <button class="px-4 py-2 rounded" style='background-color: #4299E1; '>
                                            Follow
                                        </button>
                                    </form>
                                @endif
                            @endif
                        @endauth
                        <p>{{ $user->followers()->count() }} followers</p>
                        <p>{{ $user->following()->count() }} following</p>
                        @if($user->about_me)
                            <p><strong>About me:</strong> {{ $user->about_me }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
