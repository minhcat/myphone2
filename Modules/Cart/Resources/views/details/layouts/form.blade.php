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
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Product</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    <option selected disabled hidden>-- select product --</option>
                                    @foreach($products as $product)
                                        @if ($detail->product_id == $product->id)
                                            <option selected value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @else
                                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}</option>
                                        @endif
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
                </div>
                <div class="box-footer">
                    <a href="{{ route('cart.detail.index', $cart_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function() {
        function updatePriceTotal() {
            let price = $('select#product_id').find(':selected').data('price')
            let total = parseInt(price) * parseInt($('input#quantity').val())
            $('input#price').val(price)
            $('input#total').val(total)
        }
        updatePriceTotal()
        $('select#product_id').on('change', function() {
            updatePriceTotal()
        })
        $('input#quantity').on('change', function() {
            updatePriceTotal()
        })
    })
</script>
@endpush