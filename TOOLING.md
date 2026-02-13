# Tooling Overview

This project uses a modern Laravel tooling stack focused on
clarity, consistency, and developer ergonomics.

---

## Core Stack
- **Laravel** 12.x
- **PHP** 8.3
- **MySQL**
- **Vite** (build tool)
- **Tailwind CSS**

---

## Backend Tooling (Composer)
- **Pest** – testing framework
- **Pest Laravel Plugin**
- **Pint** – PHP code formatting
- **Larastan (PHPStan)** – static analysis
- **Collision** – improved CLI error output

---

## Frontend Tooling (NPM)
- **Vite**
- **Tailwind CSS**
- *(add Alpine / Swiper / etc. if used)*

---

## Editor / DX
- **VS Code**
- **GitHub Copilot (inline + chat)**

---

## Common Commands

## Common Commands

This project standardizes common development tasks via Composer scripts.

```bash
composer test     # run test suite (Pest)
composer pint     # format PHP code (Pint)
composer analyse  # static analysis (Larastan / PHPStan)


# Build assets
npm run build
