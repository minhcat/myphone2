@php
    $transport_fee = isset($transport_fee) ? $transport_fee : new Modules\TransportFee\Entities\TransportFee;
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
                                <input id="name" type="text" class="form-control input-required" name="name" value="{{ $transport_fee->name }}" autocomplete="name">
                                <span class="help-block require hidden">Name is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $transport_fee->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="area_id">Area <span class="text-red">*</span></label>
                                <select class="form-control select-required" name="area_id" id="area_id">
                                    <option value="0" disabled selected>-- choose area --</option>
                                    @foreach($areas as $area)
                                        <option value="{{ $area->id }}" {{ $transport_fee->area_id === $area->id ? 'selected' : '' }}>{{ $area->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Area is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 case-col">
                            <div class="form-group">
                                <label for="transporter_case_id">Transporter Case <span class="text-red">*</span></label>
                                <select class="form-control select-required" name="transporter_case_id" id="transporter_case_id">
                                    <option value="0" disabled selected>-- choose case --</option>
                                    @foreach($transporter_cases as $transporter_case)
                                        <option value="{{ $transporter_case->id }}" {{ $transport_fee->transporter_case_id === $transporter_case->id ? 'selected' : '' }}>{{ $transporter_case->name_more }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Transporter case is required</span>
                            </div>
                        </div>
                        @foreach($transporters as $transporter)
                            <div class="col-lg-6 case-col transporter-{{ $transporter->id }} hidden">
                                <div class="form-group">
                                    <label for="transporter_case_id">Transporter Case <span class="text-red">*</span></label>
                                    <select class="form-control select-required" name="transporter_case_id" id="transporter_case_id">
                                        <option value="0" disabled selected>-- choose case --</option>
                                        @foreach($transporter->cases as $transporter_case2)
                                            <option value="{{ $transporter_case2->id }}" {{ $transport_fee->transporter_case_id === $transporter_case2->id ? 'selected' : '' }}>{{ $transporter_case2->name_more }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block require hidden">Transporter case is required</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="transporter_id">Transporter</label>
                                <select class="form-control" name="transporter_id" id="transporter_id">
                                    <option value="0" disabled selected>-- choose transporter --</option>
                                    @foreach($transporters as $transporter)
                                        <option value="{{ $transporter->id }}">{{ $transporter->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_bottom">Total Range Bottom</label>
                                <input type="number" id="total_range_bottom" class="form-control" rows="4" name="total_range_bottom" value="{{ $transport_fee->total_range_bottom }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_bottom_type">Total Range Bottom Type</label>
                                <select class="form-control" name="total_range_bottom_type" id="total_range_bottom_type">
                                    <option value="0" disabled selected>-- choose type --</option>
                                    @foreach($total_range_types as $total_range_type)
                                        <option value="{{ $total_range_type->code }}" {{ $transport_fee->total_range_bottom_type === $total_range_type->code ? 'selected' : '' }}>{{ $total_range_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_top">Total Range Top</label>
                                <input type="number" id="total_range_top" class="form-control" name="total_range_top" value="{{ $transport_fee->total_range_top }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="total_range_top_type">Total Range Top Type</label>
                                <select class="form-control" name="total_range_top_type" id="total_range_top_type">
                                    <option value="0" disabled selected>-- choose type --</option>
                                    @foreach($total_range_types as $total_range_type)
                                        <option value="{{ $total_range_type->code }}" {{ $transport_fee->total_range_top_type === $total_range_type->code ? 'selected' : '' }}>{{ $total_range_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="cost">Cost <span class="text-red">*</span></label>
                                <input type="number" id="cost" class="form-control input-required" name="cost" value="{{ $transport_fee->cost }}">
                                <span class="help-block require hidden">Cost is required</span>
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

@push('script')
<script>
    $(function() {
        $('select#transporter_id').change(function() {
            let value = $(this).val()
            $('.case-col').addClass('hidden')
            $('.case-col select').val(0)
            $('.case-col.transporter-'+value).removeClass('hidden')
        })
    })
</script>
@endpush
