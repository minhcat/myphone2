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
                <form action="{{ route('admin.cart.order', $cart->id) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="voucher_code">Voucher</label>
                                <input type="text" class="form-control" id="voucher_code" name="voucher_code" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="transporter_id_{{ $cart->id }}">Transporter</label>
                                <select class="transporter form-control" name="transporter_id" id="transporter_id_{{ $cart->id }}">
                                    <option value="0" disabled selected>-- choose transporter --</option>
                                    @foreach($transporters as $transporter)
                                        <option value="{{ $transporter->id }}">{{ $transporter->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 transporter-col">
                            <div class="form-group">
                                <label for="transporter_case_id_{{ $cart->id }}">Case</label>
                                <select class="form-control" name="transporter_case_id" id="transporter_case_id_{{ $cart->id }}">
                                    <option value="0" disabled selected>-- choose case --</option>
                                    @foreach($cases as $case)
                                        <option value="{{ $case->id }}">{{ $case->name_more }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach($transporters as $transporter)
                            <div class="col-lg-6 transporter-col transporter-{{ $transporter->id }} hidden">
                                <div class="form-group">
                                    <label for="transporter_case_id_{{ $transporter->id }}_{{ $cart->id }}">Case</label>
                                    <select class="form-control" name="transporter_case_id" id="transporter_case_id_{{ $transporter->id }}_{{ $cart->id }}">
                                        <option value="0" disabled selected>-- choose case --</option>
                                        @foreach($transporter->cases as $case)
                                            <option value="{{ $case->id }}">{{ $case->name_more }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="address_id">Address</label>
                                <select name="address_id" id="address_id" class="form-control">
                                    <option value="0" disabled selected>-- choose address --</option>
                                    @foreach($cart->user->addresses as $address)
                                        <option value="{{ $address->id }}">{{ $address->content }}, {{ $address->ward->name_more }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="products products-add"></div>
                </form>
                <hr>
                <div class="products products-minus">
                    @foreach($cart->details as $detail)
                        <div class="input-group mx-2">
                            <div class="input-group-btn group-product"><button class="btn btn-default" type="button">{{ optional($detail->target)->name }} - {{ optional($detail->target)->price_format }} đ</button></div>
                            <input type="number" class="form-control quantity" value="{{ $detail->quantity }}" name="details[{{ $detail->target->id }}][quantity]" max="{{ $detail->quantity }}" min="1">
                            <input type="hidden" class="form-control target_type" value="{{ $detail->target_type }}" name="details[{{ $detail->target->id }}][target_type]">
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

@push('script')
    <script>
        $(function() {
            $('#modal-add-order-{{ $cart->id }} select.transporter').change(function() {
                let value = $(this).val()
                $('#modal-add-order-{{ $cart->id }} .transporter-col').addClass('hidden')
                $('#modal-add-order-{{ $cart->id }} .transporter-col select').val(0)
                $('#modal-add-order-{{ $cart->id }} .transporter-col.transporter-'+value).removeClass('hidden')
            })
        })
    </script>
@endpush
