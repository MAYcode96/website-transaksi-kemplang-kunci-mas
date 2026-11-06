<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kemplangin - Belanja kemplang terbaik</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body{font-family:'Plus Jakarta Sans',sans-serif}</style>
</head>
<body class="bg-slate-50 text-slate-800">

    {{-- ================= HERO (tidak full screen) ================= --}}
    <header class="relative h-[460px] md:h-[520px] bg-gradient-to-br from-[#12202c] to-[#0a131b] text-white">

        {{-- Navbar --}}
        <nav id="navbar" class="fixed inset-x-0 top-0 z-50 flex items-center justify-between bg-transparent px-6 py-6 text-white transition-all duration-300 md:px-12">
            <a href="/" class="flex items-center gap-3 font-bold">
                <span class="grid h-8 w-8 place-items-center rounded-full bg-yellow-400 text-sm text-slate-900">K</span>
                Kemplangin
            </a>
            <div class="flex items-center gap-5">
            {{-- WhatsApp (ganti 628xxxxxxxxxx dengan nomor penjual) --}}
            <a href="https://wa.me/628xxxxxxxxxx" target="_blank" rel="noopener" aria-label="WhatsApp"
               class="text-white transition hover:text-green-400">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
            </a>

            <a href="{{ url('/keranjang') }}" aria-label="Keranjang"
               class="relative text-white transition hover:text-yellow-400">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.7 13.4a2 2 0 0 0 2 1.6h9.7a2 2 0 0 0 2-1.6L23 6H6"/></svg>
                @php $cartCount = collect(session('cart', []))->sum('qty'); @endphp
                @if($cartCount > 0)
                    <span class="absolute -right-2 -top-2 grid h-5 min-w-5 place-items-center rounded-full bg-yellow-400 px-1 text-[11px] font-bold text-slate-900">{{ $cartCount }}</span>
                @endif
            </a>
            </div>
        </nav>

        {{-- Judul (kiri bawah) --}}
        <div class="absolute bottom-24 left-6 md:left-28">
            <h1 class="text-4xl md:text-6xl font-extrabold leading-tight tracking-tight">
                KEMPLANGIN<br>Belanja kemplang terbaik.
            </h1>
        </div>

        {{-- Search: tengah, nempel di batas bawah hero (setengah keluar) --}}
        <form action="{{ route('home') }}" method="GET"
              class="absolute left-1/2 bottom-0 z-10 w-[92%] max-w-2xl -translate-x-1/2 translate-y-1/2">
            @if(request('jenis'))
                <input type="hidden" name="jenis" value="{{ request('jenis') }}">
            @endif
            <div class="flex items-center gap-2 rounded-full bg-white p-2 pl-6 shadow-xl ring-1 ring-slate-200">
                <svg class="h-5 w-5 shrink-0 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/></svg>
                <input type="text" name="q" value="{{ request('q') }}"
                       placeholder="Cari kemplang gas..."
                       class="w-full border-0 bg-transparent text-sm text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-0">
                <button type="submit"
                        class="rounded-full bg-[#1b4f7a] px-6 py-3 text-sm font-semibold text-white hover:bg-[#163f61]">
                    Cari
                </button>
            </div>
        </form>
    </header>

    {{-- ================= KATALOG ================= --}}
    <main class="mx-auto max-w-7xl px-6 pb-20 pt-24">
        <div class="mb-8 flex items-end justify-between">
            <div>
                <h2 class="text-2xl font-bold">Katalog Kemplang Gas</h2>
                <p class="text-sm text-slate-500">Renyah, gurih, dan siap dikirim ke rumahmu.</p>
            </div>
            @if(request('q') || request('jenis'))
                <a href="{{ route('home') }}" class="text-sm font-medium text-[#1b4f7a] hover:underline">Reset pencarian</a>
            @endif
        </div>

        {{-- Filter jenis kemplang --}}
        <div class="mb-8 flex gap-2 overflow-x-auto pb-1">
            @foreach(['' => 'Semua'] + array_combine($types, $types) as $value => $label)
                @php $active = (request('jenis') ?? '') === $value; @endphp
                <a href="{{ route('home', array_filter(['q' => request('q'), 'jenis' => $value])) }}"
                   class="whitespace-nowrap rounded-full px-4 py-2 text-sm font-medium ring-1 transition
                          {{ $active ? 'bg-[#1b4f7a] text-white ring-[#1b4f7a]' : 'bg-white text-slate-600 ring-slate-200 hover:bg-slate-100' }}">
                    {{ $label }}
                </a>
            @endforeach
        </div>

        <div class="grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4 md:gap-6">
            @forelse($products as $product)
                <article class="group overflow-hidden rounded-2xl bg-white ring-1 ring-slate-200 transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="aspect-square overflow-hidden bg-slate-100">
                        <img src="{{ $product->image }}"
                             alt="{{ $product->name }}"
                             class="h-full w-full object-cover transition group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        <h3 class="line-clamp-2 text-sm font-semibold md:text-base">{{ $product->name }}</h3>
                        <p class="mt-1 text-xs text-slate-500">{{ $product->weight ?? '' }}</p>
                        <div class="mt-3 flex items-center justify-between">
                            <span class="font-bold text-[#1b4f7a]">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            <button class="rounded-full bg-yellow-400 px-3 py-1.5 text-xs font-semibold text-slate-900 hover:bg-yellow-300">
                                + Keranjang
                            </button>
                        </div>
                    </div>
                </article>
            @empty
                <p class="col-span-full py-16 text-center text-slate-500">Produk tidak ditemukan.</p>
            @endforelse
        </div>

    </main>

    <script>
        // Navbar transparan di atas, jadi solid saat di-scroll
        const nav = document.getElementById('navbar');
        const solid = ['bg-[#0f1b26]/90', 'shadow-lg', 'backdrop-blur', 'py-4'];
        const flat  = ['bg-transparent', 'py-6'];
        function onScroll() {
            const scrolled = window.scrollY > 20;
            solid.forEach(c => nav.classList.toggle(c, scrolled));
            flat.forEach(c => nav.classList.toggle(c, !scrolled));
        }
        window.addEventListener('scroll', onScroll, { passive: true });
        onScroll();
    </script>
</body>
</html>