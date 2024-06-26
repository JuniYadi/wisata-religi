<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Create Posts')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->columnSpanFull()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set, ?string $operation, ?string $old, ?string $state, ?Model $record) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('alamat')
                            ->required(),
                        Forms\Components\TextInput::make('google_maps')
                            ->required(),
                        Forms\Components\RichEditor::make('deskripsi')
                            ->placeholder('Deskripsi lengkap')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('biaya')
                            ->required(),
                        Forms\Components\TextInput::make('buka')
                            ->required(),
                    ])
                    ->columnSpan(2)->columns(2),
                Forms\Components\Section::make('Meta')
                    ->schema([
                        Forms\Components\FileUpload::make('banner')
                            ->required()
                            ->openable()
                            ->image()
                            ->imageEditor(),
                        // Forms\Components\Select::make('banner_filter')
                        //     ->options([
                        //         'grayscale' => 'Grayscale',
                        //         'brightness' => 'Brightness',
                        //         'contrast' => 'Contrast',
                        //     ])
                        //     ->searchable()->required(),
                        Forms\Components\Select::make('agama')
                            ->options([
                                'Islam' => 'Islam',
                                'Kristen' => 'Kristen',
                                'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu',
                                'Budha' => 'Budha',
                                'Konghucu' => 'Konghucu',
                            ])
                            ->searchable()->required(),
                        Forms\Components\Select::make('category')
                            ->options([
                                'news' => 'News',
                                'blog' => 'Blog',
                            ])
                            ->searchable()->required(),
                        Forms\Components\Textarea::make('summary')
                            ->placeholder('Deskripsi singkat')
                            ->required()
                            ->columnSpanFull(),
                    ])
                    ->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('biaya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('buka')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
