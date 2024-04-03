<?php

namespace App\Filament\App\Resources\ErrorResource\Pages;

use App\Enums\ErrorStatus;
use App\Filament\App\Resources\ErrorResource;
use App\Models\Error;
use Filament\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Filament\Support\Colors\Color;

class EditError extends EditRecord
{
    protected static string $resource = ErrorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('Request approval')
                ->action(function (Error $error) {
                    $error->markAsPending();

                    Notification::make()
                        ->success()
                        ->title('Thanks for your support! ❤️')
                        ->body('Your error and solution is waiting for approval.')
                        ->persistent()
                        ->send();
                })
                ->hidden(fn (Error $error) => $error->status === ErrorStatus::Pending | $error->status === ErrorStatus::Approved | auth()->user()->isAdmin())
                ->requiresConfirmation()
                ->modalHeading('Request Approval')
                ->modalDescription('Are you sure you double checked everything?')
                ->modalSubmitActionLabel('Yes'),
            Actions\Action::make('Approve')
                ->visible(auth()->user()->isAdmin())
                ->requiresConfirmation()
                ->action(function (Error $error) {
                    $error->markAsApproved();

                    $reception = $error->user;

                    Notification::make()
                        ->success()
                        ->title('Thanks for your support. ❤️')
                        ->body('Your error has been approved.')
                        ->sendToDatabase($reception);
                }),
            Actions\Action::make('Reject')
                ->visible(auth()->user()->isAdmin())
                ->requiresConfirmation()
                ->color(Color::Red)
                ->form([
                    Textarea::make('reason')
                        ->required()
                ])
                ->action(function (Error $error, array $data) {
                    $error->markAsRejected();

                    $reception = $error->user;

                    Notification::make()
                        ->danger()
                        ->title('Your error request has been rejected')
                        ->body($data['reason'])
                        ->sendToDatabase($reception);
                })
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['status'] = ErrorStatus::Draft;

        return $data;
    }
}
