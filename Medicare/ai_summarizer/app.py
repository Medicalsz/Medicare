from pathlib import Path

from flask import Flask, jsonify, request

from summarizer import summarize_text, validate_dataset


app = Flask(__name__)


@app.get("/health")
def health() -> tuple[dict[str, str], int]:
    return {"status": "ok"}, 200


@app.post("/summarize")
def summarize() -> tuple[object, int]:
    payload = request.get_json(silent=True) or {}
    text = str(payload.get("text", "")).strip()

    if text == "":
        return jsonify({"error": "Field 'text' is required."}), 400

    summary = summarize_text(text, max_chars=200)
    return jsonify({"summary": summary}), 200


@app.get("/validate")
def validate() -> tuple[object, int]:
    dataset_path = Path(__file__).resolve().parent / "dataset.json"
    result = validate_dataset(dataset_path)
    return jsonify(result), 200


if __name__ == "__main__":
    app.run(host="127.0.0.1", port=5000, debug=False)
