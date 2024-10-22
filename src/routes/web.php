<?php

    use CarvingIT\Hierarchies\Controllers\HierarchiesController;

    Route::get('xyz', function (){
    return 'hello';
    });

    Route::get('hierarchies', [HierarchiesController::class, 'index'])
?>
