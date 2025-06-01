<div>
    @if ($page === 'home')
        <livewire:pages.home />
    @elseif ($page === 'about')
        <livewire:pages.about />
    @elseif ($page === 'contact')
        <livewire:pages.contact />
    @elseif ($page === 'blog')
        <livewire:pages.blog />
    @elseif ($page === 'blog-detail' && $slug)
        <livewire:pages.blog-details :slug="$slug" />
    @endif
</div>
