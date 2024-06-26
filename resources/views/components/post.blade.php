@props(['post' => $post])

<div class="mb-4">
    <a href="{{ route('users.posts', $post->user) }}" class="font-bold">{{ $post->user->name }}</a>

    <p class="mb-2">
        <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
    </p>
    <p class="mb-2">
        {{ $post->body }}
    </p>
    <span class="text-gray-600 text-sm">{{ $post->created_at->diffForHumans() }}</span>

    @can('delete', $post)
        <form action="{{ route('posts.destroy', $post) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500">Delete</button>
        </form>
    @endcan

    <div class="flex items-center">

        @auth
            @if (!$post->likedBy(auth()->user()))
                <form action="{{ route('posts.likes', $post) }}" method="POST" class="mr-1">
                    @csrf
                    <button type="submit" class="text-blue-500">Like</button>
                </form>
            @else
                <form action="{{ route('posts.likes', $post->slug) }}" method="POST" class="mr-1">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-blue-500">Unlike</button>
                </form>
            @endif
        @endauth

        <span>{{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
    </div>

</div>
