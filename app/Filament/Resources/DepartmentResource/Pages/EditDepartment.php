<?php
namespace App\Filament\Resources\DepartmentResource\Pages;
use App\Filament\Resources\DepartmentResource\DepartmentResource;
use Filament\Resources\Pages\EditRecord;
class EditDepartment extends EditRecord {
 protected static string $resource=DepartmentResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\DeleteAction::make()];}
}
