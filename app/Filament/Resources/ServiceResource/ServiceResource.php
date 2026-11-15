<?php
namespace App\Filament\Resources\ServiceResource;
use App\Models\Service;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\ServiceResource\Pages\{ListServices,CreateService,EditService};
class ServiceResource extends Resource {
 protected static ?string $model=Service::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('name')->required()->maxLength(255),
    TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord:true),
    Textarea::make('description')->rows(3),
    RichEditor::make('body')->columnSpanFull(),
    TextInput::make('icon'),
    FileUpload::make('image')->image()->disk('public')->directory('hospital')->visibility('public'),
    Toggle::make('is_featured'),
    Toggle::make('is_active')->default(true),
    TextInput::make('sort_order')->numeric()->default(0)
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('name')->searchable()->sortable(),
    TextColumn::make('is_active')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListServices::route('/'),
   'create'=>CreateService::route('/create'),
   'edit'=>EditService::route('/{record}'),
  ];
 }
}
