<!DOCTYPE html>
<html>
<head>
	<title>API</title>

	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="api-token" content="{{ session('api-token') }}">
    <meta name="api-url" content="{{ env('API_URL') }}">

	

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
<div  id='app'>

<div class="container" style='margin-top:20px;'>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Demo client</div>

                <div class="panel-body">

                    <div>

                        <a v-show='!token' href='{{ url("/redirect") }}' class='btn btn-danger btn-danger'>Login via
                            Passport</a>

                        <a v-show='token' href='{{ url("/forget-token") }}' class='btn btn-danger btn-danger'>Logout</a>

                        <a v-show='token' href='#' class='btn btn-warning' v-on:click='loadProjects'>Projects</a>

                        <a v-show='token' href="#" class='btn btn-success' v-on:click='newProject = !newProject'>Create new</a>
                       
                        <div v-show='newProject' style='margin-top: 20px;'>
                            <div  class='row'>
                                <div class='col col-xs-12'>
                                    <input class='form-control' type="text" v-model='newTitle' placeholder="Project name">
                                </div>
                            </div>
                            <div  class='row' style='margin-top:10px;'>
                                <div class='col col-xs-12'>
                                    <textarea class='form-control' v-model='newDescription' placeholder="Project description"></textarea>
                                </div>
                            </div>
                            <div  class='row' style='margin-top:10px;'>
                                <div class='col col-xs-12'>
                                    <a href="#" class='btn btn-success' v-on:click='create'>@{{ editId ? 'Save' : 'Create' }}</a>
                                    <a href="#" class='btn btn-default' v-on:click='cancel'>Cancel</a>
                                </div>
                            </div>
                        </div>

                        <table v-show='projects && token && !newProject' class='table table-bordered' style='margin-top:20px;'>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>&nbsp;</th>
                            </tr>
                            <tr v-for='project in projects'>
                                <td>@{{ project.title }}</td>
                                <td>@{{ project.description }}</td>
                                <td>
                                    <button class='btn btn-info btn-xs' v-on:click="edit(project)">Edit</button>
                                    <button class='btn btn-danger btn-xs' v-on:click="remove(project)">Delete</button>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>     

</body>
</html>

<script src="{{ asset('/js/app.js') }}"></script>
