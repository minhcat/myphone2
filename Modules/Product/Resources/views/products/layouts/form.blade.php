@php
    $product = isset($product) ? $product : new Modules\Product\Entities\Product;
@endphp
<div class="row">
    <form action="{{ $form['url'] }}" method="{{ $form['method'] == 'GET' ? 'GET' : 'POST' }}">
        @csrf
        @method($form['method'])
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">{{ $form['title'] }}</div>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">SKU</label>
                                <input type="text" class="form-control" value="PRO-0010" disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="form-control" aria-placeholder="not select" name="brand_id">
                                    <option disabled selected>-- choose brand --</option>
                                    <option value="1" {{ $product->brand_id == 1 ? 'selected' : '' }}>Apple</option>
                                    <option value="2" {{ $product->brand_id == 2 ? 'selected' : '' }}>Samsung</option>
                                    <option value="3" {{ $product->brand_id == 3 ? 'selected' : '' }}>Xiaomi</option>
                                    <option value="4" {{ $product->brand_id == 4 ? 'selected' : '' }}>OPPO</option>
                                    <option value="5" {{ $product->brand_id == 5 ? 'selected' : '' }}>Vsmart</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Name <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input name" name="name" value="{{ $product->name ?? '' }}">
                                <span class="help-block hidden">Name is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Price <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input price" name="price" value="{{ $product->price ?? '' }}">
                                <span class="help-block hidden">Price is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" name="description" rows="4">{{ $product->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Note <span class="fa fa-fw fa-question-circle" data-toggle="tooltip" title="Admin Note"></span></label>
                                <input type="text" class="form-control" name="note" value="{{ $product->note }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('product.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-primary box-category">
                <div class="box-header with-border">
                    <div class="box-title">Categories</div>
                </div>
                <div class="box-body px-0 pr-0">
                    <p class="mb-3 hidden">Check product categories</p>
                    <div class="box-content">
                        <ul class="form-group">
                            @include('product::products.layouts.nestable', ['items' => $categories, 'checked_list' => $product->categories->pluck('id')->toArray()])
                        </ul>
                    </div>
                </div>
                <div class="box-footer p-4"></div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="box-title">Tags</div>
                </div>
                <div class="box-body p-5">
                    <div class="group">
                        @foreach($tags as $tag)
                            <div class="badge">{{ $tag->name }}</div>
                        @endforeach
                        {{-- <div class="badge">tag2 lorem</div>
                        <div class="badge bg-blue">tag3 lorem</div>
                        <div class="badge">tag4</div>
                        <div class="badge">tag5</div>
                        <div class="badge">tag6</div>
                        <div class="badge">tag7</div>
                        <div class="badge bg-blue">tag8 lorem</div>
                        <div class="badge">tag9</div>
                        <div class="badge bg-blue">tag10 lorem</div>
                        <div class="badge">tag11 lorem</div>
                        <div class="badge">tag12</div>
                        <div class="badge">tag13</div>
                        <div class="badge">tag14</div>
                        <div class="badge">tag15</div>
                        <div class="badge">tag16</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
