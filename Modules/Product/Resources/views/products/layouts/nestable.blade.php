@foreach($items as $item)
    <li class="checkbox">
        <label for="cate_1">
            <input type="checkbox" name="categories[{{ $item->id }}]" @if (in_array($item->id, $checked_list)) checked @endif> {{ $item->name }}
        </label>
        @if ($item->children()->exists())
            <ul class="form-group list-child">
                @include('product::products.layouts.nestable', ['items' => $item->children])
            </ul>
        @endif
    </li>
@endforeach