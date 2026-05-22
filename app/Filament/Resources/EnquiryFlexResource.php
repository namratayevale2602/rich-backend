<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EnquiryFlexResource\Pages;
use App\Models\EnquiryFlex;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class EnquiryFlexResource extends Resource
{
    protected static ?string $model = EnquiryFlex::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Enquiry Flex Section';
    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\TextInput::make('background')
                            ->label('Background Color / CSS')
                            ->default('#004ecc40')
                            ->placeholder('#004ecc40')
                            ->helperText('CSS color value, e.g. #004ecc40'),

                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->default('LETS REACH OUT')
                            ->placeholder('Enter section title'),

                        Forms\Components\TextInput::make('subtitle')
                            ->required()
                            ->maxLength(255)
                            ->default('Connect with us')
                            ->placeholder('Enter subtitle'),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(6)
                            ->default('Empower your business with cutting-edge conversational experiences through our robust infrastructure, designed to support you at any scale. With contextual campaigns, customizable workflows, and seamless cross-channel interactions, we help you engage your customers in meaningful and innovative ways. Whether it\'s personalizing customer journeys, streamlining communication processes, or creating impactful marketing campaigns, our solution ensures that your enterprise is equipped to deliver outstanding, scalable, and efficient customer experiences.')
                            ->placeholder('Enter description'),
                    ]),

                Forms\Components\Section::make('Buttons')
                    ->schema([
                        Forms\Components\Repeater::make('buttons')
                            ->label('CTA Buttons')
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('Button Text')
                                    ->required()
                                    ->placeholder('e.g. Schedule a demo'),

                                Forms\Components\TextInput::make('link')
                                    ->label('Button Link')
                                    ->required()
                                    ->placeholder('e.g. /contactus'),
                            ])
                            ->default([
                                ['text' => 'Schedule a demo', 'link' => '/schedule-a-demo'],
                                ['text' => 'Talk to Sales',   'link' => '/contactus'],
                            ])
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['text'] ?? null)
                            ->minItems(1)
                            ->maxItems(4)
                            ->reorderable(),
                    ]),

                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\TextInput::make('image_alt')
                            ->label('Image Alt Text')
                            ->default('offer')
                            ->placeholder('Describe the image'),

                        Forms\Components\FileUpload::make('image')
                            ->label('Main Image')
                            ->image()
                            ->directory('enquiry-flex')
                            ->visibility('public')
                            ->helperText('Main / fallback image'),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('image_400')
                                    ->label('Image 400w')
                                    ->image()
                                    ->directory('enquiry-flex/responsive')
                                    ->visibility('public')
                                    ->helperText('400px wide variant'),

                                Forms\Components\FileUpload::make('image_800')
                                    ->label('Image 800w')
                                    ->image()
                                    ->directory('enquiry-flex/responsive')
                                    ->visibility('public')
                                    ->helperText('800px wide variant'),
                            ]),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only one enquiry flex section can be active at a time.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('subtitle')
                    ->limit(30),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('activate')
                    ->action(function (EnquiryFlex $record) {
                        EnquiryFlex::where('id', '!=', $record->id)->update(['is_active' => false]);
                        $record->update(['is_active' => true]);
                    })
                    ->icon('heroicon-o-check-circle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (EnquiryFlex $record): bool => !$record->is_active),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListEnquiryFlex::route('/'),
            'create' => Pages\CreateEnquiryFlex::route('/create'),
            'edit'   => Pages\EditEnquiryFlex::route('/{record}/edit'),
        ];
    }
}
