@props(['label', 'value', 'icon', 'href' => '#', 'trend' => null, 'trendUp' => true])

<a href="{{ $href }}" class="group relative flex flex-col gap-4 overflow-hidden rounded-xl
          border border-white/[0.07] bg-zinc-900/60 p-5
          transition-all duration-200 hover:border-orange-500/30
          hover:bg-zinc-900 hover:shadow-lg hover:shadow-orange-500/5">

    {{-- Subtle glow on hover --}}
    <div class="pointer-events-none absolute -top-10 -right-10 h-28 w-28 rounded-full
                bg-orange-500/[0.07] blur-2xl opacity-0 transition-opacity
                duration-300 group-hover:opacity-100"></div>

    <div class="flex items-start justify-between">
        <div class="flex h-10 w-10 items-center justify-center rounded-lg
                    bg-orange-500/10 border border-orange-500/20 transition-colors
                    group-hover:bg-orange-500/15">
            <flux:icon :icon="$icon" class="size-5 text-orange-400" />
        </div>

        @if($trend)
            <span @class([
                'flex items-center gap-1 rounded-full px-2 py-0.5 text-xs font-medium',
                'bg-emerald-500/10 text-emerald-400' => $trendUp,
                'bg-red-500/10 text-red-400' => !$trendUp,
            ])>
                @if($trendUp)
                    <flux:icon.arrow-trending-up class="size-3" />
                @else
                    <flux:icon.arrow-trending-down class="size-3" />
                @endif
                {{ $trend }}
            </span>
        @endif
    </div>

    <div>
        <p class="text-3xl font-bold text-white tracking-tight">{{ $value }}</p>
        <p class="mt-0.5 text-sm text-zinc-500">{{ $label }}</p>
    </div>
</a>