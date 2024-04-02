<?php

namespace App\Filament\App\Resources\ErrorResource\Pages;

use App\Enums\ErrorStatus;
use App\Filament\App\Resources\ErrorResource;
use App\Models\Error;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;

class EditError extends EditRecord
{
    protected static string $resource = ErrorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Request approval for publish')
                ->action(function (Error $error) {
                    $error->markAsPending();

                    Notification::make()
                        ->success()
                        ->title('Thanks for your support! ❤️')
                        ->body('Your error and solution is waiting for approval.')
                        ->persistent()
                        ->send();
                })
                ->hidden(fn (Error $error) => $error->status === ErrorStatus::Pending | $error->status === ErrorStatus::Approved)
                ->requiresConfirmation()
                ->modalHeading('Request Approval for Publish')
                ->modalDescription('Are you sure you double checked everything?')
                ->modalSubmitActionLabel('Yes')
        ];
    }
}
