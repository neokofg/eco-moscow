FROM python:3.11-slim

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir -r requirements.txt

COPY . .

EXPOSE 50051
RUN python -m nltk.downloader punkt punkt_tab
CMD ["python", "main.py"]
