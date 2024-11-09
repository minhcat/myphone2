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
                                    <th>Browse</th>
                                    <th>Read</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>All</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="min-width-40px">1</td>
                                    <td class="fit-width">all</td>
                                    <td><input class="group-all action-order" type="checkbox" data-action="order"></td>
                                    <td><input class="group-all action-approve" type="checkbox" data-action="approve"></td>
                                    <td><input class="group-all action-browse" type="checkbox" data-action="browse"></td>
                                    <td><input class="group-all action-read" type="checkbox" data-action="read"></td>
                                    <td><input class="group-all action-add" type="checkbox" data-action="add"></td>
                                    <td><input class="group-all action-edit" type="checkbox" data-action="edit"></td>
                                    <td><input class="group-all action-delete" type="checkbox" data-action="delete"></td>
                                    <td><input class="group-all action-all" type="checkbox" data-action="all" data-group="all"></td>
                                </tr>
                                @php $key = 1; @endphp
                                @foreach($permission_groups as $group_name => $permissions)
                                    @php $key++; @endphp
                                    <tr>
                                        <td class="min-width-40px">{{ $key }}</td>
                                        <td class="fit-width">{{ $group_name }}</td>
                                        @php 
                                            $actions = [':order', ':approve', ':browse', ':read', ':add', ':edit', ':delete'];
                                        @endphp

                                        @for($i = 0; $i < 7; $i++)
                                            @php
                                                $check = true;
                                                $action = $actions[$i];
                                                $action2 = str_replace(':', '', $action);
                                            @endphp
                                            
                                            @foreach($permissions as $permission)
                                                @if (str_contains($permission->key, $action))
                                                    <td>
                                                        <input
                                                        class="group-{{ $group_name }} action-{{ $action2 }}"
                                                        type="checkbox"
                                                        name="permission[{{ $permission->id }}]"
                                                        data-action="{{ $action2 }}"
                                                        data-group="{{ $group_name }}"
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
                                        <td><input class="group-{{ $group_name }} action-all" data-group="{{ $group_name }}" data-action="all" type="checkbox" name="all"></td>
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
        $('input.group-all.action-all').change(function() {
            $('input').prop('checked', this.checked)
        })
        $('input.action-all').change(function() {
            let group = $(this).data('group')
            $('input.group-'+group).prop('checked', this.checked)
        })
        $('input.group-all').change(function() {
            let action = $(this).data('action')
            $('input.action-'+action).prop('checked', this.checked)
        })
        $('input').change(function() {
            let group = $(this).data('group')
            let check_group_all = true
            $('input.group-'+group+':not(.action-all)').each(function() {
                if (!this.checked) {
                    check_group_all = false
                    return false
                }
            })
            $('input.action-all.group-'+group).prop('checked', check_group_all)

            let action = $(this).data('action')
            let check_action_all = true
            $('input.action-'+action+':not(.group-all)').each(function() {
                if (!this.checked) {
                    check_action_all = false
                    return false
                }
            })
            $('input.group-all.action-'+action).prop('checked', check_action_all)

            let check_all = true
            $('input.group-all:not(.action-all)').each(function() {
                if (!this.checked) {
                    check_all = false
                    return false
                }
            })
            $('input.group-all.action-all').prop('checked', check_all)
        })

        function init_input_action_all() {
            let actions = ['order', 'approve', 'browse', 'read', 'edit', 'delete']
            actions.forEach(action => {
                let check_action_all = true
                $('input.action-'+action+':not(.group-all)').each(function() {
                    if (!this.checked) {
                        check_action_all = false
                        return false
                    }
                })
                $('input.group-all.action-'+action).prop('checked', check_action_all)
            });
        }
        init_input_action_all()

        function init_input_group_all() {
            let groups = [
                'area', 'area_detail', 'attribute', 'attribute_option', 'brand', 'cart', 'cart_detail',
                'category', 'city', 'city_district', 'city_district_ward', 'gift', 'gift_product', 'gift_product_item',
                'invoice', 'invoice_detail', 'order', 'order_detail', 'permission', 'product', 'product_detail', 'product_variation',
                'promotion', 'role', 'sale', 'sale_product', 'specification', 'specification_information', 'tag',
                'transporter', 'transporter_case', 'transport_fee', 'user', 'user_address', 'voucher', 'voucher_code'
            ]
            groups.forEach(group => {
                let check_group_all = true
                $('input.group-'+group+':not(.action-all)').each(function() {
                    if (!this.checked) {
                        check_group_all = false
                        return false
                    }
                })
                $('input.action-all.group-'+group).prop('checked', check_group_all)
            });
        }
        init_input_group_all()
    })
</script>
@endpush