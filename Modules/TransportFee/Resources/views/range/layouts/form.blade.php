@php
    $transport_fee_area_case_range = isset($transport_fee_area_case_range) ? $transport_fee_area_case_range : new Modules\TransportFee\Entities\TransportFeeAreaCaseRange;
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_bottom">Total Range Bottom</label>
                                <input type="number" id="total_range_bottom" class="form-control" rows="4" name="total_range_bottom" value="{{ $transport_fee_area_case_range->total_range_bottom }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_bottom_type">Total Range Bottom Type</label>
                                <select class="form-control" name="total_range_bottom_type" id="total_range_bottom_type">
                                    <option value="0" disabled selected>-- choose type --</option>
                                    @foreach($total_range_types as $total_range_type)
                                        <option value="{{ $total_range_type->code }}" {{ $transport_fee_area_case_range->total_range_bottom_type === $total_range_type->code ? 'selected' : '' }}>{{ $total_range_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_top">Total Range Top</label>
                                <input type="number" id="total_range_top" class="form-control" name="total_range_top" value="{{ $transport_fee_area_case_range->total_range_top }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_top_type">Total Range Top Type</label>
                                <select class="form-control" name="total_range_top_type" id="total_range_top_type">
                                    <option value="0" disabled selected>-- choose type --</option>
                                    @foreach($total_range_types as $total_range_type)
                                        <option value="{{ $total_range_type->code }}" {{ $transport_fee_area_case_range->total_range_top_type === $total_range_type->code ? 'selected' : '' }}>{{ $total_range_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="cost">Cost <span class="text-red">*</span></label>
                                <input type="number" id="cost" class="form-control input-required" name="cost" value="{{ $transport_fee_area_case_range->cost }}">
                                <span class="help-block require hidden">Cost is required</span>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id]) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
