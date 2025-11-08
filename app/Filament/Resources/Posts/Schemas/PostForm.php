<?php

namespace App\Filament\Resources\Posts\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make("thumbnail")
                    ->label("Upload your news thumbnail")
                    ->image()
                    ->imageEditor()
                    ->directory("thumbnails")
                    ->visibility("public")
                    ->columnSpanFull()
                    ->required(),
                TextInput::make("title")
                    ->label("News Title")
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->required(),
                TextInput::make("slug")
                    ->label("Slug for URL")
                    ->required(),
                Select::make("category_id")
                    ->relationship("category", "name")
                    ->label('Category')
                    ->required(),
                Select::make("author_id")
                    ->relationship("author", "username")
                    ->label('Author')
                    ->required(),
                RichEditor::make("content")
                    ->label("Fill the content")
                    ->toolbarButtons([
                        ['bold', 'italic', 'underline', 'strike', 'subscript', 'superscript', 'link'],
                        ['h2', 'h3', 'alignStart', 'alignCenter', 'alignEnd'],
                        ['blockquote', 'codeBlock', 'bulletList', 'orderedList'],
                        ['table', 'attachFiles'],
                        ['undo', 'redo', 'fullscreen'],
                    ])
                    ->required()
                    ->columnSpanFull()
            ]);
    }
}
