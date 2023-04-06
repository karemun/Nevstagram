<div>
    {{-- <!-- Funciona como if y foreach, si hay posts, los muestra -->
    @forelse ($posts as $post)
        <h1>{{ $post->titulo }}</h1>
    @empty
        <p>No hay posts</p>
    @endforelse --}}
    @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', [ 'post' => $post, 'user' => $post->user ]) }}">
                    <img src="{{asset('uploads') . '/' . $post->imagen}}" alt="Imagen del post: {{$post->titulo}}">
                </a>
            </div>
        @endforeach
        </div>

        <div class="my-10">
            <!-- Paginacion -->
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center">No hay posts, sigue a alguien para poder mostrar sus posts.</p>
    @endif
</div>