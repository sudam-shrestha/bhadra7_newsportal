<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make("Article Details")
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        TextInput::make('slug')
                            ->required(),
                        Select::make('categories')
                            ->relationship("categories", "title")
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('title')
                                    ->required(),
                                TextInput::make('slug')
                                    ->required(),
                                TextInput::make('meta_title')
                                    ->required(),
                                Textarea::make('meta_description')
                                    ->default(null)
                                    ->columnSpanFull(),
                            ])
                            ->default(null),
                        Select::make('author_id')
                            ->relationship("author", "name")
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                FileUpload::make('image')
                                    ->image(),
                            ])
                            ->editOptionForm([
                                TextInput::make('name')
                                    ->required(),
                                FileUpload::make('image')
                                    ->image(),
                            ])
                            ->default(null),
                        FileUpload::make('image')
                            ->image()
                            ->required(),
                    ])->columnSpanFull()->columns(2),
                Section::make("Article Content")
                    ->schema([
                        RichEditor::make('content')
                            ->columnSpanFull()
                            ->required(),
                    ])->columnSpanFull()->columns(2),
                Section::make("SEO")
                    ->schema([
                        TextInput::make('meta_title')
                            ->required(),
                        Textarea::make('meta_description')
                            ->columnSpanFull()
                            ->required(),
                    ])->columnSpanFull()->columns(2),

            ]);
    }
}
