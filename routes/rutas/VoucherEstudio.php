<?php

    Route::post('VoucherEstudio',                      'VoucherEstudioController@archivo')->          name('voucherEstudio.archivo');
    Route::get('VoucherEstudio/{voucherEstudio}',      'VoucherEstudioController@show')->             name('voucherEstudio.show'   );
?>