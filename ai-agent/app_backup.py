from langchain_openai import ChatOpenAI

# from tools import get_master_data
from tools import (
    get_master_data,
    check_availability,
    create_booking
)
from memory import (
    get_session,
    update_session,
    clear_session
)

from config import (
    OPENROUTER_API_KEY,
    MODEL_NAME
)

from prompts import SYSTEM_PROMPT

import re


llm = ChatOpenAI(
    model=MODEL_NAME,
    api_key=OPENROUTER_API_KEY,
    base_url="https://openrouter.ai/api/v1",
)


USER_ID = "local_user"


while True:

    user_input = input("User : ").strip()

    if user_input.lower() == "exit":
        break

    # =====================================
    # TAMPILKAN DAFTAR OUTLET
    # =====================================

    if (
        "outlet" in user_input.lower()
        and "banyumanik" not in user_input.lower()
    ):

        data = get_master_data.invoke({})

        print("\nOutlet tersedia:\n")

        for studio in data["studios"]:
            print("-", studio["nama"])

        print()

        continue

    # =====================================
    # PILIH OUTLET BANYUMANIK
    # =====================================

    if "banyumanik" in user_input.lower():

        data = get_master_data.invoke({})

        for studio in data["studios"]:

            if "banyumanik" in studio["nama"].lower():

                update_session(
                    USER_ID,
                    "studio_id",
                    studio["id"]
                )
                # update_session(
                #     USER_ID,
                #     "kota_id",
                    
                # )
                if "kota_id" in studio:

                    update_session(
                        USER_ID,
                        "kota_id",
                        studio["kota_id"]
                    )

                update_session(
                    USER_ID,
                    "studio_name",
                    studio["nama"]
                )
                

        session = get_session(USER_ID)

        print()
        print(
            f"Baik, Anda memilih {session['studio_name']}"
        )
        print(
            "Tanggal berapa yang ingin dibooking?"
        )
        print()

        print("SESSION:")
        print(session)
        print()

        pass

    # =====================================
    # TANGKAP TANGGAL
    # FORMAT:
    # 2026-06-03
    # =====================================

    date_match = re.search(
        r'(\d{4}-\d{2}-\d{2})',
        user_input
    )

    if date_match:

        update_session(
            USER_ID,
            "tanggal",
            date_match.group(1)
        )

    # =====================================
    # TANGKAP NOMOR HP
    # =====================================

    phone_match = re.search(
        r'08\d{8,12}',
        user_input
    )

    if phone_match:

        update_session(
            USER_ID,
            "nomor_telepon",
            phone_match.group()
        )

    # =====================================
    # TANGKAP JUMLAH ORANG
    # contoh:
    # orang 2
    # orang:2
    # =====================================

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

        jumlah_orang = (
            orang_match.group(1)
        )

        update_session(
            USER_ID,
            "jumlah_orang",
            int(jumlah_orang)
        )

        print(
            f"JUMLAH ORANG TERDETEKSI: {jumlah_orang}"
        )

    # =====================================
    # TANGKAP JAM
    # =====================================
    time_match = re.search(
        r'(\d{2}:\d{2})',
        user_input
    )

    if time_match:

        update_session(
            USER_ID,
            "requested_time",
            time_match.group(1)
        )

        print(
            f"JAM TERDETEKSI: {time_match.group(1)}"
        )

    # =====================================
    # REFRESH SESSION
    # =====================================

    session = get_session(USER_ID)

    print()
    print("SESSION:")
    print(session)
    print()

    if session.get("awaiting_time_selection"):

        time_match = re.search(
            r'(\d{2}:\d{2})',
            user_input
        )

        if time_match:

            selected_time = time_match.group(1)

            for slot in session.get(
                "available_slots",
                []
            ):

                if slot["waktu"] == selected_time:

                    update_session(
                        USER_ID,
                        "waktu_id",
                        slot["id"]
                    )

                    update_session(
                        USER_ID,
                        "waktu",
                        slot["waktu"]
                    )

                    update_session(
                        USER_ID,
                        "awaiting_time_selection",
                        False
                    )

                    session = get_session(USER_ID)

                    print()
                    print(
                        f"Jam dipilih: {slot['waktu']}"
                    )
                    print()

                    break

    # =====================================
    # CEK APAKAH DATA SUDAH LENGKAP
    # =====================================
    session = get_session(USER_ID)

    if (
        session.get("studio_id")
        and session.get("kota_id")
        and session.get("tanggal")
        and session.get("jumlah_orang")
        and session.get("nomor_telepon")
        and session.get("waktu_id")
    ):

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

        print()
        if result.get("success"):

            clear_session(USER_ID)

            print()
            print("BOOKING BERHASIL")
            print(result)
            print("SESSION DIHAPUS")
            print()

        else:

            print(result)

        continue

    

    if (
        session.get("studio_id")
        and session.get("tanggal")
        and session.get("jumlah_orang")
        and session.get("nomor_telepon")
        and not session.get("awaiting_time_selection")
        and not session.get("waktu_id")
    ):
        

        availability = check_availability.invoke(
            {
                "studio_id": session["studio_id"],
                "tanggal": session["tanggal"]
            }
        )
        print(availability)
        update_session(
            USER_ID,
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
                        USER_ID,
                        "waktu_id",
                        slot["id"]
                    )

                    update_session(
                        USER_ID,
                        "waktu",
                        slot["waktu"]
                    )

                    update_session(
                        USER_ID,
                        "awaiting_time_selection",
                        False
                    )

                    print()
                    print(
                        f"Jam otomatis dipilih: {slot['waktu']}"
                    )
                    print()

                    break

        session = get_session(USER_ID)

        if not session.get("waktu_id"):

            update_session(
                USER_ID,
                "awaiting_time_selection",
                True
            )

        print()
        print(
            f"Outlet : {availability['studio_name']}"
        )
        print(
            f"Tanggal : {availability['tanggal']}"
        )
        print()

        print("Slot tersedia:")

        for slot in availability[
            "available_slots"
        ]:

            print(
                "-",
                slot["waktu"]
            )

        print()

        continue
    
    print("INPUT:", user_input)

    orang_match = re.search(
        r'orang[: ]*(\d+)',
        user_input.lower()
    )

    print("ORANG MATCH:", orang_match)

    # =====================================
    # FALLBACK KE AI
    # =====================================

    response = llm.invoke(
        f"""
        {SYSTEM_PROMPT}

        Data booking saat ini:

        {session}

        User:
        {user_input}
        """
    )

    print()
    print("AI :", response.content)
    print()