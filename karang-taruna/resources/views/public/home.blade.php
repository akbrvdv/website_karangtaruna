<!DOCTYPE html>
<html>
<head>
    <title>Beranda Karang Taruna</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <h1>Selamat Datang di Website Karang Taruna</h1>
    
    <nav style="margin-bottom: 20px;">
        <a href="{{ route('aduan.index') }}">Tulis Aduan Warga</a> | 
        <a href="{{ route('login') }}">Login Admin</a>
    </nav>

    <hr>

    <h2>Kabar Terbaru</h2>
    
    @if($posts->isEmpty())
        <p>Belum ada berita yang dipublikasikan.</p>
    @else
        <ul style="list-style-type: none; padding-left: 0;">
            @foreach($posts as $post)
                <li style="margin-bottom: 20px; border: 1px solid #ccc; padding: 15px;">
                    <h3 style="margin-top: 0;">{{ $post->title }}</h3>
                    <small>
                        Kategori: <strong>{{ $post->category->name ?? 'Tanpa Kategori' }}</strong> | 
                        Penulis: {{ $post->user->name ?? 'Admin' }}
                    </small>
                    <p>{{ \Illuminate\Support\Str::limit($post->content, 150) }}</p>
                </li>
            @endforeach
        </ul>
    @endif

</body>
</html>