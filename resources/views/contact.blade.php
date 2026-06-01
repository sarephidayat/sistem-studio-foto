<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Kuy Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F5F7FA] min-h-screen text-[#0B132B]">

            <!-- NAVBAR -->
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">

                <!-- LOGO -->
                <div class="flex items-center">
                    <a href="/">
                        <h1 class="text-4xl font-black tracking-tight text-black">
                            KUY
                            <span class="font-light">
                                STUDIO
                            </span>
                        </h1>
                    </a>
                </div>

                <!-- MENU -->
                <div class="hidden md:flex items-center gap-12 font-semibold text-gray-600">

                    <a
                        href="/#pricing"
                        class="hover:text-black transition"
                    >
                        Pricelist
                    </a>

                    <a
                        href="/#gallery"
                        class="hover:text-black transition"
                    >
                        Gallery
                    </a>

                    <a
                        href="{{ route('contact') }}"
                        class="text-[#0B132B] border-b-2 border-blue-500 pb-1"
                    >
                        Contact
                    </a>

                </div>

                <!-- BUTTON -->
                <a
                    href="/#pricing"
                    class="bg-[#0B132B] hover:opacity-90 transition text-white px-8 py-4 rounded-full font-bold shadow-lg"
                >
                    Pilih Paket
                </a>

            </div>
        </nav>

        <div class="max-w-6xl mx-auto px-6 py-14">

        <!-- BACK -->
        <a
            href="/"
            class="inline-flex items-center gap-2 text-gray-500 hover:text-[#0B132B] transition mb-10"
        >
            ← Kembali ke Landing Page
        </a>

        <!-- HERO -->
        <div class="text-center mb-16">

            <h1 class="text-6xl font-black text-[#0B132B]">
                Hubungi Kami
            </h1>

            <p class="mt-5 text-gray-500 text-xl max-w-2xl mx-auto">
                Punya pertanyaan tentang paket foto, booking studio,
                atau kebutuhan khusus? Tim Kuy Studio siap membantu.
            </p>

        </div>

        <!-- CONTACT CARDS -->
        <div class="grid md:grid-cols-4 gap-6 mb-16">

            <div class="bg-white rounded-[28px] p-8 shadow-sm">
                <h3 class="font-bold text-xl mb-3">
                    📞 Telepon
                </h3>

                <p class="text-gray-500">
                    0812-3456-7890
                </p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-sm">
                <h3 class="font-bold text-xl mb-3">
                    💬 WhatsApp
                </h3>

                <p class="text-gray-500">
                    0812-3456-7890
                </p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-sm">
                <h3 class="font-bold text-xl mb-3">
                    📧 Email
                </h3>

                <p class="text-gray-500">
                    hello@kuystudio.com
                </p>
            </div>

            <div class="bg-white rounded-[28px] p-8 shadow-sm">
                <h3 class="font-bold text-xl mb-3">
                    📍 Lokasi
                </h3>

                <p class="text-gray-500">
                    Semarang, Jawa Tengah
                </p>
            </div>

        </div>

        <!-- MAP -->
        <div class="bg-white rounded-[32px] p-6 shadow-sm mb-16">

            <h2 class="text-3xl font-bold mb-6">
                Lokasi Studio
            </h2>

            <iframe
                src="https://maps.google.com/maps?q=Semarang&t=&z=13&ie=UTF8&iwloc=&output=embed"
                class="w-full h-[450px] rounded-[24px]"
                loading="lazy"
            ></iframe>

        </div>

        <!-- WHATSAPP CTA -->
        <div class="bg-white rounded-[32px] p-10 shadow-sm text-center">

            <h2 class="text-4xl font-black mb-4">
                Butuh Bantuan Cepat?
            </h2>

            <p class="text-gray-500 text-lg mb-8">
                Hubungi admin Kuy Studio melalui WhatsApp.
            </p>

            <a
                href="https://wa.me/6281234567890"
                target="_blank"
                class="inline-block bg-[#0B132B] hover:opacity-90 transition text-white px-10 py-5 rounded-2xl font-bold text-xl shadow-lg"
            >
                Chat WhatsApp
            </a>

        </div>

    </div>

</body>
</html>