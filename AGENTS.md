# AGENTS.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Single-file Symfony library (`src/OhDearCommand.php`) that provides an abstract `OhDearCommand` class. Subclasses implement `doExecute()` instead of `execute()`, and the base class automatically reports metrics (memory, runtime, exit code, failure message) to [Oh Dear](https://ohdear.app/) via `--ohdear-uuid` option.

## Commands

```bash
composer phpcs          # Check code style (dry-run)
composer phpcs:fix      # Auto-fix code style
composer phpstan        # Static analysis (level 9)
composer test           # Run phpcs + phpstan
composer update:tools   # Update linter/phpstan dependencies
```

## Architecture

- **`src/OhDearCommand.php`** — the entire library. Abstract class extending `Symfony\Component\Console\Command\Command`.
  - `execute()` is `final` — subclasses must implement `doExecute(InputInterface, OutputInterface): int`
  - `configure()` adds `--ohdear-uuid` option; subclasses calling `configure()` must call `parent::configure()`
  - When `--ohdear-uuid` is provided, wraps `doExecute()` in try/catch/finally to capture metrics and POST to `https://ping.ohdear.app/{uuid}`
  - Transport errors from the ping are silently swallowed

## Code Quality

- PHP-CS-Fixer with Symfony ruleset + risky rules + custom fixers (`kubawerlos/php-cs-fixer-custom-fixers`), targeting only `/src`
- PHPStan at level 9 (strictest), targeting only `/src`
- Both tools live in `tools/` with their own `composer.json`/`composer.lock` to avoid polluting the library's dependency graph
