<!DOCTYPE html>
<html>
<body>
    <h1>Testing Backend: Kelola Kategori Berita</h1>
    
    <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
    <hr>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    
    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <h3>Tambah Kategori Baru</h3>
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <label>Nama Kategori:</label>
        <input type="text" name="name" required>
        <button type="submit">Simpan</button>
    </form>

    <hr>

    <h3>Daftar Kategori</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Kategori</th>
            <th>Slug</th>
            <th>Aksi</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>