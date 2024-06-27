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
                                <label for="code">Code</label>
                                <input id="code" type="text" class="form-control" name="code" value="{{ is_null($variation->code) ? '#'.$product_id.'000' : $variation->code }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="attribute">Price <span class="text-red">*</span></label>
                                <input id="attribute" type="number" class="form-control" name="price" value="{{ $variation->price }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea id="description" class="form-control" rows="4" name="description">{{ $variation->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            @foreach($attributes as $key => $attribute)
                                <div class="form-group">
                                    <label class="full-width">{{ $attribute->name }}</label>
                                    @foreach($attribute->options as $option)
                                        <div class="radio">
                                            <label>
                                                <input 
                                                    type="radio"
                                                    name="option[{{ $key }}]"
                                                    class="option a{{ $key }}"
                                                    value="{{ $option->id }}"
                                                    {{ in_array($option->id, Arr::pluck($variation->options, 'id')) ? 'checked' : '' }}>
                                                {{ $option->value }}
                                            </label>
                                        </div>
                                    @endforeach
                                    <div class="radio">
                                        <label>
                                            <input 
                                                type="radio"
                                                name="option[{{ $key }}]"
                                                class="option a{{ $key }}"
                                                value="0"
                                                {{ count(array_diff(Arr::pluck($variation->options, 'id'), array_diff(Arr::pluck($variation->options, 'id'), Arr::pluck($attribute->options, 'id')))) == 0 ? 'checked' : '' }}
                                                >
                                            none
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <input type="hidden" name="product_id" value="{{ $product_id }}">
                    <input type="hidden" name="id" value="{{ $variation->id }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.product.variation.index', $product_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function() {
        $('input.option').change(function() {
            let order = $(this).data('order')
            let product_id = $('input[name=product_id]').val()
            let code = '#' + product_id
            let length = {{ count($attributes) }}
            for (let i = 0; i < length; i++) {
                let val = 0
                $('input.option.a' + i).each(function() {
                    if ($(this).is(':checked')) {
                        val = $(this).val()
                        return false
                    }
                })
                code += val
            }
            $('input#code').val(code)
        })
    })
</script>
@endpush