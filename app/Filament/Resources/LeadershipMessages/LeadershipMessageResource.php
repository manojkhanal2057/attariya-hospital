<?php

namespace App\Filament\Resources\LeadershipMessages;

use App\Models\LeadershipMessage;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Forms\Components\{TextInput, Textarea, RichEditor, FileUpload, Toggle, Repeater};
use Filament\Tables\Columns\{TextColumn, IconColumn};
use Filament\Actions\{EditAction, DeleteAction, BulkActionGroup, DeleteBulkAction};
use App\Filament\Resources\LeadershipMessages\Pages\{ListLeadershipMessages, CreateLeadershipMessage, EditLeadershipMessage};

class LeadershipMessageResource extends Resource
{
    protected static ?string $model = LeadershipMessage::class;
    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')->required()->maxLength(255),
            TextInput::make('position')->required()->maxLength(255),
            FileUpload::make('photo')->image()->disk('public')->directory('hospital/leadership')->visibility('public'),
            Textarea::make('message')->required()->rows(6)->columnSpanFull(),
            TextInput::make('sort_order')->numeric()->default(0),
            Toggle::make('is_published')->label('Approved to publish')->default(false),
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('name')->searchable()->sortable(),
            IconColumn::make('is_published')->boolean(),
            TextColumn::make('created_at')->dateTime('d M Y')->sortable(),
        ])->recordActions([EditAction::make(), DeleteAction::make()])
            ->toolbarActions([BulkActionGroup::make([DeleteBulkAction::make()])]);
    }
public static function getPages(): array
{
    return [
        'index' => Pages\ListLeadershipMessages::route('/'),
        'create' => Pages\CreateLeadershipMessage::route('/create'),
        'edit' => Pages\EditLeadershipMessage::route('/{record}/edit'),
    ];
}
}