<?php
    namespace Framework;

    Router::addRoute(new Route('task/{taskName}', 'TaskController@task', Route::METHOD_GET));
   Router::addRoute(new Route('wellcome/{name}/text/{text}', 'HelloController@hello', Route::METHOD_GET));
    echo "Маршруты добавлены<br>";