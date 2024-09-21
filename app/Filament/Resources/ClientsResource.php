<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientsResource\Pages;
use App\Filament\Resources\ClientsResource\RelationManagers;
use App\Models\Clients;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('mail')
                    ->required()
                    ->maxLength(255),

                    Forms\Components\TextInput::make('telf')
                    ->required()
                    ->maxLength(255),
            

                    Forms\Components\Select::make('category_id') // Asegúrate de que el nombre sea correcto
                    ->relationship('categories', 'nombre')
                    ->required()  // Hacerlo requerido
                    ->searchable()
                    ->preload(),
                

                    Forms\Components\Select::make('estado_id') // Asegúrate de que el nombre sea correcto
                    ->relationship('estados', 'nombre')
                    ->required()  // Hacerlo requerido
                    ->searchable()
                    ->preload(),
           
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mail')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('telf')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClients::route('/create'),
            'edit' => Pages\EditClients::route('/{record}/edit'),
        ];
    }
}
