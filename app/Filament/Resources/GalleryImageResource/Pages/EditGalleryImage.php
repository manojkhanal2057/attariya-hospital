<?php
namespace App\Filament\Resources\GalleryImageResource\Pages;
use App\Filament\Resources\GalleryImageResource\GalleryImageResource;
use Filament\Resources\Pages\EditRecord;
class EditGalleryImage extends EditRecord {
 protected static string $resource=GalleryImageResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\DeleteAction::make()];}
}
