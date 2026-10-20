@props(['href', 'active' => false])
<a href="{{ $href }}" {{ $attributes->class([
    'rounded-full px-3 py-1.5 text-[15px] font-medium transition',
    'bg-brand text-white dark:bg-brand-soft dark:text-night' => $active,
    'text-slate-600 hover:bg-sky-wash hover:text-brand dark:text-slate-300 dark:hover:bg-night-2 dark:hover:text-brand-soft' => ! $active,
]) }}>{{ $slot }}</a>
