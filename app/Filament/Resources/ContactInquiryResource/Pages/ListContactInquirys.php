<?php
namespace App\Filament\Resources\ContactInquiryResource\Pages;
use App\Filament\Resources\ContactInquiryResource\ContactInquiryResource;
use Filament\Resources\Pages\ListRecords;
class ListContactInquirys extends ListRecords {
 protected static string $resource=ContactInquiryResource::class;
 protected function getHeaderActions():array {return [\Filament\Actions\CreateAction::make()];}
}
