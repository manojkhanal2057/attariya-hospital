<?php
namespace App\Filament\Resources\GalleryImageResource\Pages;
use App\Filament\Resources\GalleryImageResource\GalleryImageResource;
use Filament\Resources\Pages\ListRecords;
class ListGalleryImages extends ListRecords {
 protected static string $resource=GalleryImageResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\CreateAction::make()];}
}
