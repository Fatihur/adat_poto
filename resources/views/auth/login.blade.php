<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Roboto:wght@500;700;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#353535] flex items-center justify-center p-4 font-sans">

    <div class="w-full max-w-sm">
        <div class="text-center text-white">
            <span class="inline-flex items-center justify-center w-16 h-16 bg-white text-[#AB7442] font-heading font-black text-2xl mb-4">AP</span>
            <h1 class="text-2xl font-heading font-bold tracking-tight">Login Admin</h1>
            <p class="mt-1 text-sm text-white/60">Sistem Informasi Adat Desa Poto</p>
        </div>

        <div class="mt-8 bg-white p-8">
            <x-flash />

            <form method="POST" action="{{ route('admin.login.proses') }}" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-stone-700 mb-1.5">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                           class="form-control-woody bg-[#F5F5F5]"
                           placeholder="admin@desapoto.id">
                </div>

                <div>
                    <label for="kata_sandi" class="block text-sm font-medium text-stone-700 mb-1.5">Kata Sandi</label>
                    <input id="kata_sandi" name="kata_sandi" type="password" required autocomplete="current-password"
                           class="form-control-woody bg-[#F5F5F5]"
                           placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                </div>

                <label class="flex items-center gap-2 text-sm text-stone-600 cursor-pointer">
                    <input type="checkbox" name="ingat" value="1" class="h-4 w-4 accent-[#AB7442]">
                    Ingat saya
                </label>

                <button type="submit" class="btn-woody w-full py-3 text-sm font-medium uppercase tracking-wider">
                    Masuk
                </button>
            </form>
        </div>

        <p class="mt-6 text-center text-sm">
            <a href="{{ route('beranda') }}" class="text-white/50 hover:text-white transition inline-flex items-center gap-1">&larr; Kembali ke beranda</a>
        </p>
    </div>

</body>
</html>
