<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromeCodeResource\Pages;
use App\Filament\Resources\PromeCodeResource\RelationManagers;
use App\Models\PromeCode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Numeric;

class PromeCodeResource extends Resource
{
    protected static ?string $model = PromeCode::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('code')
                    ->required(),
                Forms\Components\Select::make('discount_type')
                    ->required()
                    ->options([
                            'fixed' => 'Fixed',
                            'percentage'=> 'Percentage',
                         ]),
                Forms\Components\TextInput::make('discount')
                    ->required()
                    ->numeric()
                    ->minValue(0),
                Forms\Components\DateTimePicker::make('valid_until')
                    ->required(),
                Forms\Components\TextInput::make('is_used')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPromeCodes::route('/'),
            'create' => Pages\CreatePromeCode::route('/create'),
            'edit' => Pages\EditPromeCode::route('/{record}/edit'),
        ];
    }
}