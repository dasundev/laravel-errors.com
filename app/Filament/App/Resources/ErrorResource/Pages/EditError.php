<?php

namespace App\Filament\App\Resources\ErrorResource\Pages;

use App\Filament\App\Resources\ErrorResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditError extends EditRecord
{
    protected static string $resource = ErrorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
