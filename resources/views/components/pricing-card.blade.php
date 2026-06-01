<div class="bg-white rounded-[32px] shadow-sm p-10 flex flex-col md:flex-row justify-between gap-10">

    <!-- LEFT -->
    <div class="flex-1">

        <h2 class="text-4xl font-extrabold text-[#0B132B]">
            {{ $title }}
        </h2>

        <!-- FEATURES -->
        <div class="mt-8 space-y-4 text-gray-600 text-lg">

            @foreach ($features ?? [] as $feature)
                <div class="flex items-center gap-3">
                    <span class="text-sky-400 text-xl">✓</span>
                    <span>{{ $feature }}</span>
                </div>
            @endforeach

        </div>

    </div>

    <!-- RIGHT -->
    <div class="md:w-[320px] border-l border-gray-200 pl-10 flex flex-col justify-center">

        <p class="text-gray-400 text-lg">
            Price:
        </p>

        <div class="mt-2 flex items-end gap-4">

            <h1 class="text-7xl font-black text-[#0B132B] leading-none">
                {{ $price }}
            </h1>

            <span class="text-3xl text-gray-300 line-through mb-2">
                {{ $oldPrice }}
            </span>

        </div>

        <button class="mt-10 bg-[#0B132B] hover:opacity-90 transition text-white py-5 rounded-2xl font-bold text-xl shadow-lg">
            Booking Sekarang
        </button>

    </div>

</div>