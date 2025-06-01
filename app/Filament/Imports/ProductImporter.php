<?php

namespace App\Filament\Imports;

use App\Models\Product;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Str;
class ProductImporter extends Importer
{
    protected static ?string $model = Product::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('name')
                ->requiredMapping()
                ->rules(['required']),

            ImportColumn::make('slug')->requiredMapping()->rules(['required']),


            ImportColumn::make('category_id')
                ->rules(['nullable', 'integer']),

            ImportColumn::make('size_id')
                ->rules(['nullable', 'max:255']),

            ImportColumn::make('sku')
                ->label('SKU')
                ->rules(['nullable', 'max:255']),

            ImportColumn::make('stock')
                ->rules(['nullable', 'integer']),

            ImportColumn::make('tags')
                ->rules(['nullable', 'max:255']),

            ImportColumn::make('description')
                ->rules(['nullable']),

            ImportColumn::make('image')
                ->rules(['nullable', 'max:255']),

            ImportColumn::make('price')
                ->rules(['nullable', 'numeric']),

            ImportColumn::make('main_content')
                ->rules(['nullable']),

            ImportColumn::make('seo_title')
                ->rules(['nullable']),

            ImportColumn::make('seo_description')
                ->rules(['nullable']),

            ImportColumn::make('seo_keywords')
                ->rules(['nullable']),

            ImportColumn::make('seo_schema')
                ->rules(['nullable']),

            ImportColumn::make('seo_other_tags')
                ->rules(['nullable']),

            ImportColumn::make('status')
                ->rules(['nullable', 'boolean']),

            ImportColumn::make('is_sellable')
                ->rules(['nullable', 'boolean']),
        ];
    }


    public function resolveRecord(): ?Product
    {
        // return Product::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Product();
    }
    public function mutateRecordDataUsing(array $data): array
    {
        if (empty($data['slug']) && !empty($data['name'])) {
            $data['slug'] = Str::slug($data['name'], '-');
        }

        return $data;
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your product import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
