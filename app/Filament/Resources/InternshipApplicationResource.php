<?php
// app/Filament/Resources/InternshipApplicationResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\InternshipApplicationResource\Pages;
use App\Models\InternshipApplication;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;
use Filament\Notifications\Notification;

class InternshipApplicationResource extends Resource
{
    protected static ?string $model = InternshipApplication::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Applications';

    protected static ?string $navigationLabel = 'Internship Applications';

    protected static ?string $modelLabel = 'Internship Application';

    protected static ?string $pluralModelLabel = 'Internship Applications';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Application Details')
                    ->tabs([
                        Tab::make('Personal Details')
                            ->schema([
                                Section::make('Contact Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('email')
                                            ->email()
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('phone')
                                            ->required()
                                            ->maxLength(20),
                                        Forms\Components\TextInput::make('whatsapp')
                                            ->maxLength(20),
                                    ])->columns(2),

                                Section::make('Personal Information')
                                    ->schema([
                                        Forms\Components\DatePicker::make('date_of_birth'),
                                        Forms\Components\Select::make('gender')
                                            ->options([
                                                'Male' => 'Male',
                                                'Female' => 'Female',
                                                'Other' => 'Other',
                                            ]),
                                        Forms\Components\TextInput::make('location')
                                            ->maxLength(255)
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state !== 'Other') {
                                                    $set('other_location', null);
                                                }
                                            }),
                                        Forms\Components\TextInput::make('other_location')
                                            ->maxLength(255)
                                            ->visible(fn ($get) => $get('location') === 'Other'),
                                    ])->columns(2),
                            ]),

                        Tab::make('Academic Details')
                            ->schema([
                                Section::make('Education')
                                    ->schema([
                                        Forms\Components\TextInput::make('college')
                                            ->maxLength(255)
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, callable $set) {
                                                if ($state !== 'Other') {
                                                    $set('other_college', null);
                                                }
                                            }),
                                        Forms\Components\TextInput::make('other_college')
                                            ->maxLength(255)
                                            ->visible(fn ($get) => $get('college') === 'Other'),
                                        Forms\Components\TextInput::make('branch')
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('year')
                                            ->maxLength(50),
                                    ])->columns(2),

                                Section::make('Internship Details')
                                    ->schema([
                                        Forms\Components\TextInput::make('technology')
                                            ->maxLength(255),
                                        Forms\Components\Select::make('mode')
                                            ->options([
                                                'Online' => 'Online',
                                                'Offline' => 'Offline',
                                            ]),
                                    ])->columns(2),
                            ]),

                        Tab::make('Admin Section')
                            ->schema([
                                Section::make('Application Status')
                                    ->schema([
                                        Forms\Components\Select::make('status')
                                            ->options(InternshipApplication::getStatuses())
                                            ->required()
                                            ->default('pending'),
                                        Forms\Components\DateTimePicker::make('reviewed_at')
                                            ->disabled(),
                                        Forms\Components\Textarea::make('admin_notes')
                                            ->maxLength(65535)
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email address copied'),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('technology')
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('mode')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Online' => 'success',
                        'Offline' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\SelectColumn::make('status')
                    ->options(InternshipApplication::getStatuses())
                    ->disableGlobalSearch()
                    ->sortable()
                    ->selectablePlaceholder(false)
                    ->afterStateUpdated(function ($record, $state) {
                        $record->reviewed_at = now();
                        $record->save();
                        
                        Notification::make()
                            ->success()
                            ->title('Status updated successfully')
                            ->send();
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('reviewed_at')
                    ->dateTime('d M Y, h:i A')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options(InternshipApplication::getStatuses()),
                    
                SelectFilter::make('mode')
                    ->options([
                        'Online' => 'Online',
                        'Offline' => 'Offline',
                    ]),
                    
                SelectFilter::make('technology')
                    ->options(function () {
                        return InternshipApplication::query()
                            ->whereNotNull('technology')
                            ->pluck('technology', 'technology')
                            ->toArray();
                    }),
                    
                Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from'),
                        Forms\Components\DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('updateStatus')
                        ->label('Update Status')
                        ->icon('heroicon-o-check-circle')
                        ->form([
                            Forms\Components\Select::make('status')
                                ->options(InternshipApplication::getStatuses())
                                ->required(),
                        ])
                        ->action(function (Collection $records, array $data) {
                            $records->each->update([
                                'status' => $data['status'],
                                'reviewed_at' => now(),
                            ]);
                            
                            Notification::make()
                                ->success()
                                ->title('Status updated for selected records')
                                ->send();
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('60s');
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('Personal Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('name'),
                        Infolists\Components\TextEntry::make('email'),
                        Infolists\Components\TextEntry::make('phone'),
                        Infolists\Components\TextEntry::make('whatsapp'),
                        Infolists\Components\TextEntry::make('date_of_birth')
                            ->date(),
                        Infolists\Components\TextEntry::make('gender'),
                        Infolists\Components\TextEntry::make('full_location')
                            ->label('Location'),
                    ])->columns(3),

                Infolists\Components\Section::make('Academic Information')
                    ->schema([
                        Infolists\Components\TextEntry::make('full_college')
                            ->label('College'),
                        Infolists\Components\TextEntry::make('branch'),
                        Infolists\Components\TextEntry::make('year'),
                        Infolists\Components\TextEntry::make('technology'),
                        Infolists\Components\TextEntry::make('mode'),
                    ])->columns(3),

                Infolists\Components\Section::make('Application Status')
                    ->schema([
                        Infolists\Components\TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'reviewed' => 'info',
                                'shortlisted' => 'success',
                                'accepted' => 'success',
                                'rejected' => 'danger',
                                default => 'gray',
                            }),
                        Infolists\Components\TextEntry::make('created_at')
                            ->dateTime(),
                        Infolists\Components\TextEntry::make('reviewed_at')
                            ->dateTime(),
                        Infolists\Components\TextEntry::make('admin_notes')
                            ->markdown()
                            ->columnSpanFull(),
                    ])->columns(3),
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
            'index' => Pages\ListInternshipApplications::route('/'),
            'create' => Pages\CreateInternshipApplication::route('/create'),
            'edit' => Pages\EditInternshipApplication::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() > 0 
            ? 'warning' 
            : null;
    }
}