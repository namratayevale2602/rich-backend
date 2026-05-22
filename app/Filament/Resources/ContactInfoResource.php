<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactInfoResource\Pages;
use App\Models\ContactInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ContactInfoResource extends Resource
{
    protected static ?string $model = ContactInfo::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Contact Management';
    protected static ?string $navigationLabel = 'Contact Info';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Address & Map')
                ->schema([
                    Forms\Components\Textarea::make('address')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),

                    Forms\Components\Textarea::make('map_embed_url')
                        ->label('Google Maps Embed URL')
                        ->placeholder('Paste the src URL from Google Maps embed code')
                        ->rows(3)
                        ->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Social Links')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('facebook_url')
                            ->url()
                            ->placeholder('https://facebook.com/...')
                            ->label('Facebook'),

                        Forms\Components\TextInput::make('linkedin_url')
                            ->url()
                            ->placeholder('https://linkedin.com/company/...')
                            ->label('LinkedIn'),

                        Forms\Components\TextInput::make('youtube_url')
                            ->url()
                            ->placeholder('https://youtube.com/@...')
                            ->label('YouTube'),

                        Forms\Components\TextInput::make('instagram_url')
                            ->url()
                            ->placeholder('https://instagram.com/...')
                            ->label('Instagram'),

                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->placeholder('support@richsol.com')
                            ->label('Support Email'),
                    ]),
                ]),

            Forms\Components\Section::make('Working Hours')
                ->schema([
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('working_days')
                            ->required()
                            ->placeholder('Monday - Saturday'),

                        Forms\Components\TextInput::make('working_hours')
                            ->required()
                            ->placeholder('9:30am - 6:30pm'),
                    ]),
                ]),

            Forms\Components\Section::make('Status')
                ->schema([
                    Forms\Components\Toggle::make('is_active')->default(true),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')->limit(60),
                Tables\Columns\TextColumn::make('working_days'),
                Tables\Columns\TextColumn::make('working_hours'),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('updated_at')->dateTime()->sortable(),
            ])
            ->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListContactInfos::route('/'),
            'create' => Pages\CreateContactInfo::route('/create'),
            'edit'   => Pages\EditContactInfo::route('/{record}/edit'),
        ];
    }
}
