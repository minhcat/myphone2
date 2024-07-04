@php
    $gift_product = isset($gift_product) ? $gift_product : new Modules\Sale\Entities\SaleProduct;
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">{{ $form['title'] }}</div>
            </div>
            <form action="{{ $form['url'] }}" method="{{ $form['method'] == 'GET' ? 'GET' : 'POST' }}">
                @csrf
                @if ($form['method'] !== 'GET')
                    @method($form['method'])
                @endif
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6 product-col {{ $gift_product->target_type !== TargetType::PRODUCT && $form['title'] === 'Edit' ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id">Product <span class="text-red">*</span></label>
                                <select id="target_id" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $gift_product->target_id === $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 variant-col {{ $gift_product->target_type !== TargetType::VARIANT ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id">Variant <span class="text-red">*</span></label>
                                <select id="target_id" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose variant --</option>
                                    @foreach($variants as $variant)
                                        <option value="{{ $variant->id }}" {{ $gift_product->target_id === $variant->id ? 'selected' : '' }}>{{ $variant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="target_type">Target Type <span class="text-red">*</span></label>
                                <select id="target_type" class="form-control" aria-placeholder="not select" name="target_type">
                                    @foreach($target_types as $target_type)
                                        <option value="{{ $target_type->code }}" {{ $gift_product->target_type === $target_type->code ? 'selected' : '' }}>{{ $target_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $gift_product->quantity }}" autocomplete="quantity">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.gift.product.index', $gift_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        const PRODUCT_TYPE = {{ TargetType::PRODUCT }}
        const VARIANT_TYPE = {{ TargetType::VARIANT }}
        $(function() {
            $('select#target_type').change(function() {
                let value = $(this).val()
                if (value == PRODUCT_TYPE) {
                    $('.product-col').removeClass('hidden')
                    $('.variant-col').addClass('hidden')
                    $('.variant-col select').val(null)
                } else if (value == VARIANT_TYPE) {
                    $('.variant-col').removeClass('hidden')
                    $('.product-col').addClass('hidden')
                    $('.product-col select').val(null)
                }
            })
        })
    </script>
@endpush
