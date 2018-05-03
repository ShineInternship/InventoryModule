<?php

Route::group(['prefix' => 'inventory', 'namespace' => 'Modules\Inventory\Http\Controllers', 'middleware' => 'auth.access:inventory'], function()
{
    Route::get('/', 'InventoryController@index');

    Route::get('/events', 'InventoryController@getEventData');
    Route::post('/events/insert', 'InventoryController@insertNewEvent');
    Route::post('/events/update', 'InventoryController@update');
    Route::post('/events/moved', 'InventoryController@moved');
    Route::post('/events/delete', 'InventoryController@delete');
});
