@php
    $detail = isset($detail) ? $detail : new Modules\Cart\Entities\CartDetail;
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
                        <div class="col-lg-6 product-col {{ $detail->target_type !== TargetType::PRODUCT && $form['title'] === 'Edit' ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id">Product <span class="text-red">*</span></label>
                                <select id="target_id" class="form-control select-required" aria-placeholder="not select" name="target_id">
                                    <option disabled selected data-price="0">-- choose product --</option>
                                    @foreach($products as $product)
                                        @if ($detail->target_type === TargetType::PRODUCT)
                                        <option value="{{ $product->id }}" {{ $detail->target_id === $product->id ? 'selected' : '' }} data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @else
                                        <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Product is required</span>
                            </div>
                        </div>
                        <div class="col-lg-6 variant-col {{ $detail->target_type !== TargetType::VARIANT ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id">Variant <span class="text-red">*</span></label>
                                <select id="target_id" class="form-control select-required" aria-placeholder="not select" name="target_id">
                                    <option disabled selected data-price="0">-- choose variant --</option>
                                    @foreach($variants as $variant)
                                        @if ($detail->target_type === TargetType::VARIANT)
                                        <option value="{{ $variant->id }}" {{ $detail->target_id === $variant->id ? 'selected' : '' }} data-price="{{ $variant->price }}">{{ $variant->name }}</option>
                                        @else
                                        <option value="{{ $variant->id }}" data-price="{{ $variant->price }}">{{ $variant->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Variant is required</span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="target_type">Target Type</label>
                                <select id="target_type" class="form-control" aria-placeholder="not select" name="target_type">
                                    @foreach($target_types as $target_type)
                                        <option value="{{ $target_type->code }}" {{ $detail->target_type === $target_type->code ? 'selected' : '' }}>{{ $target_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $detail->quantity ?: 1 }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" class="form-control" id="total" name="total" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.cart.detail.index', $cart_id) }}" class="btn btn-default">Back</a>
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

        function updatePriceTotal() {
            let price = $('select#target_id').find(':selected').data('price')
            let total = parseInt(price) * parseInt($('input#quantity').val())
            $('input#price').val(price)
            $('input#total').val(total)
        }
        updatePriceTotal()
        $('select#target_id').on('change', function() {
            updatePriceTotal()
        })
        $('input#quantity').on('change', function() {
            updatePriceTotal()
        })
    })
</script>
@endpush