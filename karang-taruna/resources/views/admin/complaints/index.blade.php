<!DOCTYPE html>
<html>
<body>
    <h1>Testing Backend: Kelola Aduan Warga</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>Tanggal</th>
            <th>Pengirim</th>
            <th>Kontak</th>
            <th>Judul & Pesan</th>
            <th>Status Saat Ini</th>
            <th>Ubah Status</th>
        </tr>
        @foreach($complaints as $complaint)
        <tr>
            <td>{{ $complaint->created_at }}</td>
            <td>{{ $complaint->sender_name }}</td>
            <td>{{ $complaint->sender_contact }}</td>
            <td>
                <strong>{{ $complaint->title }}</strong><br>
                {{ $complaint->message }}
            </td>
            <td>{{ strtoupper($complaint->status) }}</td>
            <td>
                <form action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    <select name="status">
                        <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $complaint->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $complaint->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    <button type="submit">Update</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>