<?php

namespace App\Filament\Resources\WebsiteSettingResource\Pages;

use App\Filament\Resources\WebsiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWebsiteSetting extends EditRecord
{
    protected static string $resource = WebsiteSettingResource::class;

//    protected function getHeaderActions(): array
//    {
//        return [
//        ];
//    }
//
//    //customize redirect after create
//    public function getRedirectUrl(): string
//    {
//        return $this->getResource()::getUrl('index');
//    }
}
