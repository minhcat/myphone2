@php
    $user = isset($user) ? $user : new Modules\User\Entities\User;
@endphp
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
                                <input type="text" class="form-control input-required" placeholder="input account" name="account" value="{{ old('account', $user->account) }}">
                                <span class="help-block require hidden">Account is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Email <span class="text-red">*</span></label>
                                <input type="text" class="form-control input-required input-email" placeholder="input email" name="email" value="{{ old('email', $user->email) }}">
                                <span class="help-block require hidden">Email is require</span>
                                <span class="help-block email hidden">Email is invalid</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Firstname <span class="text-red">*</span></label>
                                <input id="firstname" type="text" class="form-control input-required" placeholder="input firstname" name="firstname" value="{{ old('firstname', $user->firstname) }}">
                                <span class="help-block require hidden">Firstname is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="lastname">Lastname <span class="text-red">*</span></label>
                                <input id="lastname" type="text" class="form-control input-required" placeholder="input lastname" name="lastname" value="{{ old('lastname', $user->lastname) }}">
                                <span class="help-block require hidden">Lastname is require</span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Gender</label>
                                @foreach($genders as $key => $gender)
                                <div class="radio">
                                    <label for="gender{{ $key }}">
                                        <input type="radio" name="gender" id="gender{{ $key }}" value="{{ $gender->code }}" {{ old('gender') == $gender->code || $user->gender === $gender->code ? 'checked' : '' }}>
                                        {{ $gender->name }}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Job</label>
                                <input type="text" class="form-control" placeholder="input job" name="job" value="{{ old('job', $user->job) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="">Role</label>
                                @foreach($roles as $role)
                                <div class="checkbox">
                                    <label for="is_admin_{{ $role->id }}">
                                        <input type="checkbox" name="role[{{ $role->id }}]" id="is_admin_{{ $role->id }}" {{ isset(old('role')[$role->id]) || (!is_null($user->roles) && in_array($role->id, $user->roles->pluck('id')->toArray())) ? 'checked' : '' }}>
                                        {{ $role->name }}
                                    </label> 
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>