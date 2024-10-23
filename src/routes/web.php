<?php

    use CarvingIT\Hierarchies\Controllers\HierarchiesController;

        Route::get('/', [HierarchiesController::class, 'index'])->name('hierarchies');
        Route::post('/add_position',[HierarchiesController::class, 'addPosition'])->name('add_position');
        Route::post('/remove_position', [HierarchiesController::class, 'removePosition'])->name('remove_position');
?>
