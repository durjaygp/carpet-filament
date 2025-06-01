<?php

namespace App\Imports;

use App\Models\Product;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Str;
use Filament\Tables\Actions\ImportAction;
use Filament\Tables\Table;


class ProductImport extends Importer
{
    public static function getModel(): string
    {
        return Product::class;
    }

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')->required(),

            ImportColumn::make('slug')
                ->label('Slug')
                ->fillUsing(fn ($record, $state) => $record->slug = $state ?? Str::slug($record->name)),

            ImportColumn::make('price')
                ->required()
                ->numeric(),

            ImportColumn::make('category_id')
                ->label('Category ID')
                ->numeric(),

            ImportColumn::make('stock')
                ->numeric()
                ->default(0),
        ];
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        return 'Products have been successfully imported.';
    }

//    public static function getCompletedNotificationBody(Import $import): string
//    {
//        $body = 'Your book import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';
//
//        if ($failedRowsCount = $import->getFailedRowsCount()) {
//            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
//        }
//
//        return $body;
//    }
}
