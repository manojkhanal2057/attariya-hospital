<?php
namespace App\Filament\Resources\SiteSettingResource\Pages;
use App\Filament\Resources\SiteSettingResource\SiteSettingResource;
use Filament\Resources\Pages\EditRecord;
class EditSiteSetting extends EditRecord {
 protected static string $resource=SiteSettingResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\DeleteAction::make()];}
}
