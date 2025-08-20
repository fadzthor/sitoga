<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PlantResource\Pages;
use App\Filament\Resources\PlantResource\RelationManagers\TestimonialRelationManager;
use App\Models\Plant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;


class PlantResource extends Resource
{
    protected static ?string $model = Plant::class;
    protected static ?string $navigationIcon = 'heroicon-o-sparkles';
    protected static ?string $navigationGroup = 'Collection';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'local_name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('local_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('scientific_name')
                    ->label('Nama Ilmiah')
                    ->maxLength(255),
                // Forms\Components\TextInput::make('slug')
                //     ->required()
                //     ->unique(ignoreRecord: true)
                //     ->hint('Akan dipakai di URL'),

                Forms\Components\Textarea::make('benefits')
                    ->label('Benefit'),
                Forms\Components\Textarea::make('processing')
                    ->label('Processing'),
                Forms\Components\TextInput::make('order_link')
                    ->label('Order Link')
                    ->url()
                    ->hint('https://...'),
                Forms\Components\FileUpload::make('photo')
                    ->image()
                    ->directory('plants')
                    ->disk('public')
                    ->label('Plant Images'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('Images')
                    ->disk('public')
                    ->circular(),
                TextColumn::make('local_name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('scientific_name')
                    ->sortable(),
                // Tampilkan jumlah view:
                TextColumn::make('view_count')
                    ->label('Dilihat')
                    ->sortable(),
                // Badge warna berdasarkan popularitas:
                BadgeColumn::make('view_count')
                    ->label('Popularity')
                    ->colors([
                        'success' => fn($state): bool => $state < 50,
                        'warning' => fn($state): bool => $state >= 50 && $state < 200,
                        'danger'  => fn($state): bool => $state >= 200,
                    ]),
                Tables\Columns\TextColumn::make('order_link')
                    ->label('Order Link')
                    ->url(fn($record) => $record->order_link, true)
                    ->openUrlInNewTab()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->dateTime('d M Y'),
            ])
            ->filters([
                // (opsional) tambahkan filter, misal: filter popularitas tinggi
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPlants::route('/'),
            'create' => Pages\CreatePlant::route('/create'),
            'edit'   => Pages\EditPlant::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            PlantResource\RelationManagers\ProductRelationManager::class,
        ];
    }
}
