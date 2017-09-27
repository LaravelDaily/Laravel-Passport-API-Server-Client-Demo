<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.', 'middleware' => ['api']], function () {

    Route::resource('projects', 'ProjectsController', ['except' => ['create', 'edit']]);

});
