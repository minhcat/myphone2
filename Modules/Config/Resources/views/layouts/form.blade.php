@php
    $config = isset($config) ? $config : new Modules\Config\Entities\Config;
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
                                <input type="text" class="form-control input-required" name="name" value="{{ $config->name }}">
                                <span class="help-block require hidden">Name is required</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Type</label>
                                <select class="form-control" aria-placeholder="not select" name="type">
                                    <option disabled selected>-- choose type --</option>
                                    <option value="boolean" {{ $config->type == 'boolean' ? 'selected' : '' }}>Boolean</option>
                                    <option value="integer" {{ $config->type == 'integer' ? 'selected' : '' }}>Integer</option>
                                    <option value="float"   {{ $config->type == 'float'   ? 'selected' : '' }}>Float</option>
                                    <option value="string"  {{ $config->type == 'string'  ? 'selected' : '' }}>String</option>
                                    <option value="json"    {{ $config->type == 'json'    ? 'selected' : '' }}>Json</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="value">Value</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="value" value="{{ $config->value }}" id="value">
                                    <span class="input-group-addon"><input type="checkbox" name="value_null" {{ $form['title'] == 'Edit' && $config->value === null ? 'checked' : '' }}> null</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="default">Default</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="default" value="{{ $config->default }}" id="default">
                                    <span class="input-group-addon"><input type="checkbox" name="default_null" {{ $form['title'] == 'Edit' && $config->default === null ? 'checked' : '' }}> null</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="group">Group</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="group" value="{{ $config->group }}" id="group">
                                    <span class="input-group-addon"><input type="checkbox" name="group_null" {{ $form['title'] == 'Edit' && $config->group === null ? 'checked' : '' }}> null</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.config.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('script')
<script>
    $(function() {
        $('#value,#group,#default').change(function() {
            $(this).parent().find('.input-group-addon input').prop('checked', false)
        })
        $('.input-group-addon input').change(function() {
            if ($(this).is(':checked')) {
                $(this).parent().parent().find('input.form-control').val('')
            }
        })
    })
</script>
@endpush