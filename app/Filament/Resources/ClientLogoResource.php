<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientLogoResource\Pages;
use App\Models\ClientLogo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientLogoResource extends Resource
{
    protected static ?string $model = ClientLogo::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Client Logo')
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->maxLength(255)
                        ->placeholder('e.g., Acme Corporation'),

                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo (1x)')
                            ->image()
                            ->directory('trusted-client')
                            ->visibility('public')
                            ->helperText('Recommended: 186×106px'),

                        Forms\Components\FileUpload::make('logo_2x')
                            ->label('Logo (2x / HiDPI)')
                            ->image()
                            ->directory('trusted-client')
                            ->visibility('public')
                            ->helperText('Recommended: 372×212px'),
                    ]),

                    Forms\Components\TextInput::make('logo_sizes')
                        ->label('Sizes Attribute')
                        ->default('(max-width: 640px) 93px, 82px')
                        ->helperText('HTML sizes attribute for responsive logo rendering'),
                ]),

            Forms\Components\Section::make('Settings')->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\TextInput::make('order')->numeric()->default(0)
                        ->helperText('Lower numbers appear first'),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')->square()->size(50),
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('moveUp')
                    ->action(fn (ClientLogo $r) => self::swap($r, 'up'))
                    ->icon('heroicon-o-arrow-up')->color('gray'),
                Tables\Actions\Action::make('moveDown')
                    ->action(fn (ClientLogo $r) => self::swap($r, 'down'))
                    ->icon('heroicon-o-arrow-down')->color('gray'),
            ])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    private static function swap(ClientLogo $record, string $dir): void
    {
        $neighbor = $dir === 'up'
            ? ClientLogo::where('order', '<', $record->order)->orderBy('order', 'desc')->first()
            : ClientLogo::where('order', '>', $record->order)->orderBy('order', 'asc')->first();
        if ($neighbor) {
            [$record->order, $neighbor->order] = [$neighbor->order, $record->order];
            $record->save(); $neighbor->save();
        }
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListClientLogos::route('/'),
            'create' => Pages\CreateClientLogo::route('/create'),
            'edit'   => Pages\EditClientLogo::route('/{record}/edit'),
        ];
    }
}
