from langchain_openai import ChatOpenAI
from langchain_core.messages import HumanMessage

from tools import TOOLS
from agent import execute_tool

from config import (
    OPENROUTER_API_KEY,
    MODEL_NAME
)

llm = ChatOpenAI(
    model=MODEL_NAME,
    api_key=OPENROUTER_API_KEY,
    base_url="https://openrouter.ai/api/v1",
)

llm_with_tools = llm.bind_tools(TOOLS)

response = llm_with_tools.invoke(
    [
        HumanMessage(
            content="""
            Gunakan tool yang tersedia
            untuk mengecek ketersediaan booking.

            studio_id = 8
            tanggal = 2026-06-10
            """
        )
    ]
)


# print(response)
# print(response.tool_calls)
tool_call = response.tool_calls[0]
result = execute_tool(tool_call)

print("HASIL TOOL:")
print(result)

final_response = llm.invoke(
    f"""
    User ingin melihat slot yang tersedia.

    Berikut hasil dari sistem:

    {result}

    Tampilkan slot yang tersedia
    dengan format yang rapi.
    """
)
print()
print(final_response.content)
