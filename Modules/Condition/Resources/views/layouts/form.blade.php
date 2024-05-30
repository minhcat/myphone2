@php
    $condition = isset($condition) ? $condition : new Modules\Condition\Entities\Condition;
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
                                <label for="">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $condition->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="4" name="description">{{ $condition->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Value</label>
                                <input type="number" class="form-control" name="value" value="{{ $condition->value }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Handler</label>
                                <select id="handler" class="form-control" aria-placeholder="not select" name="handler">
                                    <option disabled selected>-- choose handler --</option>
                                    <option value="1" {{ $condition->handler == 1 ? 'selected' : '' }}>Check Invoice Total</option>
                                    <option value="2" {{ $condition->handler == 2 ? 'selected' : '' }}>Check List Products</option>
                                    <option value="3" {{ $condition->handler == 3 ? 'selected' : '' }}>Check List Category</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="author_id" value="{{ Auth::check() ? Auth::user()->id : 1 }}">
                </div>
                <div class="box-footer">
                    <a href="{{ route('condition.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>