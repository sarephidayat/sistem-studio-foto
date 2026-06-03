import re

from tools import get_master_data

from memory import (
    update_session
)


def parse_booking_input(
    user_id,
    user_input
):
    

    data = get_master_data.invoke({})

    user_text = user_input.lower()

    for studio in data["studios"]:

        studio_name = studio["nama"].lower()

        outlet_keyword = studio_name.split()[-1]

        if outlet_keyword in user_text:

            update_session(
                user_id,
                "studio_id",
                studio["id"]
            )

            update_session(
                user_id,
                "studio_name",
                studio["nama"]
            )

            if "kota_id" in studio:

                update_session(
                    user_id,
                    "kota_id",
                    studio["kota_id"]
                )

            print(
                f"OUTLET TERDETEKSI: {studio['nama']}"
            )

            break
    months = {
        "januari": "01",
        "februari": "02",
        "maret": "03",
        "april": "04",
        "mei": "05",
        "juni": "06",
        "juli": "07",
        "agustus": "08",
        "september": "09",
        "oktober": "10",
        "november": "11",
        "desember": "12"
    }
    date_match = re.search(
        r'(\d{4}-\d{2}-\d{2})',
        user_input
    )

    if date_match:

        update_session(
            user_id,
            "tanggal",
            date_match.group(1)
        )
    date_text_match = re.search(
        r'(\d{1,2})\s+(januari|februari|maret|april|mei|juni|juli|agustus|september|oktober|november|desember)\s+(\d{4})',
        user_input.lower()
    )

    if date_text_match:

        day = date_text_match.group(1).zfill(2)

        month = months[
            date_text_match.group(2)
        ]

        year = date_text_match.group(3)

        update_session(
            user_id,
            "tanggal",
            f"{year}-{month}-{day}"
        )

    phone_match = re.search(
        r'08\d{8,12}',
        user_input
    )

    if phone_match:

        update_session(
            user_id,
            "nomor_telepon",
            phone_match.group()
        )

    orang_match = re.search(
        r'orang[: ]*(\d+)',
        user_input.lower()
    )

    if not orang_match:

        orang_match = re.search(
            r'(\d+)\s*orang',
            user_input.lower()
        )

    if orang_match:

        update_session(
            user_id,
            "jumlah_orang",
            int(
                orang_match.group(1)
            )
        )

    time_match = re.search(
        r'(\d{2}:\d{2})',
        user_input
    )

    if time_match:

        update_session(
            user_id,
            "requested_time",
            time_match.group(1)
        )