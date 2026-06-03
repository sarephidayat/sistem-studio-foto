import requests

from langchain.tools import tool

from config import LARAVEL_API_URL

@tool
def get_master_data() -> dict:
    """
    Mengambil seluruh data master:
    - outlet
    - kota
    - background
    - metode pembayaran
    - slot waktu
    """

    response = requests.get(
        f"{LARAVEL_API_URL}/master-data"
    )

    response.raise_for_status()

    return response.json()

@tool
def check_availability(
    studio_id: int,
    tanggal: str
) -> dict:
    """
    Mengecek slot yang tersedia
    pada outlet dan tanggal tertentu.

    Format tanggal:
    YYYY-MM-DD
    """

    response = requests.post(
        f"{LARAVEL_API_URL}/check-availability",
        json={
            "studio_id": studio_id,
            "tanggal": tanggal
        }
    )

    response.raise_for_status()

    return response.json()


    
@tool
def create_booking(
    studio_id: int,
    kota_id: int,
    tanggal: str,
    waktu_id: int,
    jumlah_orang: int,
    nomor_telepon: str
) -> dict:
    """
    Membuat booking studio.

    Parameters:
    - studio_id
    - kota_id
    - tanggal (YYYY-MM-DD)
    - waktu_id
    - jumlah_orang
    - nomor_telepon
    """

    response = requests.post(
        f"{LARAVEL_API_URL}/create-booking",
        json={
            "studio_id": studio_id,
            "kota_id": kota_id,
            "tanggal": tanggal,
            "waktu_id": waktu_id,
            "jumlah_orang": jumlah_orang,
            "nomor_telepon": nomor_telepon,
        }
    )

    response.raise_for_status()

    return response.json()

TOOLS = [
    get_master_data,
    check_availability,
    create_booking,
]