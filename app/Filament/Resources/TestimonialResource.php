<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;
    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationGroup = 'Content Management';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Testimonial')->schema([
                Forms\Components\TextInput::make('username')->required()->maxLength(255),
                Forms\Components\Textarea::make('quote')->required()->rows(4)->maxLength(1000),
            ]),
            Forms\Components\Section::make('Settings')->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Toggle::make('is_active')->default(true),
                    Forms\Components\TextInput::make('order')->numeric()->default(0),
                ]),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('username')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('quote')->limit(60),
                Tables\Columns\IconColumn::make('is_active')->boolean(),
                Tables\Columns\TextColumn::make('order')->sortable(),
            ])
            ->defaultSort('order', 'asc')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('moveUp')
                    ->action(fn (Testimonial $r) => self::swap($r, 'up'))
                    ->icon('heroicon-o-arrow-up')->color('gray'),
                Tables\Actions\Action::make('moveDown')
                    ->action(fn (Testimonial $r) => self::swap($r, 'down'))
                    ->icon('heroicon-o-arrow-down')->color('gray'),
            ])
            ->bulkActions([Tables\Actions\BulkActionGroup::make([Tables\Actions\DeleteBulkAction::make()])]);
    }

    private static function swap(Testimonial $record, string $dir): void
    {
        $neighbor = $dir === 'up'
            ? Testimonial::where('order', '<', $record->order)->orderBy('order', 'desc')->first()
            : Testimonial::where('order', '>', $record->order)->orderBy('order', 'asc')->first();
        if ($neighbor) {
            [$record->order, $neighbor->order] = [$neighbor->order, $record->order];
            $record->save(); $neighbor->save();
        }
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit'   => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
