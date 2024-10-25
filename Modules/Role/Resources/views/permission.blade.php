@extends('role::layouts.master')

@section('title-page', 'Roles')

@section('small-info')
<small>Edit Role Permission</small>
@endsection

@section('breakcumb')
<ol class="breadcrumb">
    <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li><a href="{{ route('admin.role.index') }}">Role</a></li>
    <li class="active">Edit Permission</li>
</ol>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <div class="box-title">List</div>
            </div>
            <form action="{{ route('admin.role.update_permission', $role->id) }}" method="POST">
                @method('put')
                @csrf
                <div class="box-body">
                    <div class="table-body">
                        <table class="table table-bordered table-striped mt-3 fit-column">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Permission</th>
                                    <th>Order</th>
                                    <th>Approve</th>
                                    <th>Read</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>all</td>
                                    <td><input class="all-group order" type="checkbox" data-action="order"></td>
                                    <td><input class="all-group approve" type="checkbox" data-action="approve"></td>
                                    <td><input class="all-group read" type="checkbox" data-action="read"></td>
                                    <td><input class="all-group add" type="checkbox" data-action="add"></td>
                                    <td><input class="all-group edit" type="checkbox" data-action="edit"></td>
                                    <td><input class="all-group delete" type="checkbox" data-action="delete"></td>
                                    <td><input class="all-group all" type="checkbox" data-action="all" data-group="all-group"></td>
                                </tr>
                                @php $key = 1; @endphp
                                @foreach($permission_groups as $table_name => $permissions)
                                    @php $key++; @endphp
                                    <tr>
                                        <td class="min-width-40px">{{ $key }}</td>
                                        <td class="fit-width">{{ $table_name }}</td>
                                        @php 
                                            $actions = [':order', ':approve', ':read', ':add', ':edit', ':delete'];
                                        @endphp

                                        @for($i = 0; $i < 6; $i++)
                                            @php
                                                $check = true;
                                                $action = $actions[$i];
                                            @endphp
                                            
                                            @foreach($permissions as $permission)
                                                @if (str_contains($permission->key, $action))
                                                    <td>
                                                        <input
                                                        class="{{ $table_name }} {{ str_replace(':', '', $action) }}"
                                                        type="checkbox"
                                                        name="permission[{{ $permission->id }}]"
                                                        {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                    </td>

                                                    @php
                                                        $check = false;
                                                    @endphp

                                                    @break
                                                @endif
                                            @endforeach

                                            @if ($check)
                                                <td></td>
                                            @endif
                                        @endfor
                                        <td><input class="{{ $table_name }} all" data-group="{{ $table_name }}" type="checkbox" name="all"></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer">
                    <a href="{{ route('admin.role.index') }}" class="btn btn-default">Back</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(function() {
        $('input.all-group').change(function() {
            let action = $(this).data('action');
            $('input.'+action).prop('checked', this.checked)
            if (action == 'all') {
                $('input.all').each(function() {
                    let group = $(this).data('group')
                    $('input.'+group).prop('checked', this.checked)
                })
            }
        })
        $('input.all').change(function() {
            console.log('all')
            let group = $(this).data('group')
            $('input.'+group).prop('checked', this.checked)
        })
    })
</script>
@endpush