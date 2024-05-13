<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmployeeResource\Pages;
use App\Filament\Resources\EmployeeResource\RelationManagers;
use App\Models\Employee;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EmployeeResource extends Resource
{
    protected static ?string $model = Employee::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('first_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('zip_code')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('date_of_birth')
                ->required(),
               
                Forms\Components\TextInput::make('date_hired')
                ->required(),
               
            Forms\Components\DateTimePicker::make('email_verified_at'),
            Forms\Components\TextInput::make('password')
                ->password()
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
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListEmployees::route('/'),
            'create' => Pages\CreateEmployee::route('/create'),
            'view' => Pages\ViewEmployee::route('/{record}'),
            'edit' => Pages\EditEmployee::route('/{record}/edit'),
        ];
    }
}
