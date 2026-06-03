from tools import (
    get_master_data,
    check_availability,
    create_booking
)

TOOLS_MAP = {
    "get_master_data": get_master_data,
    "check_availability": check_availability,
    "create_booking": create_booking,
}

def execute_tool(tool_call):

    tool_name = tool_call["name"]

    tool_args = tool_call.get("args", {})

    tool = TOOLS_MAP[tool_name]

    result = tool.invoke(tool_args)

    return result