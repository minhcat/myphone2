@php
    $transporter_case = isset($transporter_case) ? $transporter_case : new Modules\Transporter\Entities\TransporterCase;
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
                                <input id="name" type="text" class="form-control input-required" name="name" value="{{ $transporter_case->name }}" autocomplete="name">
                                <span class="help-block require hidden">Name is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $transporter_case->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="estimate_time">Estimate Time</label>
                                <input class="form-control" type="number" name="estimate_time" id="estimate_time" value="{{ $transporter_case->estimate_time }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="estimate_time_type">Estimate Time Type</label>
                                <select class="form-control" name="estimate_time_type" id="estimate_time_type">
                                    @foreach($estimate_time_types as $estimate_time_type)
                                        <option value="{{ $estimate_time_type->code }}">{{ $estimate_time_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.transporter.case.index', $transporter_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
