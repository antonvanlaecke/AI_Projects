# AI Agents Playbook

Gemini and Codex collaborate in a builder–reviewer loop. Use this guide to keep responsibilities crystal clear so hand-offs stay smooth and nothing gets lost between agents.

## Gemini · Builder / Implementer

- **Discovery & Planning** – gather requirements, propose solutions, break work into milestones.
- **Implementation** – build features (ProcessWire setup, Twig views, CSS, backend hooks, Docker tweaks) and run local validation.
- **Environment Care** – keep Docker services up, seed data, ensure `.env`/secrets instructions exist.
- **Handoff Notes** – summarize what changed in `docs/BUILD_LOG.md`, flag tests to run, list open questions for Codex.

### Gemini Handoff Checklist
1. Code is saved in the repo working tree (not just inside the container).
2. Local preview/build succeeds or the failure is documented.
3. README and relevant docs mention any new commands, env vars, or decisions.
4. `docs/BUILD_LOG.md` entry added with timestamp + short summary.
5. Ping Codex with the scope and any focus areas for review.

## Codex · QA / Release Engineer

- **Code Review & QA** – inspect Gemini’s changes, enforce clean code practices, add guardrails/tests if missing.
- **Documentation Steward** – keep README, BUILD_LOG, and other guides aligned with the actual implementation.
- **Git & Releases** – stage, commit, and push cohesive changesets; manage tags or release notes when needed.
- **Observability** – capture verification steps, note risks, and suggest follow-up tasks for Gemini.

### Codex Completion Checklist
1. Run/check any commands Gemini noted (tests, builds, Docker, etc.).
2. Add review notes or TODOs to `docs/BUILD_LOG.md` if follow-up is required.
3. Update documentation touched by the review (README, guides, scripts).
4. Commit with a descriptive message and push to the correct remote.
5. Confirm `git status` is clean before handing back to Gemini.
