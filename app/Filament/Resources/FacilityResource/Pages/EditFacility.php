<?php
namespace App\Filament\Resources\FacilityResource\Pages;
use App\Filament\Resources\FacilityResource\FacilityResource;
use Filament\Resources\Pages\EditRecord;
class EditFacility extends EditRecord {
 protected static string $resource=FacilityResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\DeleteAction::make()];}
}
