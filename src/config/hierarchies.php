<?php
    return [
        // change the following path to make the package accessible at the path you want
        'base_path'=>'/admin/hierarchies', 

        // use a full path of your custom middleware[s]
        // e.g. \App\Http\Middleware\Admin::class
        // these middlewares apply to all the package routes.
        // 'web' is required as the first guard. Do not remove.
        'middleware'=> ['web','auth']
    ];

