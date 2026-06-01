<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Kuy Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA] min-h-screen text-[#0B132B]">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">

            <a href="/">
                <h1 class="text-4xl font-black tracking-tight text-black">
                    KUY
                    <span class="font-light">
                        STUDIO
                    </span>
                </h1>
            </a>

            <div class="hidden md:flex items-center gap-12 font-semibold text-gray-600">

                <a href="/" class="hover:text-black transition">
                    Pricelist
                </a>

                <a
                    href="{{ route('gallery') }}"
                    class="text-[#0B132B] border-b-2 border-blue-500 pb-1"
                >
                    Gallery
                </a>

                <a
                    href="{{ route('contact') }}"
                    class="hover:text-black transition"
                >
                    Contact
                </a>

            </div>

            <a
                href="/#pricing"
                class="bg-[#0B132B] hover:opacity-90 transition text-white px-8 py-4 rounded-full font-bold shadow-lg"
            >
                Pilih Paket
            </a>

        </div>
    </nav>

    <div class="max-w-7xl mx-auto px-6 py-14">

        <!-- HERO -->
        <div class="text-center mb-16">

            <h1 class="text-6xl font-black">
                Gallery
            </h1>

            <p class="mt-4 text-gray-500 text-xl">
                Hasil foto terbaik dari berbagai sesi pemotretan di Kuy Studio.
            </p>

        </div>

        <!-- FILTER -->
        <!-- <div class="flex flex-wrap justify-center gap-4 mb-12"> -->

            <!-- <button class="px-6 py-3 rounded-full bg-[#0B132B] text-white font-bold">
                Semua
            </button> -->

            <!-- <button class="px-6 py-3 rounded-full bg-white shadow-sm">
                Photobox
            </button> -->

            <!-- <button class="px-6 py-3 rounded-full bg-white shadow-sm">
                Graduation
            </button> -->

            <!-- <button class="px-6 py-3 rounded-full bg-white shadow-sm">
                Family
            </button> -->

            <!-- <button class="px-6 py-3 rounded-full bg-white shadow-sm">
                Couple
            </button> -->

        <!-- </div> -->

        <!-- GALLERY GRID -->
        <div class="grid md:grid-cols-3 gap-6">

            @for ($i = 1; $i <= 12; $i++)

                <div class="bg-white rounded-[28px] overflow-hidden shadow-sm">

                    <img
                        src="https://picsum.photos/600/600?random={{ $i }}"
                        class="w-full aspect-square object-cover"
                    >

                </div>

            @endfor

        </div>

        <!-- CTA -->
        <div class="mt-20 bg-white rounded-[32px] p-10 text-center shadow-sm">

            <h2 class="text-4xl font-black">
                Siap Membuat Kenangan Baru?
            </h2>

            <p class="mt-4 text-gray-500">
                Pilih paket favoritmu dan lakukan booking sekarang.
            </p>

            <a
                href="/#pricing"
                class="inline-block mt-8 bg-[#0B132B] text-white px-10 py-5 rounded-2xl font-bold"
            >
                Pilih Paket
            </a>

        </div>

    </div>

            <!-- FOOTER -->
    <footer class="py-4">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <p class="text-gray-400 text-lg">
                © 2026 Kuy Studio. All rights reserved.
            </p>

            <div class="mt-6 flex items-center justify-center gap-6 text-gray-400 text-2xl">

                <span>📸</span>
                <span>🎵</span>
                <span>💬</span>

            </div>

        </div>

    </footer>


</body>
</html>