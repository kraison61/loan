# Pre-Work — Read & Complete Before Day 1

**Workshop:** Build a Loans-Services Website with Laravel 13, Flux (free) & Spatie
**Send this to attendees ~7 days before the workshop.**

The single biggest reason an in-person coding workshop loses time is broken environments. Please complete every step below **before** you arrive and reply to the confirmation email with a screenshot of step 6 passing. Budget 30–45 minutes.

---

## Why this matters

You already know Laravel. What's new for you is **Flux** (Livewire's component library) and **Spatie**'s packages. We don't want to spend Day 1 morning on `php` version errors — we want to spend it building. If your machine is ready, you'll keep pace with the live code-alongs.

## What you'll have running by the end of pre-work

A blank, bootable Laravel 13 app with the toolchain installed and verified. We build the real project together on Day 1 — do **not** pre-build the loans site.

---

## 1. System requirements

| Tool | Minimum version | Check command |
|------|-----------------|---------------|
| PHP | 8.3+ | `php -v` |
| Composer | 2.6+ | `composer -V` |
| Node.js | 20 LTS+ | `node -v` |
| npm | 10+ | `npm -v` |
| Git | any recent | `git --version` |
| A database | SQLite is fine for the workshop | — |

PHP extensions required: `mbstring`, `gd` (for the Spatie Media Library image conversions), `exif`, `fileinfo`, `intl`, `zip`. Verify with `php -m`.

> macOS: Laravel Herd is the fastest path (bundles PHP + Composer + Node). Windows: use Herd for Windows or WSL2 + the Laravel install steps. Linux: install via your package manager.

## 2. Install the Laravel installer

```bash
composer global require laravel/installer
```

## 3. Create a throwaway test app

```bash
laravel new prework-test
cd prework-test
```

Pick **SQLite** when prompted (or set `DB_CONNECTION=sqlite` in `.env` and `touch database/database.sqlite`).

## 4. Install Livewire, Flux (free) and Tailwind v4

```bash
composer require livewire/livewire
composer require livewire/flux
npm install
```

Tailwind v4 ships with the default Laravel 13 Vite setup. Open `resources/css/app.css` and confirm it contains (add the Flux line if missing):

```css
@import 'tailwindcss';
@import '../../vendor/livewire/flux/dist/flux.css';

@custom-variant dark (&:where(.dark, .dark *));
```

## 5. Wire the Flux directives

In your main layout (`resources/views/components/layouts/app.blade.php` or your welcome layout), make sure the `<head>` has `@fluxAppearance` and the end of `<body>` has `@fluxScripts`. Inter font is recommended:

```blade
<head>
    {{-- ... --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />
    @fluxAppearance
</head>
<body>
    {{-- ... --}}
    @fluxScripts
</body>
```

## 6. The "ready" smoke test

Drop a Flux button into any Blade view:

```blade
<flux:button variant="primary">It works</flux:button>
```

Then run, in two terminals:

```bash
php artisan serve
npm run dev
```

Open the page. **You should see a styled blue button with zero custom CSS written.** Screenshot this and reply to the confirmation email. If the button is unstyled, your Tailwind/Flux CSS import is wrong — flag it in the email and we'll fix it before Day 1.

## 7. Accounts & installs to have ready

- A **GitHub account** (we push the project and you'll clone a starter branch).
- Your editor of choice with PHP/Blade support (VS Code + Intelephense, PhpStorm, etc.).
- Optional but nice: the **Flux** and **Tailwind CSS IntelliSense** VS Code extensions.

## 8. Optional warm-up (15 min, not required)

Skim these so the terms aren't brand new:

- Flux free components — the five we'll use: Button, Dropdown, Icon, Separator, Tooltip (`fluxui.dev/components`).
- Spatie Laravel Permission — read the "Basic Usage" section of the docs.
- Tailwind v4 — skim the utility-first basics if you've never used Tailwind.

---

### Bring to the room
Laptop + charger, the verified `prework-test` app, your GitHub login, and a willingness to delete custom CSS. See you there.
