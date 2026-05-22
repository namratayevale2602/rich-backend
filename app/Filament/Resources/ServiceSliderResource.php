<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceSliderResource\Pages;
use App\Models\ServiceSlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ServiceSliderResource extends Resource
{
    protected static ?string $model = ServiceSlider::class;
    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Service Details')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., Bulk SMS'),

                                Forms\Components\TextInput::make('product_name')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., bulk-sms'),
                            ]),

                        Forms\Components\Textarea::make('description')
                            ->required()
                            ->rows(3)
                            ->maxLength(500)
                            ->placeholder('Enter service description'),

                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->maxLength(255)
                                    ->placeholder('e.g., bulk-sms')
                                    ->helperText('Used for the /products/{slug} URL'),

                                Forms\Components\Select::make('icon')
                                    ->label('Icon')
                                    ->options([
                                        'MessageSquare' => 'Message Square (SMS)',
                                        'Phone'         => 'Phone (Voice)',
                                        'Smartphone'    => 'Smartphone (WhatsApp)',
                                        'Megaphone'     => 'Megaphone (Marketing)',
                                        'Bot'           => 'Bot (Chatbot)',
                                        'Zap'           => 'Zap (Automation)',
                                        'Code'          => 'Code (Development)',
                                        'Palette'       => 'Palette (Design)',
                                        'AlertCircle'   => 'Alert Circle (Alert)',
                                        'PhoneCall'     => 'Phone Call (IVR)',
                                        'Mail'          => 'Mail (Email)',
                                        'Building'      => 'Building',
                                    ])
                                    ->placeholder('Select an icon'),

                                Forms\Components\Select::make('category')
                                    ->label('Category')
                                    ->options([
                                        'Communication' => 'Communication',
                                        'Marketing'     => 'Marketing',
                                        'Automation'    => 'Automation',
                                        'Development'   => 'Development',
                                        'Creative'      => 'Creative',
                                    ])
                                    ->placeholder('Select a category'),
                            ]),
                    ]),

                Forms\Components\Section::make('Images')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->label('Main Image')
                            ->required()
                            ->image()
                            ->directory('service-slider')
                            ->visibility('public')
                            ->helperText('Default image, recommended: 440x587px or larger'),

                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\FileUpload::make('image_440')
                                    ->label('Image 440w')
                                    ->image()
                                    ->directory('service-slider/responsive')
                                    ->visibility('public')
                                    ->helperText('Width: 440px'),

                                Forms\Components\FileUpload::make('image_600')
                                    ->label('Image 600w')
                                    ->image()
                                    ->directory('service-slider/responsive')
                                    ->visibility('public')
                                    ->helperText('Width: 600px'),

                                Forms\Components\FileUpload::make('image_1050')
                                    ->label('Image 1050w')
                                    ->image()
                                    ->directory('service-slider/responsive')
                                    ->visibility('public')
                                    ->helperText('Width: 1050px'),

                                Forms\Components\FileUpload::make('image_1500')
                                    ->label('Image 1500w')
                                    ->image()
                                    ->directory('service-slider/responsive')
                                    ->visibility('public')
                                    ->helperText('Width: 1500px'),
                            ]),
                    ]),

                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),

                                Forms\Components\TextInput::make('order')
                                    ->label('Display Order')
                                    ->numeric()
                                    ->default(0)
                                    ->helperText('Lower numbers appear first'),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Preview')
                    ->square()
                    ->size(60),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('slug')
                    ->limit(25),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('order')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('order', 'asc')
            ->filters([
                Tables\Filters\SelectFilter::make('is_active')
                    ->label('Status')
                    ->options([
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ]),
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'Communication' => 'Communication',
                        'Marketing'     => 'Marketing',
                        'Automation'    => 'Automation',
                        'Development'   => 'Development',
                        'Creative'      => 'Creative',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('moveUp')
                    ->action(function (ServiceSlider $record) {
                        $prev = ServiceSlider::where('order', '<', $record->order)
                            ->orderBy('order', 'desc')
                            ->first();
                        if ($prev) {
                            $temp = $record->order;
                            $record->order = $prev->order;
                            $prev->order = $temp;
                            $record->save();
                            $prev->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-up')
                    ->color('gray'),

                Tables\Actions\Action::make('moveDown')
                    ->action(function (ServiceSlider $record) {
                        $next = ServiceSlider::where('order', '>', $record->order)
                            ->orderBy('order', 'asc')
                            ->first();
                        if ($next) {
                            $temp = $record->order;
                            $record->order = $next->order;
                            $next->order = $temp;
                            $record->save();
                            $next->save();
                        }
                    })
                    ->icon('heroicon-o-arrow-down')
                    ->color('gray'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListServiceSliders::route('/'),
            'create' => Pages\CreateServiceSlider::route('/create'),
            'edit'   => Pages\EditServiceSlider::route('/{record}/edit'),
        ];
    }
}
