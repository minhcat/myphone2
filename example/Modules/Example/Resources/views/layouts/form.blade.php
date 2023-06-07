<div class="row">
    <div class="col-lg-9">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">Title</div>
            </div>
            <form action="#" method="GET">
                @csrf
                <div class="box-body">
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
                                <label for="">Number <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input price" name="price" value="{{ $product->price ?? '' }}">
                                <span class="help-block hidden">Number is require</span>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" aria-placeholder="not select" name="brand_id">
                                    <option disabled selected>-- choose status --</option>
                                    <option value="1">Raw</option>
                                    <option value="2">pending</option>
                                    <option value="3">approved</option>
                                    <option value="4">active</option>
                                    <option value="5">lock</option>
                                    <option value="6">hide</option>
                                </select>
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
                    <a href="#" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
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
                        <li class="checkbox"><label for="cate_1"><input type="checkbox"> Category 1</label></li>
                        <li class="checkbox"><label for="cate_2"><input type="checkbox"> Category 2</label></li>
                        <li class="checkbox">
                            <label for="cate_3"><input type="checkbox"> Category 3</label>
                            <ul class="form-group list-child">
                                <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 31</label></li>
                                <li class="checkbox">
                                    <label for="cate_32"><input type="checkbox"> Category 32</label>
                                    <ul class="form-group list-child">
                                        <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 321</label></li>
                                        <li class="checkbox"><label for="cate_32"><input type="checkbox"> Category 322</label></li>
                                    </ul>
                                </li>
                                <li class="checkbox"><label for="cate_31"><input type="checkbox"> Category 33</label></li>
                            </ul>
                        </li>
                        <li class="checkbox"><label for="cate_2"><input type="checkbox"> Category 4</label></li>
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
                    <div class="badge">tag1</div>
                    <div class="badge">tag2 lorem</div>
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
                    <div class="badge">tag16</div>
                </div>
            </div>
        </div>
    </div>
</div>
