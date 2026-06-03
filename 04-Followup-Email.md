# Follow-Up Email Template
## Send within 24 hours of Day 2

**Subject:** Your loans site is built — here's how to ship it this week

---

Hi {{ first_name }},

Two days ago you'd never touched Flux or Spatie. You're now holding a content-managed, SEO/AI-optimized loans website — admin and public — built with five free components and a pile of Tailwind utilities. No custom CSS. That's a real shift.

**Your three action items (do them this week while it's fresh):**

1. **Seed real content and deploy.** Paste in your actual loan products, About/Privacy/Terms copy, and a few FAQs, then ship it. Deploy checklist: `npm run build` → set `.env` → migrate → `php artisan sitemap:generate` → cache config/routes/views. Forge, Vapor, or a plain VPS all work.

2. **Validate your structured data.** Run every public page (especially loan detail and `/faq`) through Google's Rich Results Test or the schema.org validator. Green results = you're legible to search and AI answer engines.

3. **Reply with your live URL.** Send me the link and I'll give you one round of free feedback on the build and the SEO layer.

**Your materials:**
- Reference repo (all code-along branches): {{ repo_link }}
- Attendee Workbook (exercise prompts, the CRUD pattern, troubleshooting): attached
- The minimal-CSS toolkit and `x-ui.*` components are in the workbook's Reference Shelf

**Quick gut-check before you ship:**
- [ ] `grep -rn "<style" resources/views` returns nothing; `app.css` still has only the three imports.
- [ ] Admins can CRUD all four modules; non-admins can't reach `/admin`.
- [ ] Contact form validates, blocks bots (honeypot), and enforces PDPA consent.
- [ ] Every page has a unique title + meta description and the right JSON-LD.

**Going further (optional):**
If you want the advanced follow-up — Thai/multi-language PDPA specifics, the Flux Pro upgrade path (swap your `x-ui.input` for `flux:input`), a full loan-application flow with document uploads — reply and I'll send details on the next session.

You did the hard part. Now put it in front of real users.

{{ facilitator_name }}

---
*P.S. — If something broke after you got home (a slug won't generate, media won't delete), the Troubleshooting section in the workbook covers the usual suspects. Still stuck? Reply here.*
