<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactPhoneResource\Pages;
use App\Models\ContactPhone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactPhoneResource extends Resource
{
    protected static ?string $model = ContactPhone::class;
    protected static ?string $navigationIcon = 'heroicon-o-phone';
    protected static ?string $navigationGroup = 'Contact Management';
    protected static ?string $navigationLabel = 'Phone Numbers';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make()->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Select::make('type')
                        ->options(['support' => 'Support', 'sales' => 'Sales'])
                        ->required(),

                    Forms\Components\TextInput::make('phone')
                        ->required()
                        ->maxLength(20)
                        ->placeholder('9595902003'),

                    Forms\Components\TextInput::make('order')
                        ->numeric()
                        ->default(0),

                    Forms\Components\Toggle::make('is_active')
                        ->default(true),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order')->sortable()->width('60px'),
                Tables\Columns\BadgeColumn::make('type')
                    ->colors(['primary' => 'support', 'success' => 'sales']),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
            ])
            ->defaultSort('order')
            ->filters([
                Tables\Filters\SelectFilter::make('type')->options(['support' => 'Support', 'sales' => 'Sales']),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContactPhones::route('/'),
            'create' => Pages\CreateContactPhone::route('/create'),
            'edit'   => Pages\EditContactPhone::route('/{record}/edit'),
        ];
    }
}
