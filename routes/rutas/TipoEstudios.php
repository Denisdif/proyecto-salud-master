<?php

    Route::get('tipo_estudios',                         'Tipo_estudioController@index')             ->name('tipo_estudios.index');
    Route::get('tipo_estudios/create',                  'Tipo_estudioController@create')            ->name('tipo_estudios.create');
    Route::post('tipo_estudios',                        'Tipo_estudioController@store')             ->name('tipo_estudios.store');
    Route::get('tipo_estudios/{tipo_estudio}',          'Tipo_estudioController@show')              ->name('tipo_estudios.show');
    Route::get('tipo_estudios/{tipo_estudio}/edit',     'Tipo_estudioController@edit')              ->name('tipo_estudios.edit');
    Route::patch('tipo_estudios/{id}',                  'Tipo_estudioController@update')            ->name('tipo_estudios.update');
    Route::delete('tipo_estudios/{id}',                 'Tipo_estudioController@destroy')           ->name('tipo_estudios.destroy');

?>