# Attendee Workbook
## Build a Loans-Services Website — Laravel 13 · Flux (free) · Spatie · Tailwind v4

**2-day in-person intensive · For developers comfortable with Laravel, new to Flux & Spatie**

---

## The transformation

You arrive able to build standard Laravel apps. You leave with a **working, deployable loans-services website**: a role-protected admin CMS (pages, blog, loan products, FAQ, legal) and a polished, responsive, SEO/AI-optimized public site — built with Flux's free components and Tailwind utilities, having written **essentially zero custom CSS**.

Keep this workbook open all day. It holds the exact exercise prompts, the reusable patterns, the package cheat-sheets, and a troubleshooting section.

---

## The two rules of this workshop

**Rule 1 — Minimal CSS.** You may not create or edit a custom stylesheet beyond the three import lines in `app.css`. Everything visual comes from (a) the 5 free Flux components, (b) Tailwind utility classes, or (c) small reusable Blade components that *wrap* Tailwind utilities. If you catch yourself writing a `.my-class { ... }` rule, stop and ask how a utility could do it.

**Rule 2 — One pattern, reused.** We build one CRUD pattern on Day 1 (Pages) and reuse it for Blog, Loan Products, and FAQ. We build one frontend page pattern and reuse it everywhere. Resist reinventing.

---

## The Flux free-tier reality (important)

The free `livewire/flux` package ships **only five** components:

| Component | We use it for |
|-----------|---------------|
| `flux:button` | All buttons & form submits (variants: primary, outline, ghost, danger) |
| `flux:dropdown` | Admin user menu, table row actions, mobile nav menu |
| `flux:icon` | Heroicons throughout (nav, buttons, empty states) |
| `flux:separator` | Section dividers, optional labelled dividers |
| `flux:tooltip` | Help hints on admin fields & icon-only buttons |

Inputs, tables, modals, badges, cards, tabs, accordions — **not free.** We build those from Tailwind utilities and a tiny set of `x-ui.*` Blade components. This is deliberate: it keeps the bundle tiny and teaches you the utility-first muscle you'll use forever.

> If you later buy Flux Pro, you can swap our hand-rolled `x-ui.input` for `flux:input` with almost no other change — the patterns line up.

---

## The Spatie toolkit

| Package | Purpose in this build |
|---------|----------------------|
| `spatie/laravel-permission` | Admin roles & permissions (RBAC), route/Blade gating |
| `spatie/laravel-medialibrary` | Image uploads for blog posts & loan products, auto thumbnails |
| `spatie/laravel-sluggable` | Auto SEO slugs for pages, posts, products |
| `spatie/laravel-sitemap` | Generate `sitemap.xml` for SEO |
| `spatie/schema-org` | Fluent JSON-LD structured data (the "AI-optimized" layer) |
| `spatie/laravel-honeypot` | Spam protection on the contact form, no CAPTCHA |

---

## Site map — what admin manages vs what the public sees

| Admin module (Day 1) | Public page(s) it powers (Day 2) |
|----------------------|----------------------------------|
| Pages CMS (generic) | About Us, Privacy/PDPA, Terms & Services |
| Blog | Blog index + post detail |
| Loan Products | Homepage featured + Loan Products listing & detail |
| FAQ | FAQ page (accordion) |
| (static, data-driven) | Homepage, How It Works, Requirements & Documents, Contact |

Cross-cutting layer (Day 2 afternoon): SEO meta + JSON-LD structured data + sitemap on every public page; on-site search; contact form.

---

# The reusable CRUD pattern (memorize this)

Every admin module is the same five pieces:

1. **Model** with fillable fields + casts. Add `HasSlug` (Sluggable) and, if it has images, `HasMedia` + `InteractsWithMedia` (Media Library).
2. **Migration** — fields + `slug` (unique) + `is_published`/`is_active` + timestamps.
3. **Livewire index component** — a Tailwind `<table>`, search box (`x-ui.input` + `flux:button`), row actions in a `flux:dropdown`, pagination.
4. **Livewire form component** — `x-ui.input` / `x-ui.textarea` fields, file upload via `WithFileUploads`, validation, `flux:button` submit.
5. **Routes** behind `auth` + `role:admin` middleware, registered in the admin layout's `flux:dropdown` nav.

```php
// The shape of every model
class Page extends Model implements HasMedia   // implements/traits only if it has images
{
    use HasSlug, InteractsWithMedia;

    protected $fillable = ['title','slug','body','meta_title','meta_description','is_published'];
    protected $casts = ['is_published' => 'boolean'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()->generateSlugsFrom('title')->saveSlugsTo('slug');
    }
}
```

---

# Exercises

Each exercise lists the **prompt** (exactly what to do), a **definition of done** checklist, and **hints**. Facilitator will call time and run the debrief.

## Exercise 1 — Auth + Roles + Protected Admin Dashboard (50 min)

**Prompt:** Using `spatie/laravel-permission`, create an `admin` role and an `editor` role. Seed one admin user. Protect all `/admin/*` routes so only users with the `admin` role can reach them, and have non-admins redirected to the homepage. Build a `/admin` dashboard page using the admin layout shell from the code-along: a top bar with a `flux:dropdown` user menu (Profile, Logout) and a sidebar of `flux:button`s with `flux:icon`s linking to the (not-yet-built) modules. The dashboard body shows three Tailwind stat cards (Pages, Posts, Products — hardcode counts for now).

**Definition of done:**
- [ ] `php artisan migrate` has run the permission tables.
- [ ] `Role::create(['name' => 'admin'])` and `editor` seeded; admin user has the role.
- [ ] Route group uses `->middleware(['auth','role:admin'])`.
- [ ] Logging in as a non-admin → redirected away from `/admin`.
- [ ] Dashboard renders with sidebar nav, user dropdown, 3 stat cards — **no custom CSS**.

**Hints:** add `use HasRoles;` to the `User` model. Register Spatie's `role` middleware alias in `bootstrap/app.php`. Stat cards = a `grid grid-cols-1 md:grid-cols-3 gap-4` of `rounded-xl border p-6` divs.

---

## Exercise 2 — Blog CRUD with Images & Slugs (55 min)

**Prompt:** Build a full Blog module following the reusable CRUD pattern. A `Post` has: title, slug (auto via Sluggable), excerpt, body, a single **featured image** (via Media Library, collection `featured`, with a `thumb` conversion at 400px), `is_published` boolean, and `published_at`. Build the Livewire index (searchable table of posts with thumbnail, title, status badge built from Tailwind, and a `flux:dropdown` of Edit/Delete) and the create/edit form (image upload with live preview, validation). Deleting a post must remove its media.

**Definition of done:**
- [ ] `Post` model uses `HasSlug` + `InteractsWithMedia`.
- [ ] `registerMediaCollections()` defines `featured` (singleFile); `registerMediaConversions()` defines `thumb` (400px).
- [ ] Index table shows the `thumb` conversion, not the full image.
- [ ] Form validates: title required, image is image/max:2048.
- [ ] Status "badge" is a Tailwind `<span class="rounded-full px-2 py-0.5 text-xs ...">` — green when published, gray when draft.
- [ ] Create, edit, and delete all work; deleting clears media.

**Hints:** `use Livewire\WithFileUploads;` in the form component. Save with `$post->addMedia($this->image->getRealPath())->toMediaCollection('featured')`. Live preview: `@if($image) <img src="{{ $image->temporaryUrl() }}"> @endif`.

---

## Exercise 3 — FAQ CRUD with Ordering (45 min)

**Prompt:** Build the FAQ module independently using the pattern (no code-along). A `Faq` has: question, answer (long text), a `category` string, `sort_order` integer, and `is_published`. Build the index sorted by `sort_order` then `category`, with inline up/down reorder buttons (`flux:button` + `flux:icon` chevrons) that swap `sort_order` with the neighbor. Build the create/edit form. You have the pattern from Pages and Blog — apply it.

**Definition of done:**
- [ ] Migration + model + index + form, all behind admin middleware.
- [ ] Index sorted by `sort_order`, grouped/labelled by category.
- [ ] Up/down buttons reorder and persist.
- [ ] Form validates question & answer required.
- [ ] No custom CSS; row actions in a `flux:dropdown`.

**Hints:** reorder = a Livewire method `moveUp($id)` that swaps the `sort_order` of the row and the one above it. Group display: `@foreach($faqs->groupBy('category') as $category => $items)`.

---

## Exercise 4 — About Us + Loan Products Listing & Detail (50 min)

**Prompt:** Build three public pages that consume Day-1 admin data. (a) **About Us** renders from the Pages CMS — fetch the page with slug `about-us` and display its body in a readable `prose`-style Tailwind layout inside the public shell. (b) **Loan Products listing** at `/loans` shows a responsive card grid of all `is_active` products (image, name, summary, "from X% p.a.", a `flux:button` "View details"). (c) **Loan Product detail** at `/loans/{slug}` shows the full product: hero, key facts table (rate, amount range, term), requirements list, and a CTA button to Contact.

**Definition of done:**
- [ ] About Us pulls live from the `Page` model by slug; editing it in admin changes the public page.
- [ ] `/loans` card grid is responsive (`grid sm:grid-cols-2 lg:grid-cols-3 gap-6`).
- [ ] Detail page resolves by slug via route-model binding (`Route::get('/loans/{product:slug}')`).
- [ ] All buttons are `flux:button`; everything else Tailwind utilities.
- [ ] 404 on unknown slug.

**Hints:** route-model binding by slug needs `getRouteKeyName()` returning `'slug'` on the model. Key-facts "table" can be a definition list (`<dl>`) styled with Tailwind grid.

---

## Exercise 5 — Requirements & Documents + FAQ Page (45 min)

**Prompt:** Build two utility pages. (a) **Requirements & Documents** at `/requirements`: a data-driven checklist page — two columns ("Eligibility" and "Documents you'll need"), each a Tailwind list with `flux:icon` check marks. Source the items from a simple config array or a small seeded table (your call). (b) **FAQ page** at `/faq`: render published FAQs from the admin module, grouped by category, as an **accordion built with native `<details>`/`<summary>`** styled with Tailwind (no JS, no custom CSS, no Flux Pro). Each `<summary>` is the question; the open panel is the answer.

**Definition of done:**
- [ ] `/requirements` shows two clearly separated lists with icon bullets.
- [ ] `/faq` lists live published FAQs grouped by category.
- [ ] Accordion uses `<details>` — opening one expands its answer; fully keyboard accessible by default.
- [ ] Marker chevron rotates on open using a Tailwind `group-open:` / `[&[open]]:` utility (bonus).
- [ ] No custom CSS, no Alpine needed.

**Hints:** `<details class="border-b"><summary class="cursor-pointer list-none py-4 font-medium flex justify-between">...</summary><div class="pb-4 text-gray-600">...</div></details>`. Rotate chevron with `[details[open]_&]:rotate-180` or wrap and use `group`/`group-open`.

---

## Exercise 6 — SEO Meta + JSON-LD Structured Data + Sitemap (60 min)

**Prompt:** Add the SEO/AI layer site-wide. (a) Build an `x-seo.meta` Blade component that takes `:title`, `:description`, `:image` and outputs `<title>`, meta description, canonical, and Open Graph/Twitter tags; feed it from each page (CMS pages use their `meta_title`/`meta_description`). (b) Using `spatie/schema-org`, output JSON-LD: `Organization` on every page, `FinancialProduct`/`LoanOrCredit` on loan detail pages, `FAQPage` on `/faq`, and `BreadcrumbList` where relevant. (c) Generate `sitemap.xml` with `spatie/laravel-sitemap` (a console command + scheduled task) and add a `robots.txt` pointing to it.

**Definition of done:**
- [ ] Every public page has a unique title + meta description (CMS-driven where applicable).
- [ ] `view-source` on a loan detail page shows a valid `FinancialProduct` JSON-LD block with name, description, provider, and rate.
- [ ] `/faq` emits `FAQPage` JSON-LD mapping every Q→A.
- [ ] `php artisan sitemap:generate` produces `public/sitemap.xml`; `robots.txt` references it.
- [ ] Run a page through Google's Rich Results Test (or paste JSON-LD into the schema validator) — no errors.

**Hints:** `Schema::financialProduct()->name(...)->description(...)->provider(Schema::organization()->name('...'))` then `->toScript()` in the Blade. The structured data **is** the AI-optimization story: answer engines and AI crawlers read JSON-LD + clean semantic HTML far better than they read styling.

---

## Exercise 7 — Contact Form + Privacy/PDPA + Terms (40 min)

**Prompt:** (a) Build a **Contact Us** page at `/contact`: a hand-rolled Tailwind form (name, email, phone, loan-type select, message) as a Livewire component with validation, success state, and `spatie/laravel-honeypot` spam protection. On submit, store a `ContactSubmission` and (stub) notify the team. (b) Render **Privacy Policy & PDPA** (`/privacy`) and **Terms & Services** (`/terms`) from the Pages CMS by slug — so legal copy is editable by admins without a deploy. Add a PDPA consent checkbox to the contact form ("I consent to my data being processed per the Privacy Policy", linking to `/privacy`), required to submit.

**Definition of done:**
- [ ] Contact form validates all fields; shows inline errors + a success message.
- [ ] Honeypot field present (`<x-honeypot livewire-model="extraFields" />` pattern) and blocks bots.
- [ ] PDPA consent checkbox is required; unchecking blocks submit.
- [ ] `/privacy` and `/terms` render live from the `Page` CMS.
- [ ] Submission persists to `contact_submissions`.

**Hints:** Honeypot for Livewire uses the `livewire-model` binding; see Spatie docs. Select uses a plain Tailwind `<select>` styled with utilities (no Flux Pro select needed).

---

# Reference shelf

## Minimal-CSS toolkit (the utilities you'll reach for 90% of the time)

- **Layout:** `container mx-auto px-4`, `grid grid-cols-… gap-…`, `flex items-center justify-between`
- **Spacing:** `p-6 px-4 py-2 gap-4 space-y-4 mt-8`
- **Surface:** `rounded-xl border bg-white shadow-sm dark:bg-zinc-900`
- **Type:** `text-sm text-gray-600 font-medium tracking-tight leading-relaxed`
- **State:** `hover:bg-gray-50 focus:ring-2 focus:ring-blue-500 transition`
- **Responsive:** prefix with `sm: md: lg:` — design mobile-first.

## The `x-ui.*` Blade components we create (wrappers over utilities)

`x-ui.input`, `x-ui.textarea`, `x-ui.label`, `x-ui.card`, `x-ui.table` (+ `x-ui.th`/`x-ui.td`), `x-ui.badge`, `x-ui.section`. Each is ~5–15 lines of Blade with `@props` and merged classes. Build once, reuse everywhere. This is how you get Flux-like ergonomics on the free tier.

## Flux free components — syntax quickies

```blade
<flux:button variant="primary" icon="plus">New</flux:button>
<flux:dropdown>
  <flux:button icon="ellipsis-horizontal" variant="ghost" />
  <flux:menu>{{-- items --}}</flux:menu>   {{-- menu items via slots --}}
</flux:dropdown>
<flux:icon name="home" class="size-5" />
<flux:separator text="or" />
<flux:tooltip content="Slugs auto-generate"><flux:icon name="information-circle" /></flux:tooltip>
```

## Troubleshooting

- **Flux button is unstyled** → your `app.css` is missing the `@import '.../flux.css'` line, or Vite isn't running. Run `npm run dev`.
- **`role` middleware not found** → register Spatie's middleware alias in `bootstrap/app.php` (`$middleware->alias([...])`).
- **Media not deleting** → ensure the model `implements HasMedia` and you call `$model->clearMediaCollection()` or delete the model (cascades).
- **Slug not generating** → the `HasSlug` trait needs `getSlugOptions()`; the source field must be set before save.
- **JSON-LD rich-results errors** → most often a missing required property (`name`, `description`); check the validator output line by line.

---

## End-of-workshop definition of done

- [ ] Admin can log in, others can't reach `/admin`.
- [ ] Admin can CRUD Pages, Posts, Loan Products, FAQs (with images where relevant).
- [ ] Public site: Homepage, About, Loans listing + detail, How It Works, Requirements, FAQ, Contact, Privacy, Terms — all live.
- [ ] Every public page has SEO meta + appropriate JSON-LD; `sitemap.xml` generates.
- [ ] Contact form works with validation, honeypot, PDPA consent.
- [ ] `grep -r` finds **no** custom CSS rules beyond the three `app.css` imports.
