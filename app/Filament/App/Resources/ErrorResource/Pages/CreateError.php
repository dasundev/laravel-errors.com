<?php

namespace App\Filament\App\Resources\ErrorResource\Pages;

use App\Filament\App\Resources\ErrorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateError extends CreateRecord
{
    protected static string $resource = ErrorResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = Auth::id();

        return $data;
    }
}
