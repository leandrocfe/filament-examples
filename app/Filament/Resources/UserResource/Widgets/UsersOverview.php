<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\Widget;

class UsersOverview extends Widget
{
    public $filters = null;

    protected static string $view = 'filament.resources.user-resource.widgets.users-overview';

    protected $listeners = ['updateWidget' => 'getFilters'];

    public function getFilters($data)
    {
        $this->filters = $data;
    }
}
