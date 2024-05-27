@php
    $promotion = isset($promotion) ? $promotion : new Modules\Promotion\Entities\Promotion;
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
                                <input id="name" type="text" class="form-control" name="name" value="{{ $promotion->name }}" autocomplete="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $promotion->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="condition_id">Condition</label>
                                <select id="condition_id" class="form-control" aria-placeholder="not select" name="condition_id">
                                    <option disabled selected>-- choose condition --</option>
                                    <option value="1" {{ $promotion->condition_id == 1 ? 'selected' : '' }}>Invoice Total</option>
                                    <option value="2" {{ $promotion->condition_id == 2 ? 'selected' : '' }}>Product Sale</option>
                                    <option value="3" {{ $promotion->condition_id == 3 ? 'selected' : '' }}>Category Sale</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_form_id">Discount Form</label>
                                <select id="discount_form_id" class="form-control" aria-placeholder="not select" name="discount_form_id">
                                    <option disabled selected>-- choose discount form --</option>
                                    <option value="1" {{ $promotion->discount_form_id == 1 ? 'selected' : '' }}>Discount Invoice Amount</option>
                                    <option value="2" {{ $promotion->discount_form_id == 2 ? 'selected' : '' }}>Discount Invoice Percent</option>
                                    <option value="3" {{ $promotion->discount_form_id == 3 ? 'selected' : '' }}>Discount Product Amount</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="start_time" name="start_time" value="{{ $promotion->starttime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="start_date" name="start_date" value="{{ $promotion->startdate }}">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-clock-o"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="end_time" name="end_time" value="{{ $promotion->endtime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="end_date" name="end_date" value="{{ $promotion->enddate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('promotion.index') }}" class="btn btn-default">Back</a>
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