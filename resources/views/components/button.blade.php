@props(['href', 'primary' => false])
<a href="{{ $href }}" {{ $attributes->class([
    'mb-2 mr-2 inline-block rounded-full border-[1.5px] border-brand px-5 py-2.5 font-medium transition hover:brightness-110 dark:border-brand-soft',
    'bg-brand text-white dark:bg-brand-soft dark:text-night' => $primary,
    'text-brand dark:text-brand-soft' => ! $primary,
]) }}>{{ $slot }}</a>
