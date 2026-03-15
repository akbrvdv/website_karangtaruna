<!DOCTYPE html>
<html>
<body>
    <h1>Testing Backend: Kelola Berita</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h3>Tambah Berita Baru</h3>
    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul Berita" required><br><br>
        
        <input type="number" name="category_id" placeholder="ID Kategori (Misal: 1)" required><br><br>
        
        <textarea name="content" rows="4" placeholder="Isi konten berita..." required></textarea><br><br>
        
        <label>Upload Gambar:</label>
        <input type="file" name="image"><br><br>
        
        <button type="submit">Simpan Berita</button>
    </form>

    <hr>

    <h3>Daftar Berita Database</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Kategori ID</th>
            <th>Penulis ID</th>
            <th>Aksi</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->category_id }}</td>
            <td>{{ $post->user_id }}</td>
            <td>
                <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus berita ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>