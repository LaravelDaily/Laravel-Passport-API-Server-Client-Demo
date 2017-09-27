@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.users.title')</h3>
    @can('user_create')
        <p>
            <a href="{{ route('admin.users.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>

        </p>
    @endcan



    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($users) > 0 ? 'datatable' : '' }} @can('user_delete') dt-select @endcan">
                <thead>
                <tr>
                    @can('user_delete')
                        <th style="text-align:center;"><input type="checkbox" id="select-all"/></th>
                    @endcan

                    <th>@lang('quickadmin.users.fields.name')</th>
                    <th>@lang('quickadmin.users.fields.email')</th>
                    <th>@lang('quickadmin.users.fields.role')</th>
                    <th>&nbsp;</th>

                </tr>
                </thead>

                <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr data-entry-id="{{ $user->id }}">
                            @can('user_delete')
                                <td></td>
                            @endcan

                            <td field-key='name'>{{ $user->name }}</td>
                            <td field-key='email'>{{ $user->email }}</td>
                            <td field-key='role'>{{ $user->role->title or '' }}</td>
                            <td>
                                @can('user_view')
                                    <a href="{{ route('admin.users.show',[$user->id]) }}"
                                       class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                @endcan
                                @can('user_edit')
                                    <a href="{{ route('admin.users.edit',[$user->id]) }}"
                                       class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                @endcan
                                @can('user_delete')
                                    {!! Form::open(array(
                                                                            'style' => 'display: inline-block;',
                                                                            'method' => 'DELETE',
                                                                            'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                                                            'route' => ['admin.users.destroy', $user->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                            </td>

                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('user_delete')
            window.route_mass_crud_entries_destroy = '{{ route('admin.users.mass_destroy') }}';
        @endcan

    </script>
@endsection