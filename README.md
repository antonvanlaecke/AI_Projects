# AI Projects Workspace

This workspace is a sandbox for experimenting with AI-assisted development workflows.
It combines multiple AI agents, lightweight scripts and documentation so you can plan,
build and review portfolio-ready projects that highlight creative AI capabilities.

## Repository Contents

- `GEMINI.md` – feature-focused brief that Gemini (the primary assistant) uses to ideate and
  generate code or content.
- `CODEX_GUIDE.md` – quality and strategy playbook that Codex (the QA assistant) follows when
  reviewing work.
- `AGENTS.md` – quick reference for each agent's role in the workflow.
- `scripts/codex_review.sh` – helper executed by Codex to run checks and manage commits.

## Workflow Cheatsheet

1. Ideate or build with `gemini`, guided by `GEMINI.md`.
2. Hand work off to `codex`:
   - review the changes,
   - ensure documentation (including this README) reflects reality,
   - prepare the Git history.
3. Use `scripts/codex_review.sh` to automate Codex’s checklist (see script for details).

## Getting Started

1. Keep project-specific docs close to the code (e.g., add `/docs` or `/src` folders as the
   prototype evolves).
2. Record manual steps or decisions inside `README.md` so Codex can keep future reviews grounded.

## Git Setup (step by step)

Run these commands from the project root (`/Users/antonvanlaecke/Code/AI_Projects`):

1. `git init` – creates a new Git repository in the current folder.
2. `git branch -M main` – renames the default branch to `main`.
3. `git remote add origin https://github.com/antonvanlaecke/AI_Projects.git` – connects the repo to the hosted origin. (Use `git@github.com:antonvanlaecke/AI_Projects.git` if you prefer SSH.)
4. `git status -sb` – verify Git sees your files as expected.
5. `git add . && git commit -m "chore: initial commit"` – capture the initial snapshot.
6. `git push -u origin main` – pushes your `main` branch and sets the upstream for future pushes.

## Next Steps

- Flesh out the actual application (e.g., ProcessWire/Twig scaffold described in `GEMINI.md`).
- Expand automation in `scripts/codex_review.sh` with linting or test hooks once code exists.
- Document environment variables, deployment targets and data-flow diagrams as they emerge.
