<x-layouts.admin>
    <x-slot:heading>Dashboard</x-slot:heading>
    <x-slot:subheading>Welcome back, {{ auth()->user()->name }}. Here's what's happening.</x-slot:subheading>

    {{-- ── Stat cards ─────────────────────────────────────────── --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">

        <x-admin.stat-card label="Published Pages" :value="$stats['pages']" icon="document-text"
            :href="route('admin.pages.index')" trend="+2 this week" :trendUp="true" />

        <x-admin.stat-card label="Blog Posts" :value="$stats['posts']" icon="newspaper"
            :href="route('admin.posts.index')" trend="+5 this month" :trendUp="true" />

        <x-admin.stat-card label="Loan Products" :value="$stats['products']" icon="banknotes"
            :href="route('admin.products.index')" />

    </div>

    {{-- ── Quick actions ────────────────────────────────────────── --}}
    <div class="mt-8">
        <h2 class="mb-4 text-sm font-semibold uppercase tracking-widest text-zinc-600">
            Quick Actions
        </h2>
        <div class="flex flex-wrap gap-3">
            <flux:button href="{{ route('admin.pages.index') }}" variant="ghost" size="sm"
                class="border border-white/[0.07] text-zinc-300 hover:text-white hover:border-orange-500/30">
                <flux:icon.plus class="size-4 mr-1.5" />
                New Page
            </flux:button>
            <flux:button href="{{ route('admin.posts.index') }}" variant="ghost" size="sm"
                class="border border-white/[0.07] text-zinc-300 hover:text-white hover:border-orange-500/30">
                <flux:icon.plus class="size-4 mr-1.5" />
                New Post
            </flux:button>
            <flux:button href="{{ route('admin.contacts.index') }}" variant="ghost" size="sm"
                class="border border-white/[0.07] text-zinc-300 hover:text-white hover:border-orange-500/30">
                <flux:icon.envelope class="size-4 mr-1.5" />
                View Contacts
            </flux:button>
        </div>
    </div>

    {{-- ── System info strip ───────────────────────────────────── --}}
    <div class="mt-10 flex flex-wrap items-center gap-x-6 gap-y-2
                border-t border-white/[0.05] pt-6 text-xs text-zinc-700">
        <span>Laravel {{ app()->version() }}</span>
        <span>PHP {{ phpversion() }}</span>
        <span>Env: <span class="text-zinc-500">{{ app()->environment() }}</span></span>
        <span class="ml-auto">
            Logged in as
            <span class="text-zinc-500">{{ auth()->user()->email }}</span>
            &middot;
            <span class="capitalize text-orange-700">{{ auth()->user()->getRoleNames()->first() }}</span>
        </span>
    </div>

</x-layouts.admin>