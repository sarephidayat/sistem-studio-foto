from tools import check_availability

result = check_availability.invoke(
    {
        "studio_id": 8,
        "tanggal": "2026-06-10"
    }
)

print(result)