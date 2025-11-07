# AI Projects Workspace

This repo hosts the AI-powered portfolio that Gemini is building and Codex is supervising. It combines ProcessWire/Twig scaffolding, Docker tooling, and documentation so we can iterate on the site while keeping quality high.

## Repository Map

- `site/` – ProcessWire-ready assets:
  - `templates/` (Twig views + layout)
  - `assets/css/style.css`
  - `modules/Setup.php` (provisioning placeholder)
- `index.html` – static preview that mirrors the Twig structure so the site can already be viewed in Docker.
- `Dockerfile` + `docker-compose.yml` – PHP 8.2 + Apache stack with MySQL 8 for the CMS install.
- `docs/BUILD_LOG.md` – timeline of actions performed by Gemini (builder) and Codex (QA).
- `scripts/codex_review.sh` – helper that stages, commits, and pushes Codex review passes.
- `AGENTS.md`, `GEMINI.md`, `CODEX_GUIDE.md` – describe the agent workflow.

## Workflow at a Glance

1. Gemini prototypes features/content (see `GEMINI.md` for remit) and keeps Docker running.
2. Codex reviews, documents, and keeps the repo clean (`docs/BUILD_LOG.md`).
3. Use the Docker preview to validate UI, then translate the same structure into ProcessWire templates once the CMS install is ready.

## Current Status (2025‑11‑07)

- Static preview (`index.html`) now mirrors the Twig layout including the light/dark toggle and shared CSS/JS.
- Docker stack was stopped after verification (`docker compose down`). Restart with `docker compose up --build -d` when you need it again.
- ProcessWire core files still live outside Git; only the custom `site/` directory is tracked.

## Git Setup (already configured)

Remote: `https://github.com/antonvanlaecke/AI_Projects.git`

If cloning on another machine:

```bash
git clone https://github.com/antonvanlaecke/AI_Projects.git
cd AI_Projects
```

## Run / Inspect the Preview

Gemini already spun up Docker, but these are the commands to start/stop it yourself:

```bash
docker compose up --build -d   # starts PHP/Apache + MySQL
open http://localhost:8080     # view the static preview (index.html) served from /var/www/html
docker compose logs -f web     # tail Apache + PHP logs
docker compose down            # stop and remove containers/volumes
```

### What you should see

- `index.html` renders the landing page preview with project cards, highlight grid, and skills list.
- CSS is shared with ProcessWire templates (`site/assets/css/style.css`), so the visual system matches the Twig implementation.
- Dark/light toggle in the header (powered by `site/assets/css/dark.css` + `site/assets/js/theme.js`).

> ProcessWire core files (`wire/` etc.) are not committed. Install them inside Docker via the official ZIP or Composer when you are ready to hook up the CMS. The repo only contains the custom `site/` directory and supporting tooling.

## Documentation Trail

- `docs/BUILD_LOG.md` – append every notable action with timestamp/actor/notes so we can audit progress.
- Inline comments stay intentionally sparse; reference docs should explain decisions instead.

## Next Technical Steps

1. Finish the ProcessWire installer inside Docker (already running at `http://localhost:8080/install.php` earlier) and point Apache to the CMS front controller.
2. Wire `site/templates` into ProcessWire (update template settings, fields, and module provisioning).
3. Extend `scripts/codex_review.sh` with linting/tests once PHP logic lands.
4. Add environment variables/secrets documentation once external AI APIs enter the stack.
