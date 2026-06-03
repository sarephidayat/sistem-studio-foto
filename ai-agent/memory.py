import json
import os


MEMORY_FILE = "memory/sessions.json"

def load_memory():

    if not os.path.exists(MEMORY_FILE):
        return {}

    with open(
        MEMORY_FILE,
        "r",
        encoding="utf-8"
    ) as file:

        return json.load(file)
    
def save_memory(data):

    with open(
        MEMORY_FILE,
        "w",
        encoding="utf-8"
    ) as file:

        json.dump(
            data,
            file,
            indent=4,
            ensure_ascii=False
        )

def get_session(user_id):

    data = load_memory()

    if user_id not in data:

        data[user_id] = {
            "studio_id": None,
            "studio_name": None,
            "tanggal": None,
            "waktu_id": None,
            "jumlah_orang": None,
            "nomor_telepon": None
        }

        save_memory(data)

    return data[user_id]

def update_session(
    user_id,
    key,
    value
):

    data = load_memory()

    if user_id not in data:

        data[user_id] = {}

    data[user_id][key] = value

    save_memory(data)


def clear_session(user_id):

    data = load_memory()

    if user_id in data:

        del data[user_id]

    save_memory(data)