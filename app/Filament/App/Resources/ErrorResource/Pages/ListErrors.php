<?php

namespace App\Filament\App\Resources\ErrorResource\Pages;

use App\Filament\App\Resources\ErrorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListErrors extends ListRecords
{
    protected static string $resource = ErrorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
