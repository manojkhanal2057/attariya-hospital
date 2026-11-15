<?php
namespace App\Filament\Resources\FacilityResource\Pages;
use App\Filament\Resources\FacilityResource\FacilityResource;
use Filament\Resources\Pages\ListRecords;
class ListFacilitys extends ListRecords {
 protected static string $resource=FacilityResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\CreateAction::make()];}
}
