<div>
    @if ($posts->count())
    <div class="text-center"><h4>Mostrando las ultimas publicaciones</h4></div>
    <div class=" grid md:grid-cols-2 ls:grid-cols-3 xl:grid-cols-4 gap-6 mt-6">
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('posts.show', ['post' => $post, 'user'=>$post->user])}}"><img src="{{ asset('uploads') . '/' . $post->imagen}}" alt="imagen del post {{ $post->titulo}}"></a>
                <p class=" mt-2 font-bold">Perfil: {{ $post->user->username}}</p>
                <p class=" text-sm">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
        </div>
    @else
        <p class="text-center text-gray-600">no hay posts, sigue a alguien para ver sus posts</p>
    @endif
</div>