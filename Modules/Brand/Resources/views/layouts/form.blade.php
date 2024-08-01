@php
    $brand = isset($brand) ? $brand : new Modules\Brand\Entities\Brand;
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
                                <input type="text" class="form-control input-required" name="name" value="{{ $brand->name }}">
                                <span class="help-block require hidden">Name is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Country</label>
                                <select class="form-control" aria-placeholder="not select" name="country">
                                    <option disabled selected>-- choose country --</option>
                                    <option value="usa"     {{ $brand->country == 'usa' ? 'selected' : '' }}>USA</option>
                                    <option value="japan"   {{ $brand->country == 'japan' ? 'selected' : '' }}>Japan</option>
                                    <option value="korea"   {{ $brand->country == 'korea' ? 'selected' : '' }}>Korea</option>
                                    <option value="china"   {{ $brand->country == 'china' ? 'selected' : '' }}>China</option>
                                    <option value="vietnam" {{ $brand->country == 'vietnam' ? 'selected' : '' }}>Vietnam</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="4" name="description">{{ $brand->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Note <span class="fa fa-fw fa-question-circle" data-toggle="tooltip" title="Admin Note"></span></label>
                                <input type="text" class="form-control" name="note" value="{{ $brand->note }}">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.brand.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
