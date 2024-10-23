<?php

    use CarvingIT\Hierarchies\Controllers\HierarchiesController;

    Route::get('xyz', function (){
    return 'hello';
    });

    Route::get('hierarchies', [HierarchiesController::class, 'index'])->name('hierarchies');
    Route::post('hierarchies/add_position',[HierarchiesController::class, 'addPosition'])->name('add_position');
?>
