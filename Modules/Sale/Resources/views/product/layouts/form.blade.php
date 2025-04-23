@php
    $sale_product = isset($sale_product) ? $sale_product : new Modules\Sale\Entities\SaleProduct;
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
                        <div class="col-lg-6 product-col {{ $sale_product->target_type !== TargetType::PRODUCT && $form['title'] === 'Edit' ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id">Product <span class="text-red">*</span></label>
                                <select id="target_id" class="form-control select-required" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose product --</option>
                                    @foreach($products as $product)
                                        @if (old('target_type') == TargetType::PRODUCT || $sale_product->target_type === TargetType::PRODUCT)
                                        <option value="{{ $product->id }}" {{ old('target_id') == $product->id || $sale_product->target_id === $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                        @else
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Product is required</span>
                            </div>
                        </div>
                        <div class="col-lg-6 variant-col {{ $sale_product->target_type !== TargetType::VARIANT ? 'hidden' : '' }}">
                            <div class="form-group">
                                <label for="target_id2">Variant <span class="text-red">*</span></label>
                                <select id="target_id2" class="form-control select-required" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose variant --</option>
                                    @foreach($variants as $variant)
                                        @if (old('target_type') == TargetType::VARIANT || $sale_product->target_type === TargetType::VARIANT)
                                        <option value="{{ $variant->id }}" {{ old('target_id') == $variant->id || $sale_product->target_id === $variant->id ? 'selected' : '' }}>{{ $variant->name }}</option>
                                        @else
                                        <option value="{{ $variant->id }}">{{ $variant->name }}</option>
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
                                        <option value="{{ $target_type->code }}" {{ old('target_type') == $target_type->code || $sale_product->target_type === $target_type->code ? 'selected' : '' }}>{{ $target_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_type">Discount Type</label>
                                <select id="discount_type" class="form-control" aria-placeholder="not select" name="discount_type">
                                    <option disabled selected>-- choose discount type --</option>
                                    @foreach($discount_types as $discount_type)
                                        <option value="{{ $discount_type->code }}" {{ old('discount_type') == $discount_type->code || $sale_product->discount_type === $discount_type->code ? 'selected' : '' }}>{{ $discount_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_value">Discount Value</label>
                                <input id="discount_value" type="number" class="form-control" name="discount_value" value="{{ old('discount_value', $sale_product->discount_value) }}" autocomplete="discount_value">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_minimum">Discount Minimum</label>
                                <input id="discount_minimum" type="number" class="form-control" name="discount_minimum" value="{{ old('discount_minimum', $sale_product->discount_minimum) }}" autocomplete="discount_minimum">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_maximum">Discount Maximum</label>
                                <input id="discount_maximum" type="number" class="form-control" name="discount_maximum" value="{{ old('discount_maximum', $sale_product->discount_maximum) }}" autocomplete="discount_maximum">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.sale.product.index', $sale_id) }}" class="btn btn-default">Back</a>
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
            function updateTargetColumn() {
                let value = $('select#target_type').val()
                if (value == PRODUCT_TYPE) {
                    $('.product-col').removeClass('hidden')
                    $('.variant-col').addClass('hidden')
                    $('.variant-col select').val(null)
                } else if (value == VARIANT_TYPE) {
                    $('.variant-col').removeClass('hidden')
                    $('.product-col').addClass('hidden')
                    $('.product-col select').val(null)
                }
            }
            updateTargetColumn()

            $('select#target_type').change(function() {
                updateTargetColumn()
            })
        })
    </script>
@endpush
