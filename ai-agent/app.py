from langchain_openai import ChatOpenAI

from config import (
    OPENROUTER_API_KEY,
    MODEL_NAME
)

from prompts import SYSTEM_PROMPT

from memory import (
    get_session
)

from tools import (
    get_master_data
)

from booking_parser import (
    parse_booking_input
)

from booking_service import (
    process_availability,
    process_time_selection,
    process_booking
)


llm = ChatOpenAI(
    model=MODEL_NAME,
    api_key=OPENROUTER_API_KEY,
    base_url="https://openrouter.ai/api/v1",
)

USER_ID = "local_user"


while True:

    user_input = input(
        "User : "
    ).strip()

    if user_input.lower() == "exit":
        break

    # ==========================
    # TAMPILKAN OUTLET
    # ==========================

    if (
        "outlet" in user_input.lower()
        and "banyumanik" not in user_input.lower()
    ):

        data = get_master_data.invoke({})

        print()
        print("Outlet tersedia:")
        print()

        for studio in data["studios"]:

            print(
                "-",
                studio["nama"]
            )

        print()

        continue

    # ==========================
    # PARSER
    # ==========================

    parse_booking_input(
        USER_ID,
        user_input
    )

    # ==========================
    # SESSION
    # ==========================

    session = get_session(
        USER_ID
    )

    print()
    print("SESSION:")
    print(session)
    print()

    # ==========================
    # CEK AVAILABILITY
    # ==========================

    availability = process_availability(
        USER_ID
    )

    session = get_session(USER_ID)

    if (
        availability
        and not session.get("waktu_id")
    ):

        print()
        print(
            f"Outlet : {availability['studio_name']}"
        )

        print(
            f"Tanggal : {availability['tanggal']}"
        )

        print()

        print(
            "Slot tersedia:"
        )

        for slot in availability[
            "available_slots"
        ]:

            print(
                "-",
                slot["waktu"]
            )

        print()

    # ==========================
    # PILIH JAM MANUAL
    # ==========================

    process_time_selection(
        USER_ID,
        user_input
    )

    # ==========================
    # CREATE BOOKING
    # ==========================

    result = process_booking(
        USER_ID
    )

    if result:
        continue

    # ==========================
    # FALLBACK AI
    # ==========================

    session = get_session(
        USER_ID
    )

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
    print(
        "AI :",
        response.content
    )
    print()