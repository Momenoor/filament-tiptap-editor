<?php

namespace Momenoor\FilamentTiptapEditor\Tests\Resources;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Momenoor\FilamentTiptapEditor\Enums\TiptapOutput;
use Momenoor\FilamentTiptapEditor\Tests\Models\Page;
use Momenoor\FilamentTiptapEditor\Tests\Resources\PageResource\Pages;
use Momenoor\FilamentTiptapEditor\TiptapEditor;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static string | null | \BackedEnum $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title'),
                TiptapEditor::make('html_content')
                    ->output(TiptapOutput::Html),
                TiptapEditor::make('json_content')
                    ->output(TiptapOutput::Json),
                TiptapEditor::make('text_content')
                    ->output(TiptapOutput::Text),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }
}
