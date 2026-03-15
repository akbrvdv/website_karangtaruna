<!DOCTYPE html>
<html>
<head>
    <title>Kirim Aduan Warga</title>
</head>
<body style="font-family: sans-serif; padding: 20px;">

    <h2>Formulir Aduan & Aspirasi Masyarakat</h2>
    <p>Silakan sampaikan aduan atau aspirasi Anda untuk Karang Taruna di bawah ini.</p>

    @if(session('success'))
        <div style="color: green; font-weight: bold; margin-bottom: 15px; padding: 10px; border: 1px solid green;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aduan.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label>Nama Pengirim:</label><br>
            <input type="text" name="sender_name" required style="width: 300px;">
        </div>
        
        <div style="margin-bottom: 10px;">
            <label>Kontak (WA/Email):</label><br>
            <input type="text" name="sender_contact" placeholder="Opsional" style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Judul Aduan:</label><br>
            <input type="text" name="title" required style="width: 300px;">
        </div>

        <div style="margin-bottom: 10px;">
            <label>Pesan/Isi Aduan:</label><br>
            <textarea name="message" rows="5" required style="width: 300px;"></textarea>
        </div>

        <button type="submit" style="padding: 8px 15px; cursor: pointer;">Kirim Aduan</button>
    </form>

    <br>
    <a href="{{ route('home') }}">← Kembali ke Beranda</a>

</body>
</html>