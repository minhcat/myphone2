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
                                <label for="">Account <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input account" name="account" value="">
                                <span class="help-block hidden">Account is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Firstname <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input firstname" name="firstname" value="">
                                <span class="help-block hidden">Firstname is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Lastname <span class="text-red">*</span></label>
                                <input type="text" class="form-control" placeholder="input lastname" name="lastname" value="">
                                <span class="help-block hidden">Lastname is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Gender</label>
                                <div class="radio">
                                    <label for="gender1">
                                        <input type="radio" name="gender" id="gender1" value="{{ App\Enums\Gender::MALE }}">
                                        male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="gender2">
                                        <input type="radio" name="gender" id="gender2" value="{{ App\Enums\Gender::FEMALE }}">
                                        female
                                    </label>
                                </div>
                                <div class="radio">
                                    <label for="gender3">
                                        <input type="radio" name="gender" id="gender3" value="{{ App\Enums\Gender::OTHER }}">
                                        other
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Job</label>
                                <input type="text" class="form-control" placeholder="input job" name="job" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" placeholder="input email" name="email" value="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Admin</label>
                                <div class="checkbox">
                                    <label for="is_admin">
                                        <input type="checkbox" name="is_admin" id="is_admin">
                                        check
                                    </label>
                                </div>
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
</div>