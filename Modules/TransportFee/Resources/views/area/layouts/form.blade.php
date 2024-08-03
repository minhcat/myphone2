@php
    $transport_fee_area = isset($transport_fee_area) ? $transport_fee_area : new Modules\Transporter\Entities\Transporter;
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
                                <label for="area_id">Area <span class="text-red">*</span></label>
                                <select class="form-control select-required" name="area_id" id="area_id">
                                    <option value="0" disabled selected>-- choose area --</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}" {{ $transport_fee_area->area_id === $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Area is required</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.transport_fee.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
