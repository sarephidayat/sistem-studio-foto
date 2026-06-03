import re

from tools import (
    check_availability,
    create_booking
)

from memory import (
    get_session,
    update_session,
    clear_session
)


def process_availability(user_id):

    session = get_session(user_id)

    required_fields = [
        "studio_id",
        "tanggal",
        "jumlah_orang",
        "nomor_telepon"
    ]

    if not all(
        session.get(field)
        for field in required_fields
    ):
        return None
    
    if session.get("available_slots"):
        return None

    availability = check_availability.invoke(
        {
            "studio_id": session["studio_id"],
            "tanggal": session["tanggal"]
        }
    )

    update_session(
        user_id,
        "available_slots",
        availability["available_slots"]
    )

    requested_time = session.get(
        "requested_time"
    )

    if requested_time:

        for slot in availability[
            "available_slots"
        ]:

            if slot["waktu"] == requested_time:

                update_session(
                    user_id,
                    "waktu_id",
                    slot["id"]
                )

                update_session(
                    user_id,
                    "waktu",
                    slot["waktu"]
                )
                update_session(
                    user_id,
                    "requested_time",
                    None
                )

                update_session(
                    user_id,
                    "awaiting_time_selection",
                    False
                )

                print(
                    f"Jam otomatis dipilih: {slot['waktu']}"
                )

                break

    session = get_session(user_id)

    if not session.get("waktu_id"):

        update_session(
            user_id,
            "awaiting_time_selection",
            True
        )

    return availability


def process_time_selection(
    user_id,
    user_input
):

    session = get_session(user_id)

    if not session.get(
        "awaiting_time_selection"
    ):
        return

    time_match = re.search(
        r'(\d{2}:\d{2})',
        user_input
    )

    if not time_match:
        return

    selected_time = time_match.group(1)

    for slot in session.get(
        "available_slots",
        []
    ):

        if slot["waktu"] == selected_time:

            update_session(
                user_id,
                "waktu_id",
                slot["id"]
            )

            update_session(
                user_id,
                "waktu",
                slot["waktu"]
            )

            update_session(
                user_id,
                "awaiting_time_selection",
                False
            )

            print()
            print(
                f"Jam dipilih: {slot['waktu']}"
            )
            print()

            break


def process_booking(user_id):

    session = get_session(user_id)

    required_fields = [
        "studio_id",
        "kota_id",
        "tanggal",
        "waktu_id",
        "jumlah_orang",
        "nomor_telepon"
    ]

    if not all(
        session.get(field)
        for field in required_fields
    ):
        return None

    result = create_booking.invoke(
        {
            "studio_id": session["studio_id"],
            "kota_id": session["kota_id"],
            "tanggal": session["tanggal"],
            "waktu_id": session["waktu_id"],
            "jumlah_orang": session["jumlah_orang"],
            "nomor_telepon": session["nomor_telepon"]
        }
    )

    if result.get("success"):

        clear_session(user_id)

        print()
        print("BOOKING BERHASIL")
        print(result)
        print("SESSION DIHAPUS")
        print()

    else:

        print(result)

    return result