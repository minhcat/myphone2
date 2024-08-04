@php
    $transport_fee_area_case = isset($transport_fee_area_case) ? $transport_fee_area_case : new Modules\TransportFee\Entities\TransportFeeAreaCase;
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
                                <label for="transporter_case_id">Case <span class="text-red">*</span></label>
                                <select class="form-control select-required" name="transporter_case_id" id="transporter_case_id">
                                    <option value="0" disabled selected>-- choose case --</option>
                                    @foreach($cases as $case)
                                        <option value="{{ $case->id }}" {{ $transport_fee_area_case->transporter_case_id === $case->id ? 'selected' : '' }}>{{ $case->name_more }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Case is required</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.transport_fee.area.case.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id]) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
