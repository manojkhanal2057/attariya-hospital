<?php
namespace App\Filament\Resources\SiteSettingResource;
use App\Models\SiteSetting;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\SiteSettingResource\Pages\{ListSiteSettings,CreateSiteSetting,EditSiteSetting};
class SiteSettingResource extends Resource {
 protected static ?string $model=SiteSetting::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('key')->required()->unique(ignoreRecord:true),
    Textarea::make('value')->rows(3)
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('key')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListSiteSettings::route('/'),
   'create'=>CreateSiteSetting::route('/create'),
   'edit'=>EditSiteSetting::route('/{record}'),
  ];
 }
}
