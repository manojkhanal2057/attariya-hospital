<?php
namespace App\Filament\Resources\GalleryImageResource;
use App\Models\GalleryImage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\GalleryImageResource\Pages\{ListGalleryImages,CreateGalleryImage,EditGalleryImage};
class GalleryImageResource extends Resource {
 protected static ?string $model=GalleryImage::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('title')->required()->maxLength(255),
    FileUpload::make('image')->image()->disk('public')->directory('hospital')->visibility('public'),
    TextInput::make('category'),
    TextInput::make('alt_text'),
    Toggle::make('is_active')->default(true),
    TextInput::make('sort_order')->numeric()->default(0)
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('title')->searchable()->sortable(),
    TextColumn::make('is_active')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListGalleryImages::route('/'),
   'create'=>CreateGalleryImage::route('/create'),
   'edit'=>EditGalleryImage::route('/{record}'),
  ];
 }
}
