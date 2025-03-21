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
                Forms\Components\DateTimePicker::make('valid_untill')
                    ->required(),
                Forms\Components\Toggle::make('is_used')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('discount_type'),
                Tables\Columns\TextColumn::make('discount')
                    ->formatStateUsing(fn(PromeCode $record): string => match ($record->discount_type){
                        'fixed' => 'Rp' . number_format($record->discount, 0,',','.'),
                        'percentage' => $record->discount . '%'
                    }),
                Tables\Columns\ToggleColumn::make('is_used'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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