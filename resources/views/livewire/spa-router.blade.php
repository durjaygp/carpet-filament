<div>
    @if ($page === 'home')
        @livewire('pages.home')
    @elseif ($page === 'about')
        @livewire('pages.about')
    @endif
</div>
