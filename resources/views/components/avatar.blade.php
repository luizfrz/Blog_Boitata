@props(['member', 'size' => 'size-14 text-xl'])
@if($member->photo)
    <img src="{{ asset('storage/'.$member->photo) }}" alt="" {{ $attributes->class([$size, 'shrink-0 rounded-full object-cover']) }}>
@else
    <div {{ $attributes->class([$size, 'grid shrink-0 place-items-center rounded-full bg-brand font-bold text-white dark:bg-brand-soft dark:text-night']) }}>{{ mb_strtoupper(mb_substr($member->name, 0, 1)) }}</div>
@endif
