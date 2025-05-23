<?php

namespace App\Filament\Resources\CustomReviewResource\Pages;

use App\Filament\Resources\CustomReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCustomReview extends EditRecord
{
    protected static string $resource = CustomReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
        ];
    }

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
