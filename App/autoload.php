<?php
spl_autoload_register(function ($classe) {
    $diretorios = [
        'App/Libraries',
        'App/Controllers',
        'App/Models',
        'App/Helpers'
    ];
    foreach ($diretorios as $diretorio) {
        $arquivo = (__DIR__ . DIRECTORY_SEPARATOR . $diretorio . DIRECTORY_SEPARATOR . $classe . '.php');
        if (file_exists($arquivo)) {
            require_once $arquivo;
            break;
        }
    }
    // Autoload para helpers
    $helpersPath = __DIR__ . "/Helpers";
    foreach (glob("$helpersPath/*.php") as $helperFile) {
        require_once $helperFile;
    }

    
});