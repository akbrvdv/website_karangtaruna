<!DOCTYPE html>
<html>
<body>
    <h1>Testing Backend: Kelola Susunan Pengurus</h1>
    
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

    <h3>Tambah Pengurus Baru</h3>
    <form action="{{ route('admin.committees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Nama Lengkap:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Jabatan (Cth: Ketua, Sekretaris):</label><br>
        <input type="text" name="position" required><br><br>

        <label>Urutan Tampil (Angka, 1 untuk urutan teratas):</label><br>
        <input type="number" name="order" value="0" required><br><br>

        <label>Foto Pengurus (Opsional):</label><br>
        <input type="file" name="photo" accept="image/*"><br><br>

        <button type="submit">Simpan Pengurus</button>
    </form>

    <hr>

    <h3>Daftar Pengurus</h3>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Urutan</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
        @foreach($committees as $committee)
        <tr>
            <td>{{ $committee->order }}</td>
            <td>
                @if($committee->photo)
                    <img src="{{ asset('storage/' . $committee->photo) }}" width="80" alt="Foto">
                @else
                    Tidak ada foto
                @endif
            </td>
            <td>{{ $committee->name }}</td>
            <td>{{ $committee->position }}</td>
            <td>
                <form action="{{ route('admin.committees.destroy', $committee->id) }}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus pengurus ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>