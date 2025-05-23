<?php

namespace App\Filament\Resources\CustomReviewResource\Pages;

use App\Filament\Resources\CustomReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomReview extends CreateRecord
{
    protected static string $resource = CustomReviewResource::class;
    protected static bool $canCreateAnother = false;

    //customize redirect after create
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
