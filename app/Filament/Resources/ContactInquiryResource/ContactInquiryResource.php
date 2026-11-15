<?php
namespace App\Filament\Resources\ContactInquiryResource;
use App\Models\ContactInquiry;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\ContactInquiryResource\Pages\{ListContactInquirys,CreateContactInquiry,EditContactInquiry};
class ContactInquiryResource extends Resource {
 protected static ?string $model=ContactInquiry::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('name')->required()->maxLength(255),
    TextInput::make('email')->email(),
    Textarea::make('message')->rows(4),
    Select::make('status')->options(['pending'=>'Pending','confirmed'=>'Confirmed','cancelled'=>'Cancelled','completed'=>'Completed','new'=>'New','responded'=>'Responded'])->required()
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('name')->searchable()->sortable(),
    TextColumn::make('status')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListContactInquirys::route('/'),
   'create'=>CreateContactInquiry::route('/create'),
   'edit'=>EditContactInquiry::route('/{record}'),
  ];
 }
}
