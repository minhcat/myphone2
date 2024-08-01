@php
    $voucher_code = isset($voucher_code) ? $voucher_code : new Modules\Sale\Entities\SaleProduct;
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
                                <label for="code">Code <span class="text-red">*</span></label>
                                <input id="code" type="text" class="form-control input-required" name="code" value="{{ $voucher_code->code }}" autocomplete="code">
                                <span class="help-block require hidden">Code is require</span>
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
                                        <option value="{{ $discount_type->code }}" {{ $voucher_code->discount_type === $discount_type->code ? 'selected' : '' }}>{{ $discount_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_value">Discount Value</label>
                                <input id="discount_value" type="number" class="form-control" name="discount_value" value="{{ $voucher_code->discount_value }}" autocomplete="discount_value">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_minimum">Discount Minimum</label>
                                <input id="discount_minimum" type="number" class="form-control" name="discount_minimum" value="{{ $voucher_code->discount_minimum }}" autocomplete="discount_minimum">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_maximum">Discount Maximum</label>
                                <input id="discount_maximum" type="number" class="form-control" name="discount_maximum" value="{{ $voucher_code->discount_maximum }}" autocomplete="discount_maximum">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.voucher.code.index', $voucher_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
