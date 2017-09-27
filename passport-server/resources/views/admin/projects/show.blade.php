@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.projects.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.projects.fields.title')</th>
                            <td field-key='title'>{{ $project->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.projects.fields.description')</th>
                            <td field-key='description'>{!! $project->description !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.projects.index') }}"
               class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
