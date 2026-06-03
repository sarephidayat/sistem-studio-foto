from memory import *

update_session(
    "local_user",
    "studio_id",
    8
)

session = get_session(
    "local_user"
)

print(session)