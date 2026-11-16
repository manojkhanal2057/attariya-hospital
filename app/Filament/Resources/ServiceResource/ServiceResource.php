<?php

namespace App\Filament\Resources\ServiceResource;

use App\Models\Service;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use Filament\Forms\Components\{
    TextInput,
    Textarea,
    RichEditor,
    Toggle,
    FileUpload
};

use Filament\Tables\Columns\{
    TextColumn,
    ImageColumn
};

use Filament\Actions\EditAction;

use App\Filament\Resources\ServiceResource\Pages\{
    ListServices,
    CreateService,
    EditService
};

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            TextInput::make('name')
                ->label('Service Name')
                ->required()
                ->maxLength(255),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true),

            Textarea::make('description')
                ->label('Short Description')
                ->rows(3)
                ->columnSpanFull(),

            RichEditor::make('body')
                ->label('Full Service Description')
                ->columnSpanFull(),

            TextInput::make('icon')
                ->label('Lucide Icon Name')
                ->helperText('Example: heart-pulse, activity, stethoscope'),

            // MAIN IMAGE
            FileUpload::make('image')
                ->label('Main Service Thumbnail')
                ->image()
                ->disk('public')
                ->directory('hospital')
                ->visibility('public')
                ->maxSize(5120)
                ->helperText('Main image for service cards and detail pages.')
                ->columnSpanFull(),

            // MULTIPLE RELATED IMAGES
            FileUpload::make('related_images')
                ->label('Related Service Images')
                ->image()
                ->multiple()
                ->disk('public')
                ->directory('hospital/services/gallery')
                ->visibility('public')
                ->maxFiles(10)
                ->maxSize(5120)
                ->reorderable()
                ->appendFiles()
                ->panelLayout('grid')
                ->helperText(
                    'Upload up to 10 images for the service detail gallery. Maximum 5 MB per image.'
                )
                ->columnSpanFull(),

            Toggle::make('is_featured')
                ->label('Featured Service')
                ->default(false),

            Toggle::make('is_active')
                ->label('Active Service')
                ->default(true),

            TextInput::make('sort_order')
                ->label('Display Order')
                ->numeric()
                ->default(0),

        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->square(),

                TextColumn::make('name')
                    ->label('Service')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('is_active')
                    ->label('Active')
                    ->badge()
                    ->formatStateUsing(
                        fn ($state) => $state ? 'Active' : 'Inactive'
                    )
                    ->color(
                        fn ($state) => $state ? 'success' : 'danger'
                    ),

            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit' => EditService::route('/{record}'),
        ];
    }
}