@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">Client management</div>

                <div class="panel-body" id="app">
                    <passport-clients></passport-clients>
                    <passport-authorized-clients></passport-authorized-clients>
                </div>
            </div>
        </div>
    </div>
@endsection
