@php
    $target = isset($target) ? $target : new Modules\Condition\Entities\ConditionTarget;
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
                                <input id="code" type="text" class="form-control" name="code" value="{{ $target->code }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_type">Type</label>
                                <select id="target_type" class="form-control" aria-placeholder="not select" name="target_type">
                                    <option disabled selected>-- choose handler --</option>
                                    @foreach($target_types as $type)
                                        <option value="{{ $type->code }}" {{ $target->target_type === $type->code || $type->code == $target_type_select ? 'selected' : '' }}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target product {{ $target->target_type === App\Enums\ConditionTargetType::PRODUCT ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_id_p">Product</label>
                                <select id="target_id_p" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose product --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $product->id == $target->target_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target product-group {{ $target->target_type === App\Enums\ConditionTargetType::PRODUCT_GROUP ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="parent_id">Parent</label>
                                <select id="parent_id" class="form-control" aria-placeholder="not select" name="parent_id">
                                    <option disabled selected>-- choose product parent --</option>
                                    <option value="">[Parent]</option>
                                    @foreach($targets as $target2)
                                        <option value="{{ $target2->id }}" {{ $target2->id == $target->target_id ? 'selected' : '' }}>{{ $target2->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target product-group {{ $target->target_type === App\Enums\ConditionTargetType::PRODUCT_GROUP ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_id_pg">Product Group</label>
                                <select id="target_id_pg" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose product --</option>
                                    <option value="">[Null]</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}" {{ $product->id == $target->target_id ? 'selected' : '' }}>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target variant {{ $target->target_type === App\Enums\ConditionTargetType::VARIANT ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_id_v">Variant</label>
                                <select id="target_id_v" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose variant --</option>
                                    @foreach($variations as $variant)
                                        <option value="{{ $variant->id }}" {{ $variant->id == $target->target_id ? 'selected' : '' }}>{{ $variant->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target category {{ $target->target_type === App\Enums\ConditionTargetType::CATEGORY ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_id_c">Category</label>
                                <select id="target_id_c" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose category --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $target->target_id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row target tag {{ $target->target_type === App\Enums\ConditionTargetType::TAG ? '' : 'hidden' }}">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="target_id_c">Tag</label>
                                <select id="target_id_c" class="form-control" aria-placeholder="not select" name="target_id">
                                    <option disabled selected>-- choose tag --</option>
                                    @foreach($tags as $tag)
                                        <option value="{{ $tag->id }}" {{ $tag->id == $target->target_id ? 'selected' : '' }}>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('condition.target.index', $condition_id) }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(function() {
            const VARIANT_TYPE          = {{ App\Enums\ConditionTargetType::VARIANT }}
            const PRODUCT_TYPE          = {{ App\Enums\ConditionTargetType::PRODUCT }}
            const PRODUCT_GROUP_TYPE    = {{ App\Enums\ConditionTargetType::PRODUCT_GROUP }}
            const CATEGORY_TYPE         = {{ App\Enums\ConditionTargetType::CATEGORY }}
            const TAG_TYPE              = {{ App\Enums\ConditionTargetType::TAG }}
            $('#target_type').change(function() {
                let value = $(this).val()
                if (value == VARIANT_TYPE) {
                    $('.row.target').addClass('hidden')
                    $('.row.target select').prop('disabled', true)
                    $('.row.target.variant').removeClass('hidden')
                    $('.row.target.variant select').prop('disabled', false)
                } else if (value == PRODUCT_TYPE) {
                    $('.row.target').addClass('hidden')
                    $('.row.target select').prop('disabled', true)
                    $('.row.target.product').removeClass('hidden')
                    $('.row.target.product select').prop('disabled', false)
                } else if (value == PRODUCT_GROUP_TYPE) {
                    $('.row.target').addClass('hidden')
                    $('.row.target select').prop('disabled', true)
                    $('.row.target.product-group').removeClass('hidden')
                    $('.row.target.product-group select').prop('disabled', false)
                } else if (value == CATEGORY_TYPE) {
                    $('.row.target').addClass('hidden')
                    $('.row.target select').prop('disabled', true)
                    $('.row.target.category').removeClass('hidden')
                    $('.row.target.category select').prop('disabled', false)
                } else if (value == TAG_TYPE) {
                    $('.row.target').addClass('hidden')
                    $('.row.target select').prop('disabled', true)
                    $('.row.target.tag').removeClass('hidden')
                    $('.row.target.tag select').prop('disabled', false)
                } else {
                    $('.row.target').addClass('hidden')
                }
            })
            $('#parent_id').change(function() {
                let value = $(this).val()
                console.log('parent', value)
                if (value === '') {
                    console.log('null')
                    $('.row.target.product-group select#target_id_pg').val('')
                    $('.row.target.product-group select#target_id_pg').prop('disabled', true)
                }
            })
        })
    </script>
@endpush