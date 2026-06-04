@props(['route', 'icon'])

@php
    $active = request()->routeIs($route);
    $href = Route::has($route) ? route($route) : '#';
@endphp

<a href="{{ $href }}" @class([
    'flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition-all duration-150',
    'bg-orange-500/10 text-orange-400 font-medium' => $active,
    'text-zinc-400 hover:text-white hover:bg-white/[0.05]' => !$active,
])>
    <flux:icon :icon="$icon" @class(['size-4 shrink-0', 'text-orange-400' => $active, 'text-zinc-500' => !$active]) />
    <span>{{ $slot }}</span>

    @if($active)
        <span class="ml-auto h-1.5 w-1.5 rounded-full bg-orange-400"></span>
    @endif
</a>