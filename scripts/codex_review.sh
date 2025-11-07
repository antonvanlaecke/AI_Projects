#!/usr/bin/env bash

set -euo pipefail

ROOT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")/.." && pwd)"
cd "$ROOT_DIR"

if ! command -v git >/dev/null 2>&1; then
  echo "Git is required for the Codex workflow; please install it first." >&2
  exit 1
fi

if ! git rev-parse --is-inside-work-tree >/dev/null 2>&1; then
  echo "Initialize a Git repository (git init) before running the Codex review script." >&2
  exit 1
fi

echo "== Codex review checklist =="
git status -sb || true

README_FILE="${ROOT_DIR}/README.md"
if [[ ! -f "$README_FILE" ]]; then
  echo "README.md is missing. Create one so documentation stays in sync with the project." >&2
  exit 1
fi

git add -A

if git diff --cached --quiet; then
  echo "Nothing staged for commit; skipping git commit/push."
  exit 0
fi

COMMIT_MSG=${1:-"chore: codex review pass"}
git commit -m "$COMMIT_MSG"

if git config remote.origin.url >/dev/null; then
  git push
else
  echo "No remote named 'origin' configured; skipping git push."
fi
