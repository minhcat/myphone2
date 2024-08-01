@php
    $area_detail = isset($area_detail) ? $area_detail : new Modules\Area\Entities\AreaDetail;
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
                                <label for="territory_type">Territory Type <span class="text-red">*</span></label>
                                <select id="territory_type" class="form-control select-required" aria-placeholder="not select" name="territory_type">
                                    <option disabled selected value="0">-- choose territory type --</option>
                                    @foreach($territory_types as $territory_type)
                                        <option value="{{ $territory_type->code }}" {{ $area_detail->territory_type === $territory_type->code ? 'selected' : '' }}>{{ $territory_type->name }}</option>
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Territory type is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row city-row {{ $area_detail->territory_type == TerritoryType::CITY ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="city_id">City <span class="text-red">*</span></label>
                                <select id="city_id" class="form-control select-required" aria-placeholder="not select" name="city_id">
                                    <option disabled selected value="0">-- choose city --</option>
                                    @foreach($cities as $city)
                                        @if ($area_detail->territory_type == TerritoryType::CITY && $area_detail->territory_id === $city->id)
                                        <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                        @else
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">City is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row district-row {{ $area_detail->territory_type == TerritoryType::DISTRICT ? '' : 'hidden' }}">
                        <div class="col-lg-6 district-col">
                            <div class="form-group">
                                <label for="district_id">District <span class="text-red">*</span></label>
                                <select id="district_id" class="form-control select-required" aria-placeholder="not select" name="district_id">
                                    <option disabled selected value="0">-- choose district --</option>
                                    @foreach($districts as $district)
                                        @if ($area_detail->territory_type == TerritoryType::DISTRICT && $area_detail->territory_id === $district->id)
                                        <option value="{{ $district->id }}" selected>{{ $district->name_more }}</option>
                                        @else
                                        <option value="{{ $district->id }}">{{ $district->name_more }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">District is required</span>
                            </div>
                        </div>
                        @foreach($cities as $city)
                            <div class="col-lg-6 district-col district-city-col district-col-city{{ $city->id }} hidden">
                                <div class="form-group">
                                    <label for="city_district_id_{{ $city->id }}">District <span class="text-red">*</span></label>
                                    <select id="city_district_id_{{ $city->id }}" class="form-control select-required" aria-placeholder="not select" name="district_id">
                                        <option disabled selected value="0">-- choose district --</option>
                                        @foreach($city->districts as $city_district)
                                            <option value="{{ $city_district->id }}">{{ $city_district->name_more }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block require hidden">District is required</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="city_id_2">City</label>
                                <select id="city_id_2" class="form-control" aria-placeholder="not select" name="city_id">
                                    <option disabled selected value="0">-- choose city --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row ward-row {{ $area_detail->territory_type == TerritoryType::WARD ? '' : 'hidden' }}">
                        <div class="col-lg-4 ward-col">
                            <div class="form-group">
                                <label for="ward_id">Ward <span class="text-red">*</span></label>
                                <select id="ward_id" class="form-control select-required" aria-placeholder="not select" name="ward_id">
                                    <option disabled selected value="0">-- choose ward --</option>
                                    @foreach($wards as $ward)
                                        @if ($area_detail->territory_type == TerritoryType::WARD && $area_detail->territory_id === $ward->id)
                                        <option value="{{ $ward->id }}" selected>{{ $ward->name_more }}</option>
                                        @else
                                        <option value="{{ $ward->id }}">{{ $ward->name_more }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <span class="help-block require hidden">Ward is required</span>
                            </div>
                        </div>
                        @foreach($districts as $district)
                            <div class="col-lg-4 ward-col ward-district-col ward-col-district{{ $district->id }} hidden">
                                <div class="form-group">
                                    <label for="district_ward_id_{{ $district->id }}">Ward <span class="text-red">*</span></label>
                                    <select id="district_ward_id_{{ $district->id }}" class="form-control select-required" aria-placeholder="not select" name="ward_id">
                                        <option disabled selected value="0">-- choose ward --</option>
                                        @foreach($district->wards as $district_ward)
                                            <option value="{{ $district_ward->id }}">{{ $district_ward->name_more }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block require hidden">Ward is required</span>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-4 district-col">
                            <div class="form-group">
                                <label for="district_id_2">District</label>
                                <select id="district_id_2" class="form-control" aria-placeholder="not select" name="district_id">
                                    <option disabled selected value="0">-- choose district --</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name_more }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @foreach($cities as $city)
                            <div class="col-lg-4 ward-col ward-col-city{{ $city->id }} hidden">
                                <div class="form-group">
                                    <label for="city_ward_id_{{ $city->id }}">Ward <span class="text-red">*</span></label>
                                    <select id="city_ward_id_{{ $city->id }}" class="form-control select-required" aria-placeholder="not select" name="ward_id">
                                        <option disabled selected value="0">-- choose ward --</option>
                                        @foreach($city->wards as $city_ward)
                                            <option value="{{ $city_ward->id }}">{{ $city_ward->name_more }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block require hidden">Ward is required</span>
                                </div>
                            </div>
                            @foreach($city->districts as $city_district)
                                <div class="col-lg-4 ward-col ward-district-city-col ward-col-city{{ $city->id }} ward-col-district{{ $city_district->id }} hidden">
                                    <div class="form-group">
                                        <label for="city_district_ward_id_{{ $city_district->id }}">Ward <span class="text-red">*</span></label>
                                        <select id="city_district_ward_id_{{ $city_district->id }}" class="form-control select-required" aria-placeholder="not select" name="ward_id">
                                            <option disabled selected value="0">-- choose ward --</option>
                                            @foreach($city_district->wards as $city_district_ward)
                                                <option value="{{ $city_district_ward->id }}">{{ $city_district_ward->name }}</option>
                                            @endforeach
                                        </select>
                                        <span class="help-block require hidden">Ward is required</span>
                                    </div>
                                </div>
                            @endforeach
                            <div class="col-lg-4 district-col district-col-city{{ $city->id }} hidden">
                                <div class="form-group">
                                    <label for="city_district_id2_{{ $city->id }}">District</label>
                                    <select id="city_district_id2_{{ $city->id }}" class="form-control district_id" aria-placeholder="not select" name="district_id">
                                        <option disabled selected value="0">-- choose district --</option>
                                        @foreach($city->districts as $city_district)
                                            <option value="{{ $city_district->id }}">{{ $city_district->name_more }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="city_id_3">City</label>
                                <select id="city_id_3" class="form-control" aria-placeholder="not select" name="city_id">
                                    <option disabled selected value="0">-- choose city --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.area.detail.index', $area_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        const CITY_TYPE = {{ TerritoryType::CITY }}
        const DISTRICT_TYPE = {{ TerritoryType::DISTRICT }}
        const WARD_TYPE = {{ TerritoryType::WARD }}
        $(function() {
            $('select#territory_type').change(function() {
                let value = $(this).val()
                if (value == CITY_TYPE) {
                    $('.city-row').removeClass('hidden')
                    $('.district-row').addClass('hidden')
                    $('.district-row select').val(0)
                    $('.ward-row').addClass('hidden')
                    $('.ward-row select').val(0)
                } else if (value == DISTRICT_TYPE) {
                    $('.district-row').removeClass('hidden')
                    $('.city-row').addClass('hidden')
                    $('.city-row select').val(0)
                    $('.ward-row').addClass('hidden')
                    $('.ward-row select').val(0)
                } else if (value == WARD_TYPE) {
                    $('.ward-row').removeClass('hidden')
                    $('.city-row').addClass('hidden')
                    $('.city-row select').val(0)
                    $('.district-row').addClass('hidden')
                    $('.district-row select').val(0)
                }
            })

            // district row
            $('select#city_id_2').change(function() {
                let value = $(this).val()
                $('.district-row .district-col').addClass('hidden')
                $('.district-row .district-col select').val(0)
                $('.district-row .district-col-city'+value).removeClass('hidden')
            })

            // ward row
            $('select#city_id_3').change(function() {
                let value = $(this).val()
                $('.ward-row .district-col').addClass('hidden')
                $('.ward-row .ward-col').addClass('hidden')
                $('.ward-row .ward-col select').val(0)
                $('.ward-row .district-col-city'+value).removeClass('hidden')
                $('.ward-row .ward-col-city'+value).removeClass('hidden')
                $('.ward-row .ward-district-city-col').addClass('hidden')
            })

            $('select#district_id_2').change(function() {
                let value = $(this).val()
                $('.ward-row .ward-col').addClass('hidden')
                $('.ward-row .ward-col-district'+value).removeClass('hidden')
                $('.ward-row .ward-district-city-col').addClass('hidden')
            })

            $('select.district_id').change(function() {
                let value = $(this).val()
                $('.ward-row .ward-col').addClass('hidden')
                $('.ward-row .ward-col-district'+value).removeClass('hidden')
                $('.ward-row .ward-district-col').addClass('hidden')
            })
        })
    </script>
@endpush
