# AI-Powered Portfolio Project

## Project Overview

This project aims to create a stunning AI-powered website to showcase the capabilities of artificial intelligence. The website will be a part of my portfolio and will demonstrate how to use AI in a creative and meaningful way. The project will involve using multiple AI models to create a unique and engaging user experience.

## Gemini’s Mandate

Gemini owns the **make it real** portion of the workflow:

1. **Plan & scope** each iteration: outline which feature, page, or integration you are about to build.
2. **Implement** the feature inside this repository (Twig templates, ProcessWire setup, assets, Docker config, etc.).
3. **Validate** locally (Docker preview, lint/tests) and note results.
4. **Document** everything you touched:
   - Update `docs/BUILD_LOG.md` with timestamp, summary, and blockers (if any).
   - Extend README or other guides when commands, env vars, or architecture decisions change.
5. **Hand off** to Codex with a short checklist of what needs review (link to files, tests to rerun, risks to double-check).

## Key Features

* **Multi-Model Integration:** The website will integrate with multiple AI models to provide a variety of features.
* **Creative AI:** The project will explore creative applications of AI, such as generating art, music, or text.
* **Educational Content:** The website will also include educational content about AI and how it can be used in different fields.
* **Interactive Demos:** The project will feature interactive demos that allow users to experience the power of AI firsthand.

## Technology Stack

* **Backend:** PHP with ProcessWire
* **Frontend:** Twig
* **AI Models:** Currently using OpenAI and Gemini. Future plans include integrating more AI models, such as Cloud Code.
* **Supervision:** OpenAI Codex will be used to supervise the project and ensure high-quality code and documentation.

## Integration with Portfolio

This project will be a key part of my portfolio. It will be integrated with my existing portfolio website, which is built with PHP and ProcessWire. The project will be showcased in a dedicated section of my portfolio, with a detailed description of the project and its features.

## Workflow

This project uses a new workflow that is designed to make your development process more efficient. The workflow is based on the concept of AI agents, which are AI assistants that are specialized in different tasks.

### How to use the AI agents

To use the AI agents, you will need to use the following commands:

* `gemini`: This command will activate the Gemini agent, which is the primary AI assistant for this project.
* `codex`: This command will activate the Codex agent, which is the quality assurance AI assistant for this project.

### The development process

1. Pick or define the next task (feature, fix, refactor) and log it in `docs/BUILD_LOG.md` once you start.
2. Implement the change set, update docs/README/scripts as needed, and validate locally (Docker build, PHP checks, etc.).
3. Summarize the outcome plus any open questions in `docs/BUILD_LOG.md`, then signal Codex for review.
4. Codex reviews, hardens, documents, and pushes the changes; respond to any follow-up notes before starting the next task.

This workflow is designed to help you to work more efficiently and to produce high-quality code. By using the AI agents, you can offload some of the more tedious and time-consuming tasks to the AI assistants, which will free you up to focus on the more creative and challenging aspects of your work.

## Documentation

The project will be well-documented, with clear and concise explanations of the code and how it works. The documentation will be generated with the help of OpenAI Codex and will be a valuable resource for anyone who wants to learn more about the project.

### Gemini Handoff Packet

Before pinging Codex, make sure the following items are ready:

- ✅ Source files updated and saved inside the repo (not only inside the running container).
- ✅ `docs/BUILD_LOG.md` appended with timestamp, actor (Gemini), summary, verification steps, and any TODOs for Codex.
- ✅ README or other guides refreshed if commands, env vars, or dependencies changed.
- ✅ Screenshots or log snippets attached (when relevant) if a UI/CLI flow needs visual confirmation.
- ✅ Tests or manual verification steps listed so Codex can re-run them quickly.
