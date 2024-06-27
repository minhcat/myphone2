@php
    $sale = isset($sale) ? $sale : new Modules\Sale\Entities\Sale;
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
                                <label for="name">Name <span class="text-red">*</span></label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $sale->name }}" autocomplete="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $sale->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="discount_type">Discount Type</label>
                                <select id="discount_type" class="form-control" aria-placeholder="not select" name="discount_type">
                                    <option disabled selected>-- choose discount type --</option>
                                    @foreach($discount_types as $discount_type)
                                        <option value="{{ $discount_type->code }}" {{ $sale->discount_type === $discount_type->code ? 'selected' : '' }}>{{ $discount_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="discount_value">Discount Value</label>
                                <input id="discount_value" type="number" class="form-control" name="discount_value" value="{{ $sale->discount_value }}" autocomplete="discount_value">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="discount_minimum">Discount Minimum</label>
                                <input id="discount_minimum" type="number" class="form-control" name="discount_minimum" value="{{ $sale->discount_minimum }}" autocomplete="discount_minimum">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="discount_maximum">Discount Maximum</label>
                                <input id="discount_maximum" type="number" class="form-control" name="discount_maximum" value="{{ $sale->discount_maximum }}" autocomplete="discount_maximum">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="start_time" name="start_time" value="{{ $sale->starttime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="start_date" name="start_date" value="{{ $sale->startdate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="end_time" name="end_time" value="{{ $sale->endtime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="end_date" name="end_date" value="{{ $sale->enddate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.sale.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function() {
        $('#start_time').timepicker({
            defaultTime: null,
            showInputs: false,
            showMeridian: false,
            minuteStep: 1,
            showSeconds: true,
            secondStep: 1,
        })
        $('#start_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        })
        $('#end_time').timepicker({
            defaultTime: null,
            showInputs: false,
            showMeridian: false,
            minuteStep: 1,
            showSeconds: true,
            secondStep: 1,
        })
        $('#end_date').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        })
    })
</script>
@endpush