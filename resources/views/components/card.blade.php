@props(['hover' => false])
<div {{ $attributes->class([
    'rounded-2xl border border-line bg-white p-5 shadow-sm shadow-brand/5 dark:border-night-line dark:bg-night-card dark:shadow-black/30',
    'transition hover:-translate-y-0.5 hover:border-brand dark:hover:border-brand-soft' => $hover,
]) }}>{{ $slot }}</div>
