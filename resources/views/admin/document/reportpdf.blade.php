<!DOCTYPE html>
<html>
<head>
    <title>Laporan Dokumen</title>
</head>
<body>
    <h1>Laporan Dokumen</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Dokumen</th>
                <th>Nama Dokumen</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td>{{ $document->nama }}</td>
                <td>{{ $document->category->nama }}</td> 
                <td>{{ $document->keterangan }}</td>
                <td>{{ $document->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
