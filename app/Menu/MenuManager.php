<?php
namespace App\Menu;

class MenuManager
{
    private $items = [];

    public function add($string, $route)
    {
        array_push($this->items, ['label' => $string, 'route' => $route]);
    }

    public function get() {
        return $this->items;
    }
}
