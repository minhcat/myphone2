@php
    $gift = isset($gift) ? $gift : new Modules\Gift\Entities\Gift;
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
                                <input id="name" type="text" class="form-control input-required" name="name" value="{{ $gift->name }}" autocomplete="name">
                                <span class="help-block require hidden">Name is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $gift->description }}</textarea>
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
                                            <input type="text" class="form-control pull-right" id="start_time" name="start_time" value="{{ $gift->starttime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="start_date" name="start_date" value="{{ $gift->startdate }}">
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
                                            <input type="text" class="form-control pull-right" id="end_time" name="end_time" value="{{ $gift->endtime }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="end_date" name="end_date" value="{{ $gift->enddate }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.gift.index') }}" class="btn btn-default">Back</a>
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