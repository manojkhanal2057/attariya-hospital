<?php

namespace App\Filament\Resources\Notices;

use App\Models\Notice;

use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

use Filament\Forms\Components\{
    TextInput,
    Textarea,
    RichEditor,
    Select,
    DateTimePicker,
    Toggle,
    FileUpload
};

use Filament\Tables\Columns\{
    TextColumn,
    IconColumn
};

use Filament\Actions\{
    EditAction,
    DeleteAction,
    BulkActionGroup,
    DeleteBulkAction
};

use App\Filament\Resources\Notices\Pages\{
    ListNotices,
    CreateNotice,
    EditNotice
};

class NoticeResource extends Resource
{
    protected static ?string $model = Notice::class;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([

            // NOTICE TITLE
            TextInput::make('title')
                ->label('Notice Title')
                ->required()
                ->maxLength(255),

            // UNIQUE URL SLUG
            TextInput::make('slug')
                ->label('URL Slug')
                ->required()
                ->maxLength(255)
                ->unique(ignoreRecord: true)
                ->helperText('Example: hospital-vacancy-notice'),

            // NOTICE CATEGORY
            Select::make('category')
                ->label('Notice Category')
                ->options([
                    'general' => 'General',
                    'announcement' => 'Announcement',
                    'vacancy' => 'Vacancy',
                    'service-update' => 'Service Update',
                ])
                ->default('general')
                ->required(),

            // SHORT DESCRIPTION
            Textarea::make('description')
                ->label('Short Description')
                ->rows(3)
                ->columnSpanFull(),

            // FULL NOTICE CONTENT
            RichEditor::make('body')
                ->label('Full Notice Details')
                ->columnSpanFull(),

            // PDF ATTACHMENT
            FileUpload::make('pdf')
                ->label('Notice PDF Attachment')
                ->disk('public')
                ->directory('hospital/notices')
                ->visibility('public')
                ->acceptedFileTypes([
                    'application/pdf',
                ])
                ->maxSize(10240)
                ->helperText(
                    'Upload a PDF attachment (maximum 10 MB).'
                )
                ->columnSpanFull(),

            // PUBLISH DATE
            DateTimePicker::make('published_at')
                ->label('Publish Date & Time')
                ->seconds(false)
                ->default(now())
                ->required(),

            // PUBLICATION STATUS
            Toggle::make('is_published')
                ->label('Publish Notice')
                ->default(false)
                ->helperText(
                    'Enable this to publish the notice on the hospital website.'
                ),

            // SORTING
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

                TextColumn::make('title')
                    ->label('Notice Title')
                    ->searchable()
                    ->sortable()
                    ->limit(45),

                TextColumn::make('category')
                    ->label('Category')
                    ->badge()
                    ->formatStateUsing(
                        fn ($state) =>
                            ucwords(str_replace('-', ' ', (string) $state))
                    ),

                TextColumn::make('published_at')
                    ->label('Publish Date')
                    ->dateTime('d M Y, h:i A')
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Published')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->label('Created')
                    ->dateTime('d M Y')
                    ->sortable(),

            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNotices::route('/'),
            'create' => CreateNotice::route('/create'),
            'edit' => EditNotice::route('/{record}'),
        ];
    }
}