<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CustomReviewResource\Pages;
use App\Filament\Resources\CustomReviewResource\RelationManagers;
use App\Models\CustomReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Livewire\Notifications;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CustomReviewResource extends Resource
{
    protected static ?string $model = CustomReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('rating')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(5)
                    ->live() // Optional: triggers reactivity
                    ->afterStateUpdated(function ($state, callable $set) {
                        if ($state < 1 || $state > 5) {
                            // You can also use a notification here if you're using Filament Notifications
                            Notification::make()
                                ->title('Invalid Rating')
                                ->body('Rating must be between 1 and 5.')
                                ->danger()
                                ->send();

                            $set('rating', null); // Optionally clear the invalid value
                        }
                    }),

                Forms\Components\Textarea::make('subject')
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('review')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image(),
                Forms\Components\Toggle::make('status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
   Tables\Actions\DeleteAction::make(),

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
    public static function getNavigationSort(): ?int
    {
        return 7;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCustomReviews::route('/'),
            'create' => Pages\CreateCustomReview::route('/create'),
            'edit' => Pages\EditCustomReview::route('/{record}/edit'),
        ];
    }
}
