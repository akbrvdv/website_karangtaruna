<!DOCTYPE html>
<html>
<head>
    <title>Test Form Aduan</title>
</head>
<body>
    <h1>Kirim Aduan Warga</h1>
    
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('aduan.store') }}" method="POST">
        @csrf
        <div>
            <label>Nama Pengirim:</label><br>
            <input type="text" name="sender_name" required>
        </div><br>
        
        <div>
            <label>Kontak (WA/Email):</label><br>
            <input type="text" name="sender_contact">
        </div><br>

        <div>
            <label>Judul Aduan:</label><br>
            <input type="text" name="title" required>
        </div><br>

        <div>
            <label>Pesan/Isi Aduan:</label><br>
            <textarea name="message" rows="5" required></textarea>
        </div><br>

        <button type="submit">Kirim Aduan</button>
    </form>
</body>
</html>