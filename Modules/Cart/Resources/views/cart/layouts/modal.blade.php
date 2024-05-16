<div class="modal modal-add-order" id="modal-add-order-{{ $cart->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" type="button">
                    <span aria-hidden="true">x</span>
                </button>
                <h4 class="modal-title">Order Products</h4>
            </div>
            <div class="modal-body">
                <p>User: <span class="username">{{ $cart->user->fullname }}</span></p>
                <p>Quantity: <span class="quantity">0</span></p>
                <p>Total: <span class="total">0</span></p>
                <form action="{{ route('cart.order', $cart->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="address_id" value="1">
                    <div class="products products-add">
                    </div>
                </form>
                <hr>
                <div class="products products-minus">
                    @foreach($cart->details as $detail)
                        <div class="input-group mx-2">
                            <div class="input-group-btn group-product"><button class="btn btn-default" type="button">{{ optional($detail->product)->name }} - {{ optional($detail->product)->price_format }} đ</button></div>
                            <input type="number" class="form-control" value="{{ $detail->quantity }}" name="details[{{ $detail->product->id }}]">
                            <div class="input-group-btn"><button class="btn btn-default btn-add" type="button" data-id="{{ $cart->id }}" data-price="{{ $detail->price }}"><i class="fa fa-plus"></i><i class="fa fa-minus"></i></button></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                <button class="btn btn-primary" type="button" data-id="{{ $cart->id }}">Add</button>
            </div>
        </div>
    </div>
</div>