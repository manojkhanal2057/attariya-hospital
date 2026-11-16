<?php
namespace App\Filament\Resources\HealthPackages;
use App\Models\HealthPackage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, RichEditor, FileUpload, Toggle, Repeater};
use Filament\Tables\Columns\{TextColumn, IconColumn};
use Filament\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction};
use App\Filament\Resources\HealthPackages\Pages\{ListHealthPackages, CreateHealthPackage, EditHealthPackage};
class HealthPackageResource extends Resource {
    protected static ?string $model = HealthPackage::class;
    public static function form(Schema $schema): Schema {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(255)->live(onBlur: true)->afterStateUpdated(fn ($state, $set) => $set('slug', \Illuminate\Support\Str::slug($state))),
 TextInput::make('slug')->required()->unique(ignoreRecord:true)->maxLength(255),
 Textarea::make('short_description')->rows(3)->columnSpanFull(),
 RichEditor::make('description')->columnSpanFull(),
 FileUpload::make('thumbnail')->image()->disk('public')->directory('hospital/packages')->visibility('public'),
 Repeater::make('tests')->label('Included Tests')->schema([TextInput::make('name')->label('Test Name')->required()])->defaultItems(0)->columnSpanFull(),
 TextInput::make('price')->numeric()->minValue(0)->prefix('NPR'),
 TextInput::make('offer_price')->numeric()->minValue(0)->prefix('NPR')->lte('price'),
 TextInput::make('sort_order')->numeric()->default(0),
 Toggle::make('is_published')->label('Approved to publish')->default(false),
        ]);
    }
    public static function table(Table $table): Table {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            IconColumn::make('is_published')->boolean(),
            TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
        ])->recordActions([EditAction::make(), DeleteAction::make()])
          ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }
    public static function getPages(): array {
        return [ 'index' => ListHealthPackages::route('/'), 'create' => CreateHealthPackage::route('/create'), 'edit' => EditHealthPackage::route('/{record}') ];
    }
}
