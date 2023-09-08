<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sesi 2</title>
</head>
<body>
    <h1>Ini adalah halaman Sesi 2</h1>

    {{-- Menampilkan data --}}
    <p>Nama : {{ $nama_siswa }}</p>
    <p>Umur : {{ $umur }}</p>
    <p>Kelas : <?php echo $kelas; ?></p>

    {{-- Pengkondisian --}}
    @if ($umur > 18)
        <p>Umur anda sudah dewasa</p>
    @else
        <p>Umur anda masih dibawah umur</p>
    @endif

    <?php if ($umur > 18): ?>
        <p>Umur anda sudah dewasa</p>
    <?php else: ?>
        <p>Umur anda masih dibawah umur</p>
    <?php endif ?>

    {{-- perulangan --}}
    @foreach ($mata_pelajaran as $item)
        <ul>
            <li>{{ $item }}</li>
        </ul>
    @endforeach
</body>
</html>