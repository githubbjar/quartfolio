# Quartfolio

This repository contains the source code for my personal portfolio site, built with Laravel.

Live: https://quartfolio.com

---

## Overview

Quartfolio is a portfolio site focused on editorial design, web development, and digital publishing work. It is designed and built from scratch to reflect both my design sensibilities and my approach to building production systems.

---

## Why Laravel?

This site is intentionally built with Laravel rather than a traditional CMS. Laravel allows me to define the data model, routing, and rendering logic explicitly, without relying on plugin-driven abstractions.

This gives me full control over structure, performance, and long-term maintainability as the site evolves.

---

## Architecture Notes

- Projects are modeled explicitly in the database (rather than CMS post types)  
- Images are referenced via storage-backed paths for future flexibility  
- The codebase is structured to support testing, refactoring, and incremental growth  
- Admin tooling is intentionally minimal and purpose-built  

---

## Status

This is an actively evolving project and serves both as a portfolio and a living codebase that reflects my current development practices.

---

## Tech Stack

- Laravel  
- Tailwind CSS  
- Alpine.js