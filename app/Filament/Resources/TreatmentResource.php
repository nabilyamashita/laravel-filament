<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TreatmentResource\Pages;
use App\Filament\Resources\TreatmentResource\RelationManagers;
use App\Models\Treatment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TreatmentResource extends Resource
{
    protected static ?string $model = Treatment::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench';

    protected static ?string $modelLabel = 'Perawatan';

    public static function shouldRegisterNavigation(): bool
    {
        if (auth()->user()->can('perawatans')) {
            return true;
        } else {
            return false;
        }

    }

    public static function canViewAny(): bool
    {
        if (auth()->user()->can('perawatans')) {
            return true;
        } else {
            return false;
        }
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),
                Forms\Components\Textarea::make('notes')
                ->maxLength(65535)
                ->columnSpan('full'),
                Forms\Components\Select::make('patient_id')
                ->relationship('patient', 'name')
                ->required(),
                Forms\Components\Select::make('doctor_id')
                ->relationship('doctor', 'name')
                ->required(),
                Forms\Components\TextInput::make('price')
                ->numeric()
                ->prefix('IDR')
                ->maxValue(42949672.95),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
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
            'index' => Pages\ListTreatments::route('/'),
            'create' => Pages\CreateTreatment::route('/create'),
            'edit' => Pages\EditTreatment::route('/{record}/edit'),
        ];
    }

}
