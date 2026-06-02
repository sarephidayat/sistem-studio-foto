<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking - Kuy Studio</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>

    .time-pill {
        transition: all .2s ease;
    }

    .time-pill.opacity-50 {
        background: #d1d5db !important;
        color: #6b7280 !important;
        cursor: not-allowed;
    }

    </style>
</head>

<body class="bg-[#F5F7FA] min-h-screen text-[#0B132B]">

    <div class="max-w-5xl mx-auto px-6 py-14">

        <!-- BACK -->
        <a
            href="/"
            class="inline-flex items-center gap-2 text-gray-500 hover:text-[#0B132B] transition mb-10"
        >
            ← Kembali ke Landing Page
        </a>

        <!-- TITLE -->
        <div class="text-center mb-14">

            <h1 class="text-6xl font-black text-[#0B132B]">
                Booking Studio
            </h1>

            <p class="mt-4 text-gray-500 text-lg">
                Isi data booking studio foto kamu.
            </p>

        </div>

        <!-- SUCCESS -->
        @if(session('success'))

            <div class="mb-8 bg-green-100 border border-green-200 text-green-700 px-6 py-4 rounded-2xl">
                {{ session('success') }}
            </div>

        @endif

        <!-- FORM CARD -->
        <div class="bg-white rounded-[32px] shadow-sm border border-gray-100 p-10">

            <form
                method="POST"
                action="{{ route('booking.store') }}"
                class="grid grid-cols-1 md:grid-cols-2 gap-8"
            >

                @csrf

                <!-- CUSTOMER -->
                <div>
                    <label class="block text-sm font-bold">
                        Label Customer
                    </label>

                    <select
                        name="label_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select customer</option>

                        @foreach ($labels as $label)

                            <option value="{{ $label->id }}">
                                {{ $label->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- USER -->
                <div>
                    <label class="block text-sm font-bold">
                        User
                    </label>

                    <select
                        name="user_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select user</option>

                        @foreach ($users as $user)

                            <option value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- BACKGROUND -->
                <div>
                    <label class="block text-sm font-bold">
                        Background
                    </label>

                    <select
                        name="background_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select background</option>

                        @foreach ($backgrounds as $background)

                            <option value="{{ $background->id }}">
                                {{ $background->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- KOTA -->
                <div>
                    <label class="block text-sm font-bold">
                        Kota
                    </label>

                    <select
                        id="kota_id"
                        name="kota_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select kota</option>

                        @foreach ($kotas as $kota)

                            <option value="{{ $kota->id }}">
                                {{ $kota->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- STUDIO -->
                <div>
                    <label class="block text-sm font-bold">
                        Studio
                    </label>

                    <select
                        id="studio_id"
                        name="studio_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select studio</option>

                    </select>
                </div>

                <!-- PAYMENT -->
                <div>
                    <label class="block text-sm font-bold">
                        Metode Pembayaran
                    </label>

                    <select
                        name="pembayaran_id"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >

                        <option value="">Select payment</option>

                        @foreach ($pembayarans as $pembayaran)

                            <option value="{{ $pembayaran->id }}">
                                {{ $pembayaran->nama }}
                            </option>

                        @endforeach

                    </select>
                </div>

                <!-- DATE -->
                <div>
                    <label class="block text-sm font-bold">
                        Tanggal Booking
                    </label>

                    <input
                        id="booking_date"
                        name="tanggal"
                        type="date"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >
                </div>

                <!-- WHATSAPP -->
                <div>
                    <label class="block text-sm font-bold">
                        Nomor WhatsApp
                    </label>

                    <input
                        type="text"
                        name="nomor_telepon"
                        placeholder="08xxxxxxxxxx"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >
                </div>

                <!-- JUMLAH -->
                <div>
                    <label class="block text-sm font-bold">
                        Jumlah Orang
                    </label>

                    <input
                        type="number"
                        name="jumlah_orang"
                        placeholder="Contoh: 5"
                        class="mt-3 w-full rounded-2xl border border-gray-200 bg-[#F9FAFB] px-5 py-4 text-[#0B132B]"
                    >
                </div>

                <!-- EMPTY -->
                <div></div>

                <!-- TIME -->
                <div class="md:col-span-2 w-full">

                    <label class="block text-sm font-bold mb-4">
                        Pilih Waktu
                    </label>

                    <div class="bg-[#F9FAFB] rounded-2xl border border-gray-100 p-8 w-full">

                        <div
                            style="
                                display:grid;
                                grid-template-columns: repeat(4, minmax(0,1fr));
                                gap: 14px;
                                max-height: 420px;
                                overflow-y: auto;
                            "
                        >

                            @foreach ($waktus as $waktu)

                                <label class="cursor-pointer block">

                                    <input
                                        type="radio"
                                        name="waktu_id"
                                        value="{{ $waktu->id }}"
                                        class="peer sr-only"
                                    >

                                    <div
                                        data-time-id="{{ $waktu->id }}" 
                                        class="
                                            time-pill
                                            w-full
                                            py-4
                                            rounded-2xl
                                            bg-[#F3F4F6]
                                            text-center
                                            font-bold
                                            text-[#0B132B]
                                            border-2 border-transparent

                                            transition-all duration-200

                                            hover:bg-gray-200

                                            peer-checked:bg-[#0B132B]
                                            peer-checked:text-white
                                            peer-checked:border-[#0B132B]
                                            peer-checked:shadow-lg
                                    ">

                                        {{ date('H:i', strtotime($waktu->waktu)) }}

                                    </div>

                                </label>

                            @endforeach

                        </div>

                    </div>

                </div>

                <!-- BUTTON -->
                <div class="md:col-span-2 mt-4 flex flex-col md:flex-row gap-4">

                    <button
                        type="submit"
                        class="bg-[#0B132B] hover:opacity-90 transition text-white py-5 px-10 rounded-2xl font-bold shadow-lg"
                    >
                        Kirim Booking
                    </button>

                    <a
                        href="/"
                        class="border border-gray-200 hover:bg-gray-50 transition py-5 px-10 rounded-2xl font-bold text-gray-600 text-center"
                    >
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

<script>

document.addEventListener('DOMContentLoaded', () => {

    const bookingDate = document.querySelector('#booking_date');

    async function checkBookedSlots(date) {

        const response = await fetch(`/booking/check-slots?tanggal=${date}`);

        const bookedSlots = await response.json();

        document.querySelectorAll('.time-pill').forEach((pill) => {

            const timeId = pill.dataset.timeId;

            const input = pill.parentElement.querySelector('input');

            pill.classList.remove(
                'opacity-40',
                'pointer-events-none',
                'bg-red-100',
                'border-red-300'
            );

            input.disabled = false;

            if (bookedSlots.includes(Number(timeId))) {

                pill.classList.add(
                    'opacity-40',
                    'pointer-events-none',
                    'bg-red-100',
                    'border-red-300'
                );

                input.disabled = true;
            }

        });

    }

});

</script>

<script>

document.addEventListener('DOMContentLoaded', () => {

    flatpickr("#booking_date", {

        inline: true,
        minDate: "today",

        onChange: async function(selectedDates, dateStr) {

            const response = await fetch(
                `/booking/check-slots?tanggal=${dateStr}`
            );

            const bookedSlots = await response.json();

            document.querySelectorAll('.time-pill').forEach((pill) => {

                const timeId = Number(pill.dataset.timeId);

                const input = pill.parentElement.querySelector('input');

                pill.classList.remove(
                    'opacity-40',
                    'pointer-events-none',
                    'bg-red-100',
                    'border-red-300'
                );

                input.disabled = false;

                if (bookedSlots.includes(timeId)) {

                    pill.classList.add(
                        'opacity-40',
                        'pointer-events-none',
                        'bg-red-100',
                        'border-red-300'
                    );

                    input.disabled = true;
                }

            });

        }

    });

});

</script>
<script>

document.addEventListener('DOMContentLoaded', function () {

    const kotaSelect =
        document.getElementById('kota_id');

    const studioSelect =
        document.getElementById('studio_id');

    const tanggalInput =
        document.getElementById('booking_date');

    // ======================
    // LOAD OUTLET
    // ======================

    kotaSelect.addEventListener(
        'change',
        async function () {

            const kotaId = this.value;

            studioSelect.innerHTML =
                '<option value="">Loading...</option>';

            const response =
                await fetch(
                    `/booking/outlets/${kotaId}`
                );

            const outlets =
                await response.json();

            studioSelect.innerHTML =
                '<option value="">Pilih Outlet</option>';

            outlets.forEach(outlet => {

                studioSelect.innerHTML += `
                    <option value="${outlet.id}">
                        ${outlet.nama}
                    </option>
                `;

            });

            resetSlots();

        }
    );

    // ======================
    // LOAD BOOKED SLOT
    // ======================

    async function loadBookedSlots()
    {
        const studioId =
            studioSelect.value;

        const tanggal =
            tanggalInput.value;

        if (!studioId || !tanggal) {

            resetSlots();

            return;
        }

        const response =
            await fetch(
                `/booking/booked-slots?studio_id=${studioId}&tanggal=${tanggal}`
            );

        const booked =
            await response.json();

        document
            .querySelectorAll(
                'input[name="waktu_id"]'
            )
            .forEach(radio => {

                radio.disabled = false;

                const pill =
                    radio.nextElementSibling;

                pill.classList.remove(
                    'opacity-50',
                    'cursor-not-allowed'
                );

                if (
                    booked.includes(
                        parseInt(radio.value)
                    )
                ) {

                    radio.disabled = true;

                    pill.classList.add(
                        'opacity-50',
                        'cursor-not-allowed'
                    );
                }

            });
    }

    // ======================
    // RESET SLOT
    // ======================

    function resetSlots()
    {
        document
            .querySelectorAll(
                'input[name="waktu_id"]'
            )
            .forEach(radio => {

                radio.disabled = false;

                const pill =
                    radio.nextElementSibling;

                pill.classList.remove(
                    'opacity-50',
                    'cursor-not-allowed'
                );

            });
    }

    studioSelect.addEventListener(
        'change',
        loadBookedSlots
    );

    tanggalInput.addEventListener(
        'change',
        loadBookedSlots
    );

});
</script>
</body>
</html>