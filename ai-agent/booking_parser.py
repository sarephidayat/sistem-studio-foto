import re

from tools import get_master_data

from memory import (
    update_session
)


def parse_booking_input(
    user_id,
    user_input
):

    if "banyumanik" in user_input.lower():

        data = get_master_data.invoke({})

        for studio in data["studios"]:

            if "banyumanik" in studio["nama"].lower():

                update_session(
                    user_id,
                    "studio_id",
                    studio["id"]
                )

                if "kota_id" in studio:

                    update_session(
                        user_id,
                        "kota_id",
                        studio["kota_id"]
                    )

                update_session(
                    user_id,
                    "studio_name",
                    studio["nama"]
                )

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