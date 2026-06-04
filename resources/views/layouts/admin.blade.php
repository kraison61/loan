<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin — {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @fluxStyles
</head>

<body class="h-full bg-zinc-950 font-sans antialiased">

    {{-- ════════════════════════════════════════════════════
    TOP BAR
    ════════════════════════════════════════════════════ --}}
    <header class="fixed inset-x-0 top-0 z-50 flex h-14 items-center justify-between
               border-b border-white/[0.06] bg-zinc-950/90 backdrop-blur-md px-4">

        {{-- Brand --}}
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 text-sm font-semibold text-white">
            <span class="flex h-7 w-7 items-center justify-center rounded-md
                     bg-orange-500 text-white text-xs font-bold select-none">L</span>
            <span class="hidden sm:inline tracking-wide">Loans <span class="text-orange-400">Admin</span></span>
        </a>

        {{-- Right: User dropdown --}}
        <div class="flex items-center gap-3">

            {{-- Notification stub --}}
            <button class="relative rounded-md p-1.5 text-zinc-400 hover:text-white
                       hover:bg-white/[0.06] transition-colors">
                <flux:icon.bell class="size-5" />
            </button>

            {{-- User Flux dropdown --}}
            <flux:dropdown align="end">
                <flux:button variant="ghost" size="sm"
                    class="flex items-center gap-2 text-zinc-300 hover:text-white px-2">
                    <span class="flex h-7 w-7 items-center justify-center rounded-full
                             bg-orange-500/20 border border-orange-500/30
                             text-orange-400 text-xs font-semibold select-none">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </span>
                    <span class="hidden sm:inline text-sm">{{ auth()->user()->name }}</span>
                    <flux:icon.chevron-down class="size-3.5 text-zinc-500" />
                </flux:button>

                <flux:menu class="w-48 bg-zinc-900 border border-white/[0.08] shadow-2xl">
                    <div class="px-3 py-2 border-b border-white/[0.06]">
                        <p class="text-xs font-medium text-white truncate">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-zinc-500 truncate">{{ auth()->user()->email }}</p>
                    </div>

                    <flux:menu.item icon="user" href="#">
                        Profile
                    </flux:menu.item>

                    <flux:menu.separator />

                    <flux:menu.item icon="arrow-right-start-on-rectangle" variant="danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Log out
                    </flux:menu.item>
                </flux:menu>
            </flux:dropdown>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </header>

    {{-- ════════════════════════════════════════════════════
    BODY: Sidebar + Main
    ════════════════════════════════════════════════════ --}}
    <div class="flex h-full pt-14">

        {{-- ── Sidebar ── --}}
        <aside class="fixed left-0 top-14 bottom-0 z-40 w-56
                  border-r border-white/[0.06] bg-zinc-950
                  flex flex-col overflow-y-auto">

            <nav class="flex-1 space-y-0.5 px-2 py-4">

                {{-- Section: Content --}}
                <p class="px-3 pb-1.5 pt-2 text-[10px] font-semibold uppercase
                       tracking-widest text-zinc-600">Content</p>

                <x-admin.nav-item route="admin.dashboard" icon="squares-2x2">
                    Dashboard
                </x-admin.nav-item>

                <x-admin.nav-item route="admin.pages.index" icon="document-text">
                    Pages
                </x-admin.nav-item>

                <x-admin.nav-item route="admin.posts.index" icon="newspaper">
                    Blog Posts
                </x-admin.nav-item>

                <x-admin.nav-item route="admin.products.index" icon="banknotes">
                    Loan Products
                </x-admin.nav-item>

                {{-- Section: Engagement --}}
                <p class="px-3 pb-1.5 pt-4 text-[10px] font-semibold uppercase
                       tracking-widest text-zinc-600">Engagement</p>

                <x-admin.nav-item route="admin.contacts.index" icon="envelope">
                    Contact Submissions
                </x-admin.nav-item>

                <x-admin.nav-item route="admin.faqs.index" icon="question-mark-circle">
                    FAQs
                </x-admin.nav-item>

                {{-- Section: System --}}
                <p class="px-3 pb-1.5 pt-4 text-[10px] font-semibold uppercase
                       tracking-widest text-zinc-600">System</p>

                <x-admin.nav-item route="admin.users.index" icon="users">
                    Users & Roles
                </x-admin.nav-item>

            </nav>

            {{-- Sidebar footer --}}
            <div class="border-t border-white/[0.06] px-3 py-3">
                <p class="text-[10px] text-zinc-700">
                    {{ config('app.name') }} &middot; Admin v1.0
                </p>
            </div>
        </aside>

        {{-- ── Main content ── --}}
        <main class="ml-56 flex-1 min-h-full bg-zinc-950">
            <div class="mx-auto max-w-6xl px-6 py-8">

                {{-- Page heading slot --}}
                @isset($heading)
                    <div class="mb-8">
                        <h1 class="text-2xl font-semibold text-white tracking-tight">
                            {{ $heading }}
                        </h1>
                        @isset($subheading)
                            <p class="mt-1 text-sm text-zinc-400">{{ $subheading }}</p>
                        @endisset
                    </div>
                @endisset

                {{ $slot }}
            </div>
        </main>

    </div>

    @fluxScripts
</body>

</html>