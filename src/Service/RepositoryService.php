<?php

namespace Hakeem\Extra\Service;



class RepositoryService
{

    protected static function getStubs($type)
    {
        return file_get_contents(resource_path("extra/stubs/$type.stub"));
    }

    public static function ImplementNow($name)
    {
        if (!file_exists($path = app_path('/Repositories')))
            mkdir($path, 0777, true);

        if (!file_exists($path = app_path('/Services')))
            mkdir($path, 0777, true);



        self::MakeInterface($name);
        self::MakeRepositoryClass($name);
        self::MakeService($name);
        self::MakeController($name);
        self::MakeClass($name);
    }


    protected static function MakeInterface($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],

            self::GetStubs('RepositoryInterface')
        );

        file_put_contents(app_path("/Repositories/{$name}RepositoryInterface.php"), $template);
    }

    protected static function MakeRepositoryClass($name)
    {
        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Repository')
        );

        file_put_contents(app_path("/Repositories/{$name}Repository.php"), $template);
    }

    protected static function MakeService($name)
    {
        $template =  self::getStubs('Service');

        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Service')
        );

        if (!file_exists($path = app_path("/Services/{$name}Service.php")))
            file_put_contents(app_path("/Services/{$name}Service.php"), $template);
    }

    public static function MakeController($name)
    {


        // $template =  self::getStubs('Controller');

        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Controller')
        );

        if (!file_exists($path = app_path("/Http/Controllers/{$name}Controller.php")))
            file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);
    }

    public static function MakeClass($name)
    {


        // $template =  self::getStubs('Controller');

        $template = str_replace(
            ['{{modelName}}'],
            [$name],
            self::GetStubs('Class')
        );

        if (!file_exists($path = app_path("/Http/Controllers/{$name}Controller.php")))
            file_put_contents(app_path("/Http/Controllers/{$name}Controller.php"), $template);
    }
}
