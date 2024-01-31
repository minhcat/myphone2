<ol class="dd-list">
    @foreach($items as $item)
        <li class="dd-item" data-id="{{ $item->id }}">
            <div class="dd-handle">{{ optional($item)->name }}</div>
            @if ($item->children()->exists())
                @include('category::layouts.nestable', ['items' => $item->children])
            @endif
        </li>
    @endforeach
</ol>