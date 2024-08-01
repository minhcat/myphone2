@php
    $address = isset($address) ? $address : new Modules\User\Entities\Address;
@endphp
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Title</div>
            </div>
            <form action="{{ $form['url'] }}" method="{{ $form['method'] == 'GET' ? 'GET' : 'POST' }}">
                @csrf
                @method($form['method'])
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="content">Content <span class="text-red">*</span></label>
                                <input type="text" class="form-control input-required" placeholder="input content" name="content" value="{{ $address->content }}">
                                <span class="help-block require hidden">Content is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row ward-row">
                        <div class="col-lg-4 ward-col">
                            <div class="form-group">
                                <label for="ward_id">Ward <span class="text-red">*</span></label>
                                <select id="ward_id" class="form-control select-required" aria-placeholder="not select" name="ward_id">
                                    <option disabled selected value="0">-- choose ward --</option>
                                    @foreach($wards as $ward)
                                        @if ($address->ward_id === $ward->id)
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
                                    <label for="city_district_id_{{ $city->id }}">District</label>
                                    <select id="city_district_id_{{ $city->id }}" class="form-control district_id" aria-placeholder="not select" name="district_id">
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
                                <label for="city_id">City</label>
                                <select id="city_id" class="form-control" aria-placeholder="not select" name="city_id">
                                    <option disabled selected value="0">-- choose city --</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.user.address.index', $user_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(function() {
            // ward row
            $('select#city_id').change(function() {
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