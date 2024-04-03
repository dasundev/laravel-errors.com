<?php

namespace App\Filament\App\Resources;

use App\Filament\App\Resources\ErrorResource\Pages;
use App\Models\Error;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ErrorResource extends Resource
{
    protected static ?string $model = Error::class;

    protected static ?string $navigationIcon = 'heroicon-o-bug-ant';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->when(! auth()->user()->isAdmin(), function (Builder $builder) {
                return $builder->where('user_id', '=', auth()->id());
            });
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set, ?string $state) {
                        if (! $get('is_slug_changed_manually') && filled($state)) {
                            $set('slug', Str::slug($state));
                        }
                    })
                    ->reactive()
                    ->placeholder('No application encryption key has been specified.')
                    ->required(),
                Forms\Components\TextInput::make('slug')
                    ->afterStateUpdated(function (Forms\Set $set) {
                        $set('is_slug_changed_manually', true);
                    })
                    ->placeholder('no-application-encryption-key-has-been-specified')
                    ->readOnly()
                    ->required(),
                Forms\Components\TextInput::make('exception')
                    ->columnSpanFull()
                    ->placeholder('Illuminate\Encryption\MissingAppKeyException')
                    ->required(),
                Forms\Components\MarkdownEditor::make('solution')
                    ->hint('Tell us how you solved this error?')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Hidden::make('is_slug_changed_manually')
                    ->default(false)
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.email')
                    ->visible(auth()->user()->isAdmin())
                    ->searchable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('exception')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListErrors::route('/'),
            'create' => Pages\CreateError::route('/create'),
            'edit' => Pages\EditError::route('/{record}/edit'),
        ];
    }
}
