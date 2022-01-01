<?php
namespace App\Menu\Facade;

use Illuminate\Support\Facades\Facade;

class MenuFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'menu';
    }
}
