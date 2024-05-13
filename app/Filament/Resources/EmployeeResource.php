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

    protected static ?string $navigationGroup = 'employee management';


    

    public static function form(Form $form): Form
    {
        'required|max:255';
        return $form
            ->schema([
                Forms\Components\Section::make('user name')
                 ->description('put the user details name in.')
                 ->schema([ Forms\Components\TextInput::make('first_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('last_name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('middle_name')
                ->required()
                ->maxLength(255),
            ])->columns(3),

            Forms\Components\Section::make('user address')
            ->schema([
                Forms\Components\TextInput::make('address')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('zip_code')
                ->required()
                ->maxLength(255),

            ])->columns(2),
                
            Forms\Components\Section::make('Dates')
            ->schema([
                Forms\Components\DatePicker::make('date_of_birth')
                ->required(),
               
                Forms\Components\DatePicker::make('date_hired')
                ->required()
                ,
                
            ])->columns(2),
        
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
