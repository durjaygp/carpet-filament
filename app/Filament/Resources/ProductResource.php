<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\{Grid, Section, TextInput, Textarea, Toggle, FileUpload, Select, Repeater};
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn, TagsColumn};

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-up';

    public static function form(Form $form): Form
    {
        return $form->schema([

            Section::make('Basic Information')->schema([
                Grid::make(2)->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('slug')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('sku')
                        ->label('SKU')
                        ->maxLength(255),

                    TextInput::make('stock')
                        ->required()
                        ->numeric()
                        ->default(0),

                    TextInput::make('price')
                        ->required()
                        ->numeric()
                        ->prefix('$'),

                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload(),

//                    Select::make('size_id')
//                        ->label('Sizes')
//                        ->relationship('sizes', 'title')
//                        ->multiple()
//                        ->searchable()
//                        ->preload(),
                    Forms\Components\Select::make('size_id')
                        ->label('Sizes')
                        ->multiple()
                        ->options(\App\Models\Size::pluck('title', 'id'))
                        ->searchable()
                        ->preload(),

                    TextInput::make('tags')
                        ->maxLength(255),
                ]),
            ]),

            Section::make('Descriptions & Content')->schema([
                Grid::make(1)->schema([
                    Textarea::make('description'),
                    Textarea::make('main_content'),
                ]),
            ]),

            Section::make('Media')->schema([
                FileUpload::make('image')
                    ->label('Main Image')
                    ->image()
                    ->directory('public/products/')
                    ->imageEditor(),
            ]),

            Section::make('SEO')->collapsible()->schema([
                Grid::make(2)->schema([
                    Textarea::make('seo_title'),
                    Textarea::make('seo_description'),
                    Textarea::make('seo_keywords'),
                    Textarea::make('seo_schema'),
                    Textarea::make('seo_other_tags'),
                ]),
            ]),

            Section::make('Status')->schema([
                Grid::make(2)->schema([
                    Toggle::make('status')
                        ->label('Published')
                        ->required(),

                    Toggle::make('is_sellable')
                        ->label('Is Sellable')
                        ->required(),
                ]),
            ]),

            Section::make('Product Variations')->schema([
                Repeater::make('variations')
                    ->relationship('variations')
                    ->label('Product Variations')
                    ->schema([
                        TextInput::make('color_name')->label('Color Name'),
                        TextInput::make('color_code')->label('Color Code'),
                        FileUpload::make('image')->label('Image')->image(),
                    ])
                    ->columns(3)
                    ->collapsible()
                    ->defaultItems(1),
            ]),
        ]);
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->getStateUsing(fn ($record) => asset('storage/' . $record->image)),

                TextColumn::make('name')
                    ->searchable(),

                // Category name via relationship
                TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                TagsColumn::make('size_titles')
                    ->label('Sizes')
                    ->separator(', '), // Optional

                TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),

                TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),


//                ImageColumn::make('image')
//                    ->label('Image')
//                    ->disk('public')
//                    ->getStateUsing(fn ($record) => trim($record->image, '/')),


                TextColumn::make('price')
                    ->money('USD')
                    ->sortable(),

                Tables\Columns\ToggleColumn::make('status')
                    ->sortable()
                    ->label('Published'),
                Tables\Columns\ToggleColumn::make('is_sellable')
                    ->sortable()
                    ->label('Sellable'),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
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
        return 3;
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
