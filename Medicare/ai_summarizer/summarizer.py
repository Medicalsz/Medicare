import json
import math
import re
import unicodedata
from pathlib import Path
from typing import Any

import networkx as nx


STOPWORDS_FR = {
    "a", "ai", "aie", "aient", "aies", "ait", "as", "au", "aucun", "aussi", "autre", "aux", "avec",
    "avoir", "bon", "car", "ce", "cela", "ces", "ceux", "chaque", "ci", "comme", "comment", "dans",
    "de", "des", "du", "dedans", "dehors", "depuis", "devrait", "doit", "donc", "dos", "droite", "debut",
    "elle", "elles", "en", "encore", "essai", "est", "et", "eu", "fait", "faites", "fois", "font", "force",
    "haut", "hors", "ici", "il", "ils", "je", "juste", "la", "le", "les", "leur", "la", "ma", "maintenant",
    "mais", "mes", "mine", "moins", "mon", "mot", "meme", "ni", "nommes", "notre", "nous", "nouveaux", "ou",
    "ou", "par", "parce", "parole", "pas", "personnes", "peut", "peu", "piece", "plupart", "pour", "pourquoi",
    "quand", "que", "quel", "quelle", "quelles", "quels", "qui", "sa", "sans", "ses", "seulement", "si", "sien",
    "son", "sont", "sous", "soyez", "sujet", "sur", "ta", "tandis", "tellement", "tels", "tes", "ton", "tous",
    "tout", "trop", "tres", "tu", "valeur", "voie", "voient", "vont", "votre", "vous", "vu", "ca", "etaient",
    "etat", "etions", "ete", "etre",
}


def split_sentences(text: str) -> list[str]:
    cleaned = re.sub(r"\s+", " ", text).strip()
    if not cleaned:
        return []
    parts = re.split(r"(?<=[.!?])\s+", cleaned)
    return [p.strip() for p in parts if p.strip()]


def normalize_token(token: str) -> str:
    token = token.lower()
    token = unicodedata.normalize("NFD", token)
    token = "".join(ch for ch in token if unicodedata.category(ch) != "Mn")
    return token


def tokenize(sentence: str) -> list[str]:
    raw_tokens = re.findall(r"[A-Za-zÀ-ÖØ-öø-ÿ]+", sentence)
    tokens = [normalize_token(tok) for tok in raw_tokens]
    return [tok for tok in tokens if tok and tok not in STOPWORDS_FR and len(tok) > 1]


def cosine_similarity(tokens_a: list[str], tokens_b: list[str]) -> float:
    if not tokens_a or not tokens_b:
        return 0.0

    freq_a: dict[str, int] = {}
    freq_b: dict[str, int] = {}

    for token in tokens_a:
        freq_a[token] = freq_a.get(token, 0) + 1
    for token in tokens_b:
        freq_b[token] = freq_b.get(token, 0) + 1

    common = set(freq_a).intersection(freq_b)
    numerator = sum(freq_a[t] * freq_b[t] for t in common)

    norm_a = math.sqrt(sum(v * v for v in freq_a.values()))
    norm_b = math.sqrt(sum(v * v for v in freq_b.values()))

    if norm_a == 0 or norm_b == 0:
        return 0.0

    return numerator / (norm_a * norm_b)


def _normalize_for_compare(text: str) -> str:
    return re.sub(r"\s+", " ", text).strip().lower()


def _truncate_summary(text: str, min_chars: int = 180, max_chars: int = 220) -> str:
    value = re.sub(r"\s+", " ", text).strip()
    if len(value) <= max_chars:
        return value

    cut = value.rfind(".", min_chars, max_chars + 1)
    if cut == -1:
        cut = value.rfind(" ", min_chars, max_chars + 1)
    if cut == -1:
        cut = max_chars

    trimmed = value[:cut].strip(" ,;:")
    if not trimmed.endswith((".", "!", "?")):
        trimmed += "..."
    return trimmed


def _force_distinct_summary(summary: str, source_text: str) -> str:
    if _normalize_for_compare(summary) != _normalize_for_compare(source_text):
        return summary

    words = summary.split()
    if len(words) > 18:
        compact = " ".join(words[:18]).rstrip(" ,;:")
        if not compact.endswith((".", "!", "?")):
            compact += "."
        return compact

    return "Resume: " + summary


def summarize_text(text: str, max_chars: int = 200) -> str:
    source = re.sub(r"\s+", " ", text).strip()
    sentences = split_sentences(source)
    if not sentences:
        return ""

    sentence_tokens = [tokenize(s) for s in sentences]

    graph = nx.Graph()
    for i in range(len(sentences)):
        graph.add_node(i)

    for i in range(len(sentences)):
        for j in range(i + 1, len(sentences)):
            score = cosine_similarity(sentence_tokens[i], sentence_tokens[j])
            if score > 0:
                graph.add_edge(i, j, weight=score)

    if graph.number_of_edges() > 0:
        try:
            scores = nx.pagerank(graph, weight="weight")
        except Exception:
            # Fallback that does not require optional numeric deps (numpy/scipy).
            scores = {
                i: sum(data.get("weight", 0.0) for _, _, data in graph.edges(i, data=True))
                for i in range(len(sentences))
            }
    else:
        scores = {i: 1.0 for i in range(len(sentences))}
    ranked = sorted(scores.items(), key=lambda item: item[1], reverse=True)

    best_index = ranked[0][0]
    summary = sentences[best_index]
    summary = _force_distinct_summary(summary, source)
    summary = _truncate_summary(summary, min_chars=max(120, max_chars - 40), max_chars=max_chars)

    return summary


def token_set(text: str) -> set[str]:
    return set(tokenize(text))


def jaccard_similarity(a: str, b: str) -> float:
    set_a = token_set(a)
    set_b = token_set(b)
    if not set_a or not set_b:
        return 0.0
    return len(set_a.intersection(set_b)) / len(set_a.union(set_b))


def validate_dataset(dataset_path: str | Path) -> dict[str, Any]:
    path = Path(dataset_path)
    # Accept UTF-8 files with or without BOM to avoid JSON decode failures on Windows-edited files.
    data = json.loads(path.read_text(encoding="utf-8-sig"))

    samples: list[dict[str, Any]] = []
    total_score = 0.0

    for item in data:
        source = str(item.get("text", ""))
        reference = str(item.get("summary", ""))
        prediction = summarize_text(source)
        score = jaccard_similarity(reference, prediction)
        samples.append(
            {
                "score": round(score, 4),
                "reference_summary": reference,
                "predicted_summary": prediction,
            }
        )
        total_score += score

    average_score = total_score / len(samples) if samples else 0.0

    return {
        "samples": samples,
        "average_jaccard": round(average_score, 4),
        "count": len(samples),
    }
