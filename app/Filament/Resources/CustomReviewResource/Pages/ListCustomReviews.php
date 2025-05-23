<?php

namespace App\Filament\Resources\CustomReviewResource\Pages;

use App\Filament\Resources\CustomReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCustomReviews extends ListRecords
{
    protected static string $resource = CustomReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
