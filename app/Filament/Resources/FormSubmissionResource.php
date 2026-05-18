<?php
// app/Filament/Resources/FormSubmissionResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\FormSubmissionResource\Pages;
use App\Models\FormSubmission;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;

class FormSubmissionResource extends Resource
{
    protected static ?string $model = FormSubmission::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Form Management';
    
    protected static ?string $navigationLabel = 'Form Submissions';
    
    protected static ?int $navigationSort = 1;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Submission Information')
                    ->schema([
                        Select::make('form_type')
                            ->options([
                                'contact' => 'Contact Form',
                                'enquiry' => 'Enquiry Form',
                                'demo' => 'Demo Request'
                            ])
                            ->disabled()
                            ->required(),
                        TextInput::make('fullname')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        TextInput::make('mobile')
                            ->required()
                            ->maxLength(10),
                        TextInput::make('company')
                            ->maxLength(255),
                    ])->columns(2),
                
                Section::make('Location Information')
                    ->schema([
                        TextInput::make('country')
                            ->maxLength(100),
                        TextInput::make('city')
                            ->maxLength(100),
                        TextInput::make('product')
                            ->maxLength(255),
                    ])->columns(2)
                    ->visible(fn ($record) => $record && $record->form_type === 'contact'),
                
                Section::make('Message')
                    ->schema([
                        Textarea::make('message')
                            ->rows(4),
                    ]),
                
                Section::make('Admin Management')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'read' => 'Read',
                                'replied' => 'Replied',
                                'spam' => 'Spam'
                            ])
                            ->required(),
                        Textarea::make('admin_notes')
                            ->rows(3)
                            ->label('Admin Notes'),
                    ]),
                
                Section::make('Technical Information')
                    ->schema([
                        TextInput::make('ip_address')
                            ->disabled(),
                        TextInput::make('user_agent')
                            ->disabled()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }
    
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                BadgeColumn::make('form_type')
                    ->label('Form Type')
                    ->colors([
                        'primary' => 'contact',
                        'success' => 'enquiry',
                        'warning' => 'demo',
                    ])
                    ->formatStateUsing(fn ($state) => match($state) {
                        'contact' => 'Contact',
                        'enquiry' => 'Enquiry',
                        'demo' => 'Demo',
                        default => $state,
                    }),
                TextColumn::make('fullname')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('company')
                    ->searchable()
                    ->limit(30),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'read',
                        'success' => 'replied',
                        'danger' => 'spam',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
                TextColumn::make('read_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('form_type')
                    ->options([
                        'contact' => 'Contact Form',
                        'enquiry' => 'Enquiry Form',
                        'demo' => 'Demo Request',
                    ]),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'read' => 'Read',
                        'replied' => 'Replied',
                        'spam' => 'Spam',
                    ]),
                Tables\Filters\Filter::make('created_at')
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
                    })
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('markAsRead')
                    ->action(function (FormSubmission $record) {
                        $record->markAsRead();
                        Notification::make()
                            ->title('Marked as read')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (FormSubmission $record) => $record->status === 'pending')
                    ->icon('heroicon-o-check-circle'),
                Tables\Actions\Action::make('markAsReplied')
                    ->action(function (FormSubmission $record) {
                        $record->markAsReplied();
                        Notification::make()
                            ->title('Marked as replied')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (FormSubmission $record) => $record->status === 'read')
                    ->icon('heroicon-o-reply'),
                Tables\Actions\Action::make('markAsSpam')
                    ->action(function (FormSubmission $record) {
                        $record->markAsSpam();
                        Notification::make()
                            ->title('Marked as spam')
                            ->warning()
                            ->send();
                    })
                    ->visible(fn (FormSubmission $record) => $record->status !== 'spam')
                    ->icon('heroicon-o-exclamation-circle')
                    ->color('danger'),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('markAsRead')
                        ->action(function (Collection $records) {
                            $records->each->markAsRead();
                            Notification::make()
                                ->title('Marked as read')
                                ->success()
                                ->send();
                        }),
                    Tables\Actions\BulkAction::make('markAsSpam')
                        ->action(function (Collection $records) {
                            $records->each->markAsSpam();
                            Notification::make()
                                ->title('Marked as spam')
                                ->warning()
                                ->send();
                        }),
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
            'index' => Pages\ListFormSubmissions::route('/'),
            'create' => Pages\CreateFormSubmission::route('/create'),
            'edit' => Pages\EditFormSubmission::route('/{record}/edit'),
            'view' => Pages\ViewFormSubmission::route('/{record}'),
        ];
    }
}