<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Kemplangin</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>body{font-family:'Plus Jakarta Sans',sans-serif}</style>
</head>
<body class="flex min-h-screen items-center justify-center bg-gradient-to-br from-[#12202c] to-[#0a131b] px-4 text-slate-800">

    <div class="w-full max-w-md">
        {{-- Logo --}}
        <a href="{{ route('home') }}" class="mb-8 flex items-center justify-center gap-3 font-bold text-white">
            <span class="grid h-10 w-10 place-items-center rounded-full bg-yellow-400 text-slate-900">K</span>
            <span class="text-xl">Kemplangin</span>
        </a>

        <div class="rounded-2xl bg-white p-8 shadow-2xl">
            <h1 class="text-2xl font-extrabold">Login Admin</h1>
            <p class="mt-1 text-sm text-slate-500">Masuk untuk mengelola produk dan pesanan.</p>

            <form action="{{ route('admin.login.submit') }}" method="POST" class="mt-6 space-y-5" novalidate>
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="mb-1.5 block text-sm font-medium">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                           class="w-full rounded-lg border px-4 py-3 text-sm focus:border-[#1b4f7a] focus:outline-none focus:ring-2 focus:ring-[#1b4f7a]/20 {{ $errors->has('email') ? 'border-red-400' : 'border-slate-300' }}"
                           placeholder="admin@email.com">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="mb-1.5 block text-sm font-medium">Password</label>
                    <div class="relative">
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                               class="w-full rounded-lg border border-slate-300 px-4 py-3 pr-16 text-sm focus:border-[#1b4f7a] focus:outline-none focus:ring-2 focus:ring-[#1b4f7a]/20"
                               placeholder="Password">
                        <button type="button" id="togglePw"
                                class="absolute inset-y-0 right-0 px-4 text-xs font-semibold text-slate-500 hover:text-slate-800">
                            Lihat
                        </button>
                    </div>
                    @error('password')
                        <p class="mt-1.5 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
                    <input type="checkbox" name="remember" class="h-4 w-4 rounded accent-[#1b4f7a]">
                    Ingat saya
                </label>

                <button type="submit"
                        class="w-full rounded-lg bg-[#1b4f7a] py-3 text-sm font-semibold text-white transition hover:bg-[#163f61]">
                    Masuk
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-sm text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-white">&larr; Kembali ke toko</a>
        </p>
    </div>

    <script>
        const pw = document.getElementById('password');
        const tg = document.getElementById('togglePw');
        tg.addEventListener('click', () => {
            const show = pw.type === 'password';
            pw.type = show ? 'text' : 'password';
            tg.textContent = show ? 'Sembunyi' : 'Lihat';
        });
    </script>
</body>
</html>
