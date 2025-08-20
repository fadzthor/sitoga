<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Collection';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                // Forms\Components\TextInput::make('slug')
                //     ->label('Slug')
                //     ->required()
                //     ->unique(ignoreRecord: true)
                //     ->hint('Akan dipakai di URL'),

                Forms\Components\TextInput::make('category')
                    ->label('Category')
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->label('Price')
                    ->required()
                    ->numeric()
                    ->prefix('Rp.')
                    ->default(0),

                Forms\Components\TextInput::make('stock')
                    ->label('Stock')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\TextInput::make('order_link')
                    ->label('Order Link')
                    ->url()
                    ->hint('https://...'),
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi')
                    ->maxLength(255),
                Forms\Components\FileUpload::make('photo')
                    ->label('Images')
                    ->image()
                    ->directory('products')
                    ->disk('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->label('Images')
                    ->disk('public')
                    ->circular()
                    ->toggleable(),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->money('idr', true)
                    ->sortable(),
                TextColumn::make('stock')
                    ->label('Stock')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('order_link')
                    ->label('Order Link')
                    ->url(fn($record) => $record->order_link, true)
                    ->openUrlInNewTab()
                    ->toggleable(),
                TextColumn::make('view_count')
                    ->label('Views')
                    ->sortable(),
                BadgeColumn::make('view_count')
                    ->label('Popularity')
                    ->colors([
                        'success' => fn($state): bool => $state < 50,
                        'warning' => fn($state): bool => $state >= 50 && $state < 200,
                        'danger'  => fn($state): bool => $state >= 200,
                    ]),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // tambahkan relation managers jika perlu
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit'   => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
