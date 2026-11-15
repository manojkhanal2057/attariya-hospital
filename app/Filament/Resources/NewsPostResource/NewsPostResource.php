<?php
namespace App\Filament\Resources\NewsPostResource;
use App\Models\NewsPost;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput,Textarea,RichEditor,Select,DatePicker,DateTimePicker,Toggle,FileUpload};
use Filament\Tables\Columns\TextColumn;
use Filament\Actions\{EditAction,DeleteAction,BulkActionGroup,DeleteBulkAction};
use App\Filament\Resources\NewsPostResource\Pages\{ListNewsPosts,CreateNewsPost,EditNewsPost};
class NewsPostResource extends Resource {
 protected static ?string $model=NewsPost::class;
 public static function form(Schema $schema):Schema {
  return $schema->components([
    TextInput::make('title')->required()->maxLength(255),
    TextInput::make('slug')->required()->maxLength(255)->unique(ignoreRecord:true),
    Textarea::make('excerpt')->rows(3),
    RichEditor::make('body')->columnSpanFull(),
    FileUpload::make('image')->image()->disk('public')->directory('hospital')->visibility('public'),
    DateTimePicker::make('published_at'),
    Toggle::make('is_published')
  ]);
 }
 public static function table(Table $table):Table {
  return $table->columns([
    TextColumn::make('title')->searchable()->sortable(),
    TextColumn::make('published_at')->searchable()->sortable(),
    TextColumn::make('is_published')->searchable()->sortable()
  ])->recordActions([EditAction::make()])->toolbarActions([]); 
 }
 public static function getPages():array {
  return [
   'index'=>ListNewsPosts::route('/'),
   'create'=>CreateNewsPost::route('/create'),
   'edit'=>EditNewsPost::route('/{record}'),
  ];
 }
}
