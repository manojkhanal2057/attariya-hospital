<?php
namespace App\Filament\Resources\DoctorResource;
use App\Models\Doctor;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\DoctorResource\Pages\{ListDoctors,CreateDoctor,EditDoctor};
class DoctorResource extends Resource {
 protected static ?string $model=Doctor::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('name')->required()->maxLength(255),
    TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord:true),
    TextInput::make('specialty'),
    TextInput::make('qualification'),
    Textarea::make('bio')->rows(4),
    FileUpload::make('image')->image()->disk('public')->directory('hospital')->visibility('public'),
    Select::make('department_id')->relationship('department','name')->searchable()->preload(),
    Toggle::make('is_active')->default(true),
    TextInput::make('sort_order')->numeric()->default(0)
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('name')->searchable()->sortable(),
    TextColumn::make('specialty')->searchable()->sortable(),
    TextColumn::make('is_active')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListDoctors::route('/'),
   'create'=>CreateDoctor::route('/create'),
   'edit'=>EditDoctor::route('/{record}'),
  ];
 }
}
