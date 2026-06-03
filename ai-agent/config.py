import os
from dotenv import load_dotenv

load_dotenv()

OPENROUTER_API_KEY = os.getenv("OPENROUTER_API_KEY")

LARAVEL_API_URL = os.getenv(
    "LARAVEL_API_URL",
    "http://127.0.0.1:8000/api/ai"
)

MODEL_NAME = os.getenv(
    "MODEL_NAME",
    "deepseek/deepseek-chat-v3"
)