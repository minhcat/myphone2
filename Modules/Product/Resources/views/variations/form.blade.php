@php
    $variation = isset($variation) ? $variation : new Modules\Product\Entities\Variation;
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
                                <label for="value">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="value" value="{{ $variation->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" rows="4" name="description">{{ $variation->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($attributes as $attribute)
                                <div class="form-group">
                                    <label class="full-width">{{ $attribute->name }}</label>
                                    @foreach($attribute->options as $option)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="option[0][]" id="" value="">{{ $option->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('product.variation.index', $product_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>