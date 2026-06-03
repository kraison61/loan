# Facilitator Guide
## Build a Loans-Services Website — Laravel 13 · Flux (free) · Spatie · Tailwind v4

**Format:** 2-day in-person intensive · **Audience:** Laravel-comfortable devs new to Flux & Spatie · **Recommended size:** 8–20 · **Hours:** 9:00–5:00 each day (1-hr lunch, two 15-min breaks)

---

## The single transformation

> Attendees arrive able to build standard Laravel apps but have never used Flux or Spatie and have never structured a content-managed, SEO/AI-optimized marketing site. **They leave with a working, deployable loans-services website** — a role-protected admin CMS and a polished public frontend with structured-data SEO — built with Flux's free components and Tailwind utilities, writing essentially zero custom CSS.

Everything below serves that one outcome. Two recurring teaching threads: **(1) the reusable CRUD pattern** (build once Day 1, reuse 3×) and **(2) minimal CSS** (utilities + 5 free Flux components + tiny Blade wrappers).

## Before you start (facilitator prep checklist)
- [ ] Pre-work email sent 7 days out; collect "smoke test" screenshots; triage broken setups in advance.
- [ ] You have a **reference repo** with one tagged branch per code-along (`day1-scaffold`, `day1-pages`, … `day2-deploy`) so anyone who falls behind can `git checkout` and catch up.
- [ ] Projector mirrors your editor at readable font size (18pt+). Terminal font large too.
- [ ] Sample seed data ready (5 loan products, 6 blog posts, 12 FAQs, About/Privacy/Terms page bodies) to paste so attendees aren't inventing loan copy.
- [ ] Print the **Attendee Workbook** for each seat; have the exercise prompts on slides too.
- [ ] Wi-Fi tested for `composer`/`npm` traffic across all machines simultaneously (this bites hard — pre-cache or bring a local Composer/npm mirror if the venue is weak).

---

# DAY 1 — Foundation + Admin CMS (Backend)

| Time | Block | Min |
|------|-------|-----|
| 9:00–9:20 | Opening Hook | 20 |
| 9:20–9:35 | Foundation: The Stack & The Plan | 15 |
| 9:35–10:25 | Code-Along 1: Project scaffold + admin shell | 50 |
| 10:25–10:40 | **Break** | 15 |
| 10:40–10:55 | Foundation: Roles & Permissions (Spatie) | 15 |
| 10:55–11:45 | **Exercise 1:** Auth + RBAC + dashboard | 50 |
| 11:45–12:30 | Code-Along 2: The CRUD pattern (Pages) | 45 |
| 12:30–1:30 | **Lunch** | 60 |
| 1:30–1:40 | Energy activity + recap | 10 |
| 1:40–1:55 | Foundation: Media Library (Spatie) | 15 |
| 1:55–2:50 | **Exercise 2:** Blog CRUD w/ images & slugs | 55 |
| 2:50–3:05 | **Break** | 15 |
| 3:05–3:50 | Code-Along 3: Loan Products module | 45 |
| 3:50–4:35 | **Exercise 3:** FAQ CRUD w/ ordering | 45 |
| 4:35–5:00 | Day 1 Close + gallery walk | 25 |

---

### 9:00–9:20 · OPENING HOOK (20 min)
**SAY:** "By 5pm tomorrow you'll have shipped a complete loans website — admin and public — and you'll have written almost no CSS. Let me show you the finished thing first."
**DO:** Demo the reference site end-to-end: log into admin, create a loan product with an image, then refresh the public site and show it appear. Open dev tools — show there's no custom stylesheet.
**SHOW:** The finished admin + public site; the empty custom-CSS file.
**SAY (the rules):** "Two rules. One: no custom CSS beyond three import lines — utilities and components only. Two: we build one CRUD pattern and reuse it four times. And a reality check — the free Flux tier is only five components, so most UI is Tailwind. That's the skill you're really here to build."
**DO:** Quick show of hands: "Used Livewire? Flux? Spatie permission?" Calibrate pace to the room.
**WATCH FOR:** Anyone whose pre-work failed — pair them now with someone whose machine works; fix during Code-Along 1.
**TRANSITION:** "Let's name the pieces, then start building."

### 9:20–9:35 · FOUNDATION: The Stack & The Plan (15 min)
**SHOW:** Slide of the stack (Laravel 13 + Livewire/Flux + Tailwind v4 + Spatie) and the site map (admin module ↔ public page).
**SAY:** Cover the 5 free Flux components and where each lands; the 6 Spatie packages and their jobs (don't install yet — just orient).
**DO (interaction):** Rapid verbal quiz — "Which Spatie package handles admin roles? Image thumbnails? SEO slugs? Structured data?" Call on the room.
**IF BEHIND:** Cut the quiz; state the mapping and move on.
**TRANSITION:** "Terminals open — code along with me exactly."

### 9:35–10:25 · CODE-ALONG 1: Scaffold + Admin Shell (50 min)
**DO (lead live, attendees mirror):**
1. `laravel new loans-site` (SQLite), `composer require livewire/livewire livewire/flux`, confirm `app.css` imports + `@fluxAppearance`/`@fluxScripts`.
2. `composer require spatie/laravel-permission`, publish + migrate.
3. Build `components/layouts/admin.blade.php`: top bar with `flux:dropdown` user menu, sidebar of `flux:button` links with `flux:icon`, `flux:separator`. Pure utilities for layout.
4. Render an empty `/admin` route through the layout — "hello admin", zero custom CSS.
**SHOW:** Each step on the projector; pause at natural checkpoints.
**WATCH FOR:** Tailwind not compiling (npm run dev not running); Flux CSS import missing → button unstyled. Have the `day1-scaffold` branch ready for stragglers.
**IF BEHIND:** Provide the admin layout Blade as a paste-in; walk through it rather than typing.
**TRANSITION:** "Shell's up. Now let's lock the door — only admins get in."

### 10:25–10:40 · BREAK (15)

### 10:40–10:55 · FOUNDATION: Roles & Permissions (15 min)
**SAY:** Roles vs permissions; `HasRoles` on User; the `role`/`permission` middleware; Blade `@role`/`@can`; registering the middleware alias in `bootstrap/app.php`.
**SHOW:** The 3 lines that gate a route group.
**DO (interaction):** "Predict: what does `Route::middleware('role:admin')` do to an editor user?" Two answers from the room.
**TRANSITION:** "Your turn — Exercise 1 in your workbook."

### 10:55–11:45 · EXERCISE 1: Auth + RBAC + Dashboard (50 min)
**SAY:** "Read Exercise 1. 35 minutes to build, then we debrief. Pair up if you like."
**DO:** Start a visible timer. Circulate. **Type:** pair programming.
**Debrief (last 8 min):** Gallery walk — two pairs project their `/admin`; verify a non-admin is bounced. Reinforce the middleware line.
**WATCH FOR:** Forgotten middleware alias; `HasRoles` not added; seeding the role but not assigning it.
**IF BEHIND:** Drop the editor role and stat cards; require only admin-gating + a bare dashboard. (**Cuttable section #1**)
**TRANSITION:** "Auth done. Now the pattern you'll reuse all day."

### 11:45–12:30 · CODE-ALONG 2: The CRUD Pattern — Pages (45 min)
**DO (lead live):** Build the **Pages** module as the canonical pattern: `Page` model (`HasSlug`, fillable, meta fields, `is_published`), migration, Livewire index (Tailwind table + search `x-ui.input` + row-action `flux:dropdown` + pagination), Livewire form (`x-ui.input`/`x-ui.textarea`, validation, `flux:button`). Build the `x-ui.input`, `x-ui.label`, `x-ui.table` Blade components here — they're reused all workshop.
**SAY:** "Burn this shape into memory: Model → Migration → Index → Form → Routes. Blog, Products, FAQ are this same thing."
**WATCH FOR:** People over-engineering the `x-ui` components — keep them ~10 lines.
**IF BEHIND:** Ship `x-ui.*` components as paste-ins; type only the Page model + Livewire components.
**TRANSITION:** "Lunch. Come back ready to clone this pattern."

### 12:30–1:30 · LUNCH (60)

### 1:30–1:40 · ENERGY ACTIVITY + RECAP (10 min)
**DO:** "Spot the CSS." Project a component; attendees shout the Tailwind utilities doing the work. Anyone who admits to writing a custom CSS rule over lunch does 10 seconds of explaining why utilities would've been better (kept light/fun).
**TRANSITION:** "Now images — Media Library."

### 1:40–1:55 · FOUNDATION: Media Library (15 min)
**SAY:** `HasMedia` + `InteractsWithMedia`; media collections (`singleFile`); conversions (`thumb`); Livewire `WithFileUploads`; temporary previews.
**SHOW:** A model that stores an image and a thumbnail.
**TRANSITION:** "Exercise 2 — clone the pattern, add images."

### 1:55–2:50 · EXERCISE 2: Blog CRUD with Images & Slugs (55 min)
**SAY:** "Exercise 2. 45 to build, 10 to debrief. Reuse your `x-ui` components and the Pages pattern."
**DO:** Timer; circulate; nudge people to copy from their Pages module rather than retype.
**Debrief:** One pair demos upload → thumbnail in table → delete clears media. Praise reuse.
**WATCH FOR:** `getRealPath()` on the temp upload; conversions queue (run sync in dev); missing `implements HasMedia`.
**IF BEHIND:** Skip the `thumb` conversion (show full image in table). (**Cuttable section #2**)
**TRANSITION:** "Break, then the core domain — loan products."

### 2:50–3:05 · BREAK (15)

### 3:05–3:50 · CODE-ALONG 3: Loan Products Module (45 min)
**DO (lead live):** Build `LoanProduct` (name, slug, summary, body, `interest_rate`, `min_amount`, `max_amount`, `term_months`, `requirements` (json or text), featured image via Media Library, `is_active`, meta fields). Index + form via the pattern. Emphasize this model drives the homepage + listing tomorrow.
**SAY:** "This is the most important table in the app — the public site is mostly a view over it."
**IF BEHIND:** Provide the migration + model as paste-in; build only the form live.
**TRANSITION:** "Last module today — and you're doing it solo."

### 3:50–4:35 · EXERCISE 3: FAQ CRUD with Ordering (45 min)
**SAY:** "Exercise 3. No code-along — you have the pattern three times now. Add the up/down reorder. 35 to build, 10 to debrief."
**DO:** Timer; resist helping too early — let them lean on the pattern.
**Debrief:** A pair demos reordering. Ask: "How long did this take vs the first CRUD?" (Drives home the reuse payoff.)
**IF BEHIND:** Drop the reorder buttons; plain CRUD only. (**Cuttable section #3**)
**TRANSITION:** "Let's see what everyone built."

### 4:35–5:00 · DAY 1 CLOSE (25 min)
**DO:** Gallery walk — each pair shows their admin for 60–90 sec.
**SAY:** Recap the pattern (Model→Migration→Index→Form→Routes) and the minimal-CSS scorecard (who still has zero custom CSS?). Preview Day 2: "Tomorrow the public site — and it's mostly reading the data you just made manageable."
**Optional homework:** Paste in the sample seed data so Day 2 pages have content.

---

# DAY 2 — Public Frontend + SEO/AI + Contact/Legal + Deploy

| Time | Block | Min |
|------|-------|-----|
| 9:00–9:15 | Opening + Day 1 recap | 15 |
| 9:15–9:30 | Foundation: Frontend architecture | 15 |
| 9:30–10:20 | Code-Along 4: Public shell + Homepage | 50 |
| 10:20–10:35 | **Break** | 15 |
| 10:35–11:25 | **Exercise 4:** About + Loans listing & detail | 50 |
| 11:25–11:45 | Code-Along 5: How It Works (data-driven page) | 20 |
| 11:45–12:30 | **Exercise 5:** Requirements + FAQ accordion | 45 |
| 12:30–1:30 | **Lunch** | 60 |
| 1:30–1:40 | Energy activity + recap | 10 |
| 1:40–1:55 | Foundation: SEO + AI optimization | 15 |
| 1:55–2:55 | **Exercise 6:** SEO meta + JSON-LD + sitemap | 60 |
| 2:55–3:10 | **Break** | 15 |
| 3:10–3:40 | Code-Along 6: On-site search | 30 |
| 3:40–4:20 | **Exercise 7:** Contact form + Privacy + Terms | 40 |
| 4:20–4:45 | Code-Along 7: Minimal-CSS audit + deploy | 25 |
| 4:45–5:00 | Final close + gallery walk | 15 |

---

### 9:00–9:15 · OPENING + RECAP (15 min)
**SAY:** "Day 1 you built the engine. Today you build the body — and the public site mostly reads from yesterday's tables."
**DO:** On a whiteboard, map each public page to its admin source (About→Pages, Loans→LoanProduct, FAQ→Faq, Privacy/Terms→Pages). 60-sec energizer: "Name a Tailwind utility you used yesterday" round-robin.
**TRANSITION:** "How the frontend is structured."

### 9:15–9:30 · FOUNDATION: Frontend Architecture (15 min)
**SAY:** Public layout vs admin layout; Flux on the frontend (buttons, icons, `flux:dropdown` mobile menu); the marketing-UI utility toolkit; reusable `x-ui.section`/`x-ui.card`. Reiterate `sm:/md:/lg:` mobile-first.
**SHOW:** The public layout skeleton.
**TRANSITION:** "Code along — shell and homepage."

### 9:30–10:20 · CODE-ALONG 4: Public Shell + Homepage (50 min)
**DO (lead live):** Public layout (sticky header nav, `flux:dropdown` mobile menu, footer with legal links). Homepage: hero, featured loan products pulled from DB (`LoanProduct::where('is_active')->take(3)`), trust-signals row, CTA — all utilities + `flux:button`.
**WATCH FOR:** People reaching for custom CSS on the hero — redirect to gradient/spacing utilities.
**IF BEHIND:** Ship the footer as paste-in; build header + hero live.
**TRANSITION:** "Exercise 4 — three pages off your data."

### 10:20–10:35 · BREAK (15)

### 10:35–11:25 · EXERCISE 4: About + Loans Listing & Detail (50 min)
**SAY:** "Exercise 4. 40 build, 10 debrief. Route-model binding by slug for detail pages."
**DO:** Timer; circulate. **Type:** solo or pair.
**Debrief:** A pair demos editing About in admin → public page changes live. That "aha" is the CMS payoff.
**WATCH FOR:** `getRouteKeyName()` for slug binding; null page (slug not seeded).
**IF BEHIND:** Drop the detail page; listing + About only. (**Cuttable section #4**)
**TRANSITION:** "Quick code-along on a data-driven utility page."

### 11:25–11:45 · CODE-ALONG 5: How It Works (20 min)
**DO (lead live):** Build `/how-it-works` as a numbered steps page (icon + heading + copy per step), data from a config array. Establishes the pattern for Exercise 5.
**TRANSITION:** "Exercise 5 reuses this for Requirements, plus a no-JS accordion."

### 11:45–12:30 · EXERCISE 5: Requirements + FAQ Accordion (45 min)
**SAY:** "Exercise 5. The FAQ accordion is native `<details>` — no JS, no custom CSS, no Flux Pro. 35 build, 10 debrief."
**DO:** Timer; circulate.
**Debrief:** Demo the `<details>` accordion + keyboard accessibility. Call out: "Zero JavaScript for that."
**WATCH FOR:** People importing an accordion library — stop them; native element only.
**IF BEHIND:** Requirements page only; move FAQ render into Exercise 6's page work. (**Cuttable section #5**)
**TRANSITION:** "Lunch, then we make Google and AI engines love this site."

### 12:30–1:30 · LUNCH (60)

### 1:30–1:40 · ENERGY + RECAP (10 min)
**DO:** "Source or static?" — call out a public page, attendees shout whether it's CMS-driven or data-driven. Fast and loud.

### 1:40–1:55 · FOUNDATION: SEO + AI Optimization (15 min)
**SAY:** Meta/OG/Twitter tags from CMS fields; canonical URLs; **JSON-LD with spatie/schema-org** (Organization, FinancialProduct/LoanOrCredit, FAQPage, BreadcrumbList); sitemap + robots. **The AI angle:** answer engines and AI crawlers parse structured data + semantic HTML, not your styling — clean JSON-LD is how you become quotable by AI.
**SHOW:** A FinancialProduct JSON-LD block and where it goes.
**TRANSITION:** "Exercise 6 — wire it across the site."

### 1:55–2:55 · EXERCISE 6: SEO Meta + JSON-LD + Sitemap (60 min)
**SAY:** "Exercise 6 — the biggest of the day. 50 build, 10 debrief. Validate your JSON-LD."
**DO:** Timer; circulate. Have the schema validator open on the projector for live checks.
**Debrief:** Project a loan detail page through the Rich Results / schema validator — green. Show the generated `sitemap.xml`.
**WATCH FOR:** Missing required schema props; meta description not pulling from CMS; sitemap command not registered.
**IF BEHIND:** JSON-LD on loan detail + FAQ only; skip BreadcrumbList and the scheduled sitemap (run it manually). (**Cuttable section #6**)
**TRANSITION:** "Break, then search."

### 2:55–3:10 · BREAK (15)

### 3:10–3:40 · CODE-ALONG 6: On-Site Search (30 min)
**DO (lead live):** A simple site search (DB `LIKE` across products, posts, pages, FAQs, or Laravel Scout with the database driver). Hand-rolled Tailwind search input + `flux:button`; a results page grouping by type. Briefly frame the realistic "AI search" story: structured data + clean search + an optional `llms.txt`/content endpoint for answer engines — set expectations honestly (we implement classic search; AI-answerability comes from the schema layer).
**IF BEHIND:** Search products only; mention how to extend.
**TRANSITION:** "Last build — contact and legal."

### 3:40–4:20 · EXERCISE 7: Contact Form + Privacy + Terms (40 min)
**SAY:** "Exercise 7. Hand-rolled Tailwind form, validation, honeypot, PDPA consent. Legal pages from the Pages CMS. 32 build, 8 debrief."
**DO:** Timer; circulate.
**Debrief:** Demo a valid submit + a blocked bot (honeypot) + the required PDPA checkbox; show `/privacy` rendering from CMS.
**WATCH FOR:** Honeypot Livewire binding; consent checkbox not actually required server-side.
**IF BEHIND:** Contact form + render Privacy from CMS; Terms can reuse the same view with a different slug. (**Cuttable section #7**)
**TRANSITION:** "Let's audit the CSS and talk shipping."

### 4:20–4:45 · CODE-ALONG 7: Minimal-CSS Audit + Deploy (25 min)
**DO (lead live):**
1. `grep -rn` the views for custom CSS / `<style>` blocks — confirm only the three `app.css` imports. Celebrate the zero.
2. Quick responsive pass (resize), confirm dark mode came free from Flux/Tailwind.
3. Deploy talk: `npm run build`, env/`.env`, migrations, `php artisan sitemap:generate`, config/route/view cache; options (Forge / Vapor / a plain VPS). Don't deploy live unless time allows — walk the checklist.
**TRANSITION:** "Show me what you shipped."

### 4:45–5:00 · FINAL CLOSE (15 min)
**DO:** Gallery walk — each pair shows their full site (admin + public) for ~60 sec.
**SAY:** Recap the transformation: "You came in new to Flux and Spatie. You're leaving with a content-managed, SEO/AI-optimized loans site and a CRUD pattern you'll reuse for years — with no custom CSS."
**Action items:** (1) Seed real content and deploy by end of week. (2) Run every public page through the schema validator. (3) Reply to the follow-up email with your live URL for feedback.
**Next steps / pitch (if applicable):** Mention the advanced session (multi-language/Thai PDPA specifics, Flux Pro upgrade path, payment-application flow) and where to find the reference repo.

---

## Stress-test (verified before delivery)
- [x] A first-time facilitator can run this from the guide + reference repo branches.
- [x] Transformation is achievable in 14 hours (3 of 4 admin modules are exercises reusing one taught pattern; frontend reuses one taught page pattern).
- [x] Every exercise serves the transformation (each builds a real part of the loans site).
- [x] Exercise prompts are exact (see Workbook), not summaries.
- [x] **7 cuttable sections** marked for running behind; reference branches let stragglers catch up without derailing the room.
- [x] In-person cadence: interaction or hands-on at least every 15 min; breaks ~every 75–90 min; lunch + post-lunch energizer both days.
