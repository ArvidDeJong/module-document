<flux:table.row>
    <flux:table.cell><x-manta.tables.image :item="$item->upload" /></flux:table.cell>
    <flux:table.cell>{{ $item->title }}</flux:table.cell>
    @if ($fields['slug']['active'])
        <flux:table.cell>
            @if ($item->slug && Route::has('website.document-item'))
                <a href="{{ route('website.document-item', ['slug' => $item->slug]) }}"
                    class="text-blue-500 hover:text-blue-800">
                    {{ $item->slug }}
                </a>
            @endif
        </flux:table.cell>
    @endif

    @if ($fields['author']['active'])
        <flux:table.cell>{{ $item->author }}</flux:table.cell>
    @endif

    @if ($fields['documentcat']['active'])
        <flux:table.cell>{{ count($item->categories) > 0 ? count($item->categories) : null }}</flux:table.cell>
    @endif

    @if ($fields['uploads']['active'])
        <flux:table.cell>{{ count($item->uploads) > 0 ? count($item->uploads) : null }}</flux:table.cell>
    @endif
    <x-manta::flux.manta-flux-delete :$item :$route_name :$moduleClass uploads :$fields />
</flux:table.row>
