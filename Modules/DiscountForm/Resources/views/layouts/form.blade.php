@php
    $discount_form = isset($discount_form) ? $discount_form : new Modules\Condition\Entities\Condition;
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
                                <label for="code">Code <span class="text-red">*</span></label>
                                <input id="code" type="text" class="form-control" name="code" value="{{ $discount_form->code }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Name <span class="text-red">*</span></label>
                                <input id="name" type="text" class="form-control" name="name" value="{{ $discount_form->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="4" name="description">{{ $discount_form->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_type">Target Type <span class="text-red">*</span></label>
                                <select id="target_type" class="form-control" aria-placeholder="not select" name="target_type">
                                    <option disabled selected>-- choose target type --</option>
                                    @foreach($target_types as $target_type)
                                        <option value="{{ $target_type->code }}" {{ $discount_form->target_type === $target_type->code ? 'selected' : '' }}>{{ $target_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_type">Discount Type <span class="text-red">*</span></label>
                                <select id="discount_type" class="form-control" aria-placeholder="not select" name="discount_type">
                                    <option disabled selected>-- choose discount type --</option>
                                    @foreach($discount_types as $discount_type)
                                        <option value="{{ $discount_type->code }}" {{ $discount_form->discount_type === $target_type->code ? 'selected' : '' }}>{{ $discount_type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_value">Discount Value <span class="text-red">*</span></label>
                                <input id="discount_value" type="text" class="form-control" name="discount_value" value="{{ $discount_form->discount_value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_minimum">Discount Minimum</label>
                                <input id="discount_minimum" type="text" class="form-control" name="discount_minimum" value="{{ $discount_form->discount_minimum }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="discount_maximum">Discount Maximum</label>
                                <input id="discount_maximum" type="text" class="form-control" name="discount_maximum" value="{{ $discount_form->discount_maximum }}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('discount_form.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>