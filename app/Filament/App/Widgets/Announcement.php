<?php

namespace App\Filament\App\Widgets;

use Filament\Widgets\Widget;

class Announcement extends Widget
{
    protected static string $view = 'filament.app.widgets.announcement';

    protected int | string | array $columnSpan = 'full';

    protected static bool $isLazy = false;
}
