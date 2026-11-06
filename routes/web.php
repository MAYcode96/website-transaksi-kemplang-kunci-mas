<?php

// routes/web.php  (data dummy, belum pakai database)

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    // [nama, deskripsi, berat, harga, jenis]
    $items = [
        ['Kemplang Gas Original',      'Kemplang gas gurih khas Palembang',  '250 gr', 25000, 'Original'],
        ['Kemplang Gas Pedas',         'Level pedas bikin nagih',            '250 gr', 27000, 'Pedas'],
        ['Kemplang Gas Keju',          'Taburan keju gurih',                 '250 gr', 29000, 'Keju'],
        ['Kemplang Gas Balado',        'Bumbu balado manis pedas',           '250 gr', 28000, 'Balado'],
        ['Kemplang Gas Ikan Tenggiri', 'Ikan tenggiri asli, ekstra renyah',  '500 gr', 45000, 'Ikan'],
        ['Kemplang Gas Udang',         'Aroma udang yang kuat',              '250 gr', 32000, 'Udang'],
        ['Kemplang Gas Jumbo',         'Ukuran jumbo, cocok buat oleh-oleh', '1 kg',   85000, 'Original'],
        ['Paket Hemat Kemplang Gas',   'Isi 4 varian rasa',                  '1 kg',   99000, 'Paket'],
    ];

    $all = collect($items)->map(fn ($p, $i) => (object) [
        'name'   => $p[0],
        'desc'   => $p[1],
        'weight' => $p[2],
        'price'  => $p[3],
        'type'   => $p[4],
        'image'  => 'https://placehold.co/400x400/fde68a/92400e?text=' . urlencode('Kemplang ' . ($i + 1)),
    ]);

    $types = $all->pluck('type')->unique()->values()->all();

    $products = $all
        ->when($request->q, fn ($c, $q) => $c->filter(
            fn ($p) => str_contains(strtolower($p->name), strtolower($q))
        ))
        ->when($request->jenis, fn ($c, $j) => $c->where('type', $j))
        ->values();

    return view('home', compact('products', 'types'));
})->name('home');