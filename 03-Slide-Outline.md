# Slide Outline
## Loans-Services Website Workshop — Laravel 13 · Flux (free) · Spatie · Tailwind v4

Recommendations, not finished slides. Keep slides sparse — this is a build workshop; the editor is the main "slide." Most teaching happens live in code. ~30 slides across 2 days.

### Day 1 — Opening & Foundation
1. **Title** — Workshop name, the promise: "Ship a complete loans site in 2 days. Almost no CSS."
2. **The finished site** — screenshot of admin + public (used during the live demo).
3. **The transformation** — "From: standard Laravel. To: content-managed, SEO/AI-optimized loans site on Flux + Spatie."
4. **The two rules** — (1) Minimal CSS (only 3 import lines). (2) One CRUD pattern, reused 4×.
5. **The Flux free reality** — the 5 free components (Button, Dropdown, Icon, Separator, Tooltip); everything else = Tailwind + tiny Blade wrappers.
6. **The stack** — Laravel 13 · Livewire/Flux · Tailwind v4 · Spatie. One line each.
7. **The Spatie toolkit** — table: permission, medialibrary, sluggable, sitemap, schema-org, honeypot → what each does.
8. **Site map** — admin module ↔ public page diagram.
9. **The CRUD pattern** — Model → Migration → Index → Form → Routes (this slide reappears all day).

### Day 1 — Backend build (mostly live code; few slides)
10. **Roles vs Permissions** — the 3 lines that gate a route group; `HasRoles`; middleware alias.
11. **Exercise 1** — the full prompt + definition-of-done checklist.
12. **Media Library in one slide** — `HasMedia`, collections, conversions, `WithFileUploads`.
13. **Exercise 2** — full prompt + checklist.
14. **Loan Product model** — the fields (this table powers the public site).
15. **Exercise 3** — full prompt + checklist.
16. **Day 1 scoreboard** — modules built; "who still has zero custom CSS?"

### Day 2 — Frontend & SEO/AI
17. **Day 1 → Day 2 map** — each public page and its admin data source.
18. **Frontend architecture** — public vs admin layout; Flux on frontend; the utility toolkit.
19. **Mobile-first** — `sm:/md:/lg:` and the responsive grid pattern.
20. **Exercise 4** — full prompt + checklist.
21. **Data-driven pages** — the How It Works / Requirements pattern.
22. **No-JS accordion** — native `<details>`/`<summary>` styled with Tailwind.
23. **Exercise 5** — full prompt + checklist.
24. **SEO + AI optimization** — meta/OG, canonical, JSON-LD, sitemap, robots.
25. **Structured data is the AI layer** — answer engines read JSON-LD + semantic HTML, not your styling. Show a FinancialProduct block.
26. **Exercise 6** — full prompt + checklist.
27. **On-site search** — classic search now; AI-answerability via schema (honest framing).
28. **Exercise 7** — full prompt + checklist (contact + honeypot + PDPA + legal from CMS).
29. **Ship it** — minimal-CSS audit (grep), build, env, sitemap, cache, deploy options.
30. **Close** — transformation recap, 3 action items, where the repo lives, next steps.

### Design notes for the deck
- Use the Inter font (matches Flux) and a 2-color palette; let the live UI be the visual interest.
- Every exercise slide must show the **exact prompt** and the **definition-of-done checklist** so attendees can self-check.
- Keep the CRUD-pattern slide as a recurring anchor — re-show it before each module.
- Code goes in the editor, not on slides; slides hold concepts, prompts, and checklists only.
