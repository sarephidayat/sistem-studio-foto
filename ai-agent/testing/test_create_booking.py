from tools import create_booking

result = create_booking.invoke(
    {
        "studio_id": 8,
        "kota_id": 1,
        "tanggal": "2026-06-11",
        "waktu_id": 2,
        "jumlah_orang": 3,
        "nomor_telepon": "08123456789"
    }
)

print(result)