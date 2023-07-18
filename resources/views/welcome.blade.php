<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TES FWBD - Arkatama</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdn.jsdelivr.net/npm/daisyui@3.2.1/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
    </head>
    <body>
        <div class="form-control w-full max-w-xs">
            <form action="{{ route("store") }}" method="POST">
                @csrf
                <label class="label">
                    <span class="label-text">Masukkan Data Diri. Format: NAMA[spasi]USIA[spasi]KOTA</span>
                </label>
                <input type="text" placeholder="NAMA[spasi]USIA[spasi]KOTA" class="input input-bordered w-full max-w-xs" name="data" required/>
                @error('data')
                    {{ $message }}
                @enderror
                <button class="btn mt-10 btn-primary">Button</button>
            </form>
        </div>
    </body>
</html>
