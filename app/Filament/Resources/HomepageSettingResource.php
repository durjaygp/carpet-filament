<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageSettingResource\Pages;
use App\Filament\Resources\HomepageSettingResource\RelationManagers;
use App\Models\HomepageSetting;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HomepageSettingResource extends Resource
{
    protected static ?string $model = HomepageSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Header Section')->schema([
                    Forms\Components\TextInput::make('header_title')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('header_second_line_title')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('header_small_paragraph')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('header_phone_number')
                        ->maxLength(255),
                    Forms\Components\TextInput::make('header_button')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('header_button_url')
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('header_image')
                        ->image()
                        ->directory('uploads')
                        ->imageEditor(),
                ])->columnSpanFull(),

                Forms\Components\Section::make('About Section')->schema([
                    Forms\Components\TextInput::make('about_title')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('about_description')
                        ->columnSpanFull(),
                    Forms\Components\TextInput::make('about_button')
                        ->maxLength(255),
                    Forms\Components\Textarea::make('about_button_url')
                        ->columnSpanFull(),
                    Forms\Components\FileUpload::make('about_image')
                        ->image()
                        ->directory('uploads')
                        ->imageEditor(),
                ])->columnSpanFull(),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('header_title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('header_second_line_title')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('header_image'),

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
    public static function canCreate(): bool
    {
        return false;
    }

    public static function canDelete(Model $record): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHomepageSettings::route('/'),
            'edit' => Pages\EditHomepageSetting::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('id', 1);
    }
}
