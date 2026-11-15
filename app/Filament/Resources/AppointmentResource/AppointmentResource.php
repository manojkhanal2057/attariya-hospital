<?php
namespace App\Filament\Resources\AppointmentResource;
use App\Models\Appointment;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\AppointmentResource\Pages\{ListAppointments,CreateAppointment,EditAppointment};
class AppointmentResource extends Resource {
 protected static ?string $model=Appointment::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('name')->required()->maxLength(255),
    TextInput::make('phone')->tel()->required(),
    TextInput::make('email')->email(),
    Select::make('department_id')->relationship('department','name')->searchable()->preload(),
    Select::make('doctor_id')->relationship('doctor','name')->searchable()->preload(),
    DatePicker::make('preferred_date')->required(),
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
   'index'=>ListAppointments::route('/'),
   'create'=>CreateAppointment::route('/create'),
   'edit'=>EditAppointment::route('/{record}'),
  ];
 }
}
