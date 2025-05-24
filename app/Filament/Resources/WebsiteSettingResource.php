<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WebsiteSettingResource\Pages;
use App\Filament\Resources\WebsiteSettingResource\RelationManagers;
use App\Models\WebsiteSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WebsiteSettingResource extends Resource
{
    protected static ?string $model = WebsiteSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('footer')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('google')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('author')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('keywords')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('tags')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('url')
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('website_logo')
                    ->image()
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('fav_icon')
                    ->image()
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('address')
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->columnSpanFull(),

                Forms\Components\TextInput::make('phone')
                    ->columnSpanFull(),

                Forms\Components\Textarea::make('contact_spam_keywords')
                    ->helperText('Enter as JSON array, e.g. ["spam", "ads"]')
                    ->columnSpanFull(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Site Name'),
                Tables\Columns\TextColumn::make('email')->label('Email'),
                Tables\Columns\TextColumn::make('phone')->label('Phone'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
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
            'index' => Pages\ListWebsiteSettings::route('/'),
            'edit' => Pages\EditWebsiteSetting::route('/{record}/edit'),
        ];
    }
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getNavigationSort(): ?int
    {
        return 8;
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', 1);
    }
}
