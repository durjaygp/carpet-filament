<?php

namespace App\Filament\Resources\WebsiteSettingResource\Pages;

use App\Filament\Resources\WebsiteSettingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWebsiteSettings extends ListRecords
{
    protected static string $resource = WebsiteSettingResource::class;

    public function mount(): void
    {
        $this->redirect(WebsiteSettingResource::getUrl('edit', ['record' => 1]));
    }
}
