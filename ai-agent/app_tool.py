from langchain_openai import ChatOpenAI
from langchain_core.messages import HumanMessage
from agent import execute_tool
from config import (
    OPENROUTER_API_KEY,
    MODEL_NAME
)

from tools import TOOLS

llm = ChatOpenAI(
    model=MODEL_NAME,
    api_key=OPENROUTER_API_KEY,
    base_url="https://openrouter.ai/api/v1",
)

llm_with_tools = llm.bind_tools(TOOLS)

response = llm_with_tools.invoke(
    [
        HumanMessage(
            content="Tampilkan daftar outlet yang tersedia"
        )
    ]
)
tool_call = response.tool_calls[0]


result = execute_tool(tool_call)
final_response = llm.invoke(
    f"""
    User meminta daftar outlet studio.

    Berikut data dari sistem:

    {result}

    Tampilkan daftar outlet yang tersedia
    dengan format yang rapi dan mudah dibaca.
    """
)

print()
print("JAWABAN AKHIR:")
print(final_response.content)

print()