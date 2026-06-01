<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuy Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#F4F5F7]"
style="
background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
background-size: 40px 40px;
">

    <!-- NAVBAR -->
    <nav class="bg-white border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-8 h-20 flex items-center justify-between">

            <!-- LOGO -->
            <div class="flex items-center">
                <h1 class="text-4xl font-black tracking-tight text-black">
                    KUY
                    <span class="font-light">
                        STUDIO
                    </span>
                </h1>
            </div>

            <!-- MENU -->
            <div class="hidden md:flex items-center gap-12 font-semibold text-gray-600">

                <a href="#" class="text-[#0B132B] border-b-2 border-blue-500 pb-1">
                    Pricelist
                </a>

                <a href="#" class="hover:text-black transition">
                    Gallery
                </a>

                <a
                    href="{{ route('contact') }}"
                    class="hover:text-sky-500 transition"
                >
                    Contact
                </a>

            </div>

        </div>

    </nav>

        <!-- HERO SECTION -->
    <section class="py-16">

        <div class="max-w-7xl mx-auto px-6 text-center">

            <!-- TITLE -->
            <h1 class="text-6xl font-extrabold text-[#0B132B] leading-tight">
                Pricelist Kuy Studio
            </h1>

            <!-- SUBTITLE -->
            <p class="mt-6 text-gray-600 text-lg max-w-2xl mx-auto">
                Booking studio foto modern dengan kualitas terbaik
                untuk kebutuhan wisuda, keluarga, couple, dan photobox.
            </p>

            <!-- BUTTON -->
            <!-- <div class="mt-10 flex items-center justify-center gap-4">

                <button class="bg-orange-500 hover:bg-orange-600 transition text-white px-8 py-4 rounded-full font-semibold shadow-lg">
                    Booking Sekarang
                </button>

                <button class="border border-gray-300 hover:bg-gray-100 transition px-8 py-4 rounded-full font-semibold text-gray-700">
                    Lihat Pricelist
                </button>

            </div> -->

        </div>

    </section>
        <!-- LOCATION TAB
    <section class="pb-16">

        <div class="max-w-5xl mx-auto px-6">

            <div class="bg-white rounded-3xl p-3 shadow-sm flex items-center gap-2 overflow-x-auto">

                ACTIVE
                <button class="bg-[#0B132B] text-white px-8 py-4 rounded-2xl font-semibold whitespace-nowrap shadow">
                    Malang - Oro Oro Dowo
                </button>

                ITEM
                <button class="px-8 py-4 rounded-2xl font-semibold text-gray-500 hover:bg-gray-100 transition whitespace-nowrap">
                    Malang - Suhat
                </button>

                <button class="px-8 py-4 rounded-2xl font-semibold text-gray-500 hover:bg-gray-100 transition whitespace-nowrap">
                    Surabaya - Klampis
                </button>

                <button class="px-8 py-4 rounded-2xl font-semibold text-gray-500 hover:bg-gray-100 transition whitespace-nowrap">
                    Kediri - Kilisuci
                </button>

                <button class="px-8 py-4 rounded-2xl font-semibold text-gray-500 hover:bg-gray-100 transition whitespace-nowrap">
                    Jaksel
                </button>

            </div>

        </div>

    </section> -->
    <!-- Pricing Card  -->
    <section class="pb-12">

        <div class="max-w-5xl mx-auto px-6 space-y-10">

            @foreach ($packages as $package)
                <x-pricing-card
                    :title="$package->title"
                    :price="$package->price"
                    :oldPrice="$package->old_price"
                    :features="$package->features"
                />

            @endforeach

        </div>

    </section>

    <!-- INFORMATION SECTION -->
    <section class="pb-12">

        <div class="max-w-5xl mx-auto px-6">

            <div class="bg-white rounded-[32px] shadow-sm p-10 grid grid-cols-1 md:grid-cols-2 gap-16">

                <!-- LEFT -->
                <div>

                    <!-- BASIC STUDIO -->
                    <div>
                        <h3 class="text-2xl font-extrabold text-[#0B132B] uppercase">
                            Basic Studio
                        </h3>

                        <ul class="mt-4 space-y-3 text-gray-500 text-lg list-disc pl-6">
                            <li>Recommended maximum capacity Studio 1: 15 people.</li>
                            <li>Recommended maximum capacity Studio 2: 12 people.</li>
                        </ul>
                    </div>

                    <!-- BASIC PHOTOBOX -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-extrabold text-[#0B132B] uppercase">
                            Basic Photobox
                        </h3>

                        <ul class="mt-4 space-y-3 text-gray-500 text-lg list-disc pl-6">
                            <li>Recommended maximum capacity: 5 people.</li>
                        </ul>
                    </div>

                </div>

                <!-- RIGHT -->
                <div>

                    <!-- ADDITIONAL PERSON -->
                    <div>
                        <h3 class="text-2xl font-extrabold text-[#0B132B] uppercase">
                            Additional Person
                        </h3>

                        <ul class="mt-4 space-y-3 text-gray-500 text-lg list-disc pl-6">
                            <li>Free extra charge per person</li>
                        </ul>
                    </div>

                    <!-- ADDITIONAL PRINT -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-extrabold text-[#0B132B] uppercase">
                            Additional Print
                        </h3>

                        <ul class="mt-4 space-y-3 text-gray-500 text-lg list-disc pl-6">
                            <li>1 Printed Photo OR MORE @10K - 12.5K</li>
                        </ul>
                    </div>

                    <!-- DIGITAL SOFT COPY -->
                    <div class="mt-12">
                        <h3 class="text-2xl font-extrabold text-[#0B132B] uppercase">
                            Digital Soft Copy
                        </h3>

                        <ul class="mt-4 space-y-3 text-gray-500 text-lg list-disc pl-6">
                            <li>
                                All Color @Free (Tag IG Story @kuystudio & Isi Form / Google Review)
                            </li>

                            <li>
                                All Color @20K (No Terms and Conditions)
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>

    </section>
     
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