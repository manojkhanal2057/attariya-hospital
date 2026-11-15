<?php
namespace App\Filament\Resources\NewsPostResource\Pages;
use App\Filament\Resources\NewsPostResource\NewsPostResource;
use Filament\Resources\Pages\EditRecord;
class EditNewsPost extends EditRecord {
 protected static string $resource=NewsPostResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\DeleteAction::make()];}
}
