@php
    $product = isset($product) ? $product : new Modules\Product\Entities\Product;
@endphp
<div class="row">
    <form action="{{ $form['url'] }}" method="{{ $form['method'] == 'GET' ? 'GET' : 'POST' }}">
        @csrf
        @method($form['method'])
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">{{ $form['title'] }}</div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="brand_id">Brand</label>
                                <select id="brand_id" class="form-control" aria-placeholder="not select" name="brand_id">
                                    <option disabled selected>-- choose brand --</option>
                                    @foreach($brands as $brand)
                                        <option value="1" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-red">*</span></label>
                                <input id="name" type="text" class="form-control" placeholder="input name" name="name" value="{{ $product->name ?? '' }}" autocomplete="phone">
                                <span class="help-block hidden">Name is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="price">Price <span class="text-red">*</span></label>
                                <input id="price" type="text" class="form-control" placeholder="input price" name="price" value="{{ $product->price ?? '' }}">
                                <span class="help-block hidden">Price is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="note">Note <span class="fa fa-fw fa-question-circle" data-toggle="tooltip" title="Admin Note"></span></label>
                                <input id="note" type="text" class="form-control" name="note" value="{{ $product->note }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.product.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-primary box-category">
                <div class="box-header with-border">
                    <div class="box-title">Categories</div>
                </div>
                <div class="box-body px-0 pr-0">
                    <p class="mb-3 hidden">Check product categories</p>
                    <div class="box-content">
                        <ul class="form-group">
                            @include('product::product.layouts.nestable', ['items' => $categories, 'checked_list' => $product->categories->pluck('id')->toArray()])
                        </ul>
                    </div>
                </div>
                <div class="box-footer p-4"></div>
            </div>
            <div class="box box-primary" id="tag-box">
                <div class="box-header with-border">
                    <div class="box-title">Tags</div>
                </div>
                <div class="box-body p-5">
                    <div class="group">
                        @php
                            $highlight_tags = $product->tags->pluck('id')->toArray();
                        @endphp

                        @foreach($tags as $tag)
                            <div class="badge {{ in_array($tag->id, $highlight_tags) ? 'bg-blue' : '' }}" data-id="{{ $tag->id }}">{{ $tag->name }}</div>
                        @endforeach
                        <input type="hidden" name="tags" id="tags" value="[{{ join(',', $highlight_tags) }}]">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('script')
<script>
    $(function() {
        var tags = '[]';
        $('#tag-box .box-body .badge').click(function() {
            const id = $(this).data('id')
            if ($(this).hasClass('bg-blue')) {
                $(this).removeClass('bg-blue')
                var tags = JSON.parse($('#tags').val())
                const index = tags.indexOf(id)
                if (index > -1) {
                    tags.splice(index, 1)
                }
                $('#tags').val(JSON.stringify(tags))
            } else {
                $(this).addClass('bg-blue')
                var tags = JSON.parse($('#tags').val())
                tags.push($(this).data('id'))
                $('#tags').val(JSON.stringify(tags))
            }
        })
    })
</script>
@endpush
