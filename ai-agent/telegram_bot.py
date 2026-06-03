from telegram import Update
from telegram.ext import (
    Application,
    MessageHandler,
    filters,
    ContextTypes
)

from langchain_openai import ChatOpenAI

from config import (
    OPENROUTER_API_KEY,
    MODEL_NAME
)
from booking_parser import (
    parse_booking_input
)
from booking_service import (
    process_availability,
    process_time_selection,
    process_booking
)

from memory import (
    get_session
)
from prompts import SYSTEM_PROMPT

BOT_TOKEN = "8934613318:AAGX7ME-PCsd-ZWa0k4RIF1wDOV-bgEan1s"


llm = ChatOpenAI(
    model=MODEL_NAME,
    api_key=OPENROUTER_API_KEY,
    base_url="https://openrouter.ai/api/v1",
)


async def handle_message(
    update: Update,
    context: ContextTypes.DEFAULT_TYPE
):

    user_id = str(
        update.effective_user.id
    )

    text = update.message.text

    print(
        f"USER ID: {user_id}"
    )

    print(
        f"TEXT: {text}"
    )

    # =====================
    # PARSER
    # =====================

    parse_booking_input(
        user_id,
        text
    )

    session = get_session(
        user_id
    )

    print()
    print("SESSION:")
    print(session)
    print()

    availability = process_availability(
        user_id
    )
    if session.get("waktu_id"):

        booking_result = process_booking(
            user_id
        )

        if booking_result:

            await update.message.reply_text(
                f"""
    ✅ Booking berhasil dibuat

    Booking ID:
    {booking_result['booking_id']}
    """
            )

            return

    if availability:

        slots = "\n".join(
            [
                slot["waktu"]
                for slot in availability[
                    "available_slots"
                ]
            ]
        )

        await update.message.reply_text(
            f"""
    Outlet: {availability['studio_name']}
    Tanggal: {availability['tanggal']}

    Slot tersedia:

    {slots}
    """
        )

        return


    # ==========================
    # PILIH JAM
    # ==========================

    message = process_time_selection(
        user_id,
        text
    )

    if message:

        await update.message.reply_text(
            message
        )


    # ==========================
    # CREATE BOOKING
    # ==========================

    booking_result = process_booking(
        user_id
    )

    if booking_result:

        await update.message.reply_text(
            f"""
    ✅ Booking berhasil dibuat

    Booking ID:
    {booking_result['booking_id']}
    """
        )

        return
    
    session = get_session(
        user_id
    )
    
    response = llm.invoke(
        f"""
        {SYSTEM_PROMPT}

        Session User:

        {session}

        User:
        {text}
        """
    )

    await update.message.reply_text(
        response.content
    )

app = Application.builder().token(
    BOT_TOKEN
).build()

app.add_handler(
    MessageHandler(
        filters.TEXT,
        handle_message
    )
)

print("Bot Running...")

app.run_polling()