<?php
// app/Http/Controllers/Api/CareerController.php



namespace App\Filament\Resources;

use App\Filament\Resources\CareerApplicationResource\Pages;
use App\Models\CareerApplication;
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
use Illuminate\Support\Collection; // Add this import

class CareerApplicationResource extends Resource
{
    protected static ?string $model = CareerApplication::class;
    
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    protected static ?string $navigationGroup = 'Form Management';
    
    protected static ?string $navigationLabel = 'Career Applications';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Personal Information')
                    ->schema([
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
                        TextInput::make('apply_for')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),
                
                Section::make('Resume Information')
                    ->schema([
                        TextInput::make('resume_original_name')
                            ->label('Resume File')
                            ->disabled(),
                        TextInput::make('resume_size')
                            ->label('File Size (KB)')
                            ->formatStateUsing(fn ($state) => round($state / 1024, 2) . ' KB')
                            ->disabled(),
                    ])->columns(2),
                
                Section::make('Application Status')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'reviewed' => 'Reviewed',
                                'shortlisted' => 'Shortlisted',
                                'rejected' => 'Rejected',
                                'hired' => 'Hired',
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
                        TextInput::make('reviewed_at')
                            ->disabled()
                            ->dateTime(),
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
                TextColumn::make('fullname')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('mobile')
                    ->searchable(),
                TextColumn::make('apply_for')
                    ->label('Position')
                    ->searchable()
                    ->sortable(),
                BadgeColumn::make('status')
                    ->colors([
                        'warning' => 'pending',
                        'info' => 'reviewed',
                        'success' => 'shortlisted',
                        'danger' => 'rejected',
                        'primary' => 'hired',
                    ]),
                TextColumn::make('created_at')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'reviewed' => 'Reviewed',
                        'shortlisted' => 'Shortlisted',
                        'rejected' => 'Rejected',
                        'hired' => 'Hired',
                    ]),
                Tables\Filters\SelectFilter::make('apply_for')
                    ->options(fn () => CareerApplication::distinct()->pluck('apply_for', 'apply_for')->toArray()),
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
                
                // FIXED: Updated download action to use your actual API route
                Tables\Actions\Action::make('download')
                    ->label('Download Resume')
                    ->url(fn (CareerApplication $record) => url("/api/career/applications/{$record->id}/download"))
                    ->openUrlInNewTab()
                    ->icon('heroicon-o-arrow-down-tray'),
                
                Tables\Actions\Action::make('shortlist')
                    ->action(function (CareerApplication $record) {
                        $record->markAsShortlisted();
                        Notification::make()
                            ->title('Application shortlisted')
                            ->success()
                            ->send();
                    })
                    ->visible(fn (CareerApplication $record) => $record->status === 'reviewed')
                    ->icon('heroicon-o-star'),
                    
                Tables\Actions\Action::make('reject')
                    ->action(function (CareerApplication $record) {
                        $record->markAsRejected();
                        Notification::make()
                            ->title('Application rejected')
                            ->warning()
                            ->send();
                    })
                    ->visible(fn (CareerApplication $record) => !in_array($record->status, ['rejected', 'hired']))
                    ->icon('heroicon-o-x-circle')
                    ->color('danger'),
                    
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('shortlist')
                        ->action(function (Collection $records) {
                            $records->each->markAsShortlisted();
                            Notification::make()
                                ->title('Applications shortlisted')
                                ->success()
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
            'index' => Pages\ListCareerApplications::route('/'),
            'create' => Pages\CreateCareerApplication::route('/create'),
            'edit' => Pages\EditCareerApplication::route('/{record}/edit'),
            'view' => Pages\ViewCareerApplication::route('/{record}'),
        ];
    }
}

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\CareerApplication;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Facades\Log;

// class CareerController extends Controller
// {
//     public function apply(Request $request)
//     {
//         // Validate the request
//         $validator = Validator::make($request->all(), [
//             'fullname' => 'required|string|max:255',
//             'email' => 'required|email|max:255',
//             'mobile' => 'required|string|regex:/^[7-9]\d{9}$/|max:10',
//             'apply_for' => 'required|string|max:255',
//             'document' => 'required|file|mimes:pdf,doc,docx|max:5120', // Max 5MB
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Validation errors',
//                 'errors' => $validator->errors()
//             ], 422);
//         }

//         try {
//             // Handle file upload
//             $file = $request->file('document');
//             $originalName = $file->getClientOriginalName();
//             $mimeType = $file->getMimeType();
//             $fileSize = $file->getSize();
            
//             // Store file with unique name
//             $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
//             $filePath = $file->storeAs('career/resumes', $fileName, 'public');
            
//             // Create application record
//             $application = CareerApplication::create([
//                 'fullname' => $request->fullname,
//                 'email' => $request->email,
//                 'mobile' => $request->mobile,
//                 'apply_for' => $request->apply_for,
//                 'resume_path' => $filePath,
//                 'resume_original_name' => $originalName,
//                 'resume_mime_type' => $mimeType,
//                 'resume_size' => $fileSize,
//                 'status' => 'pending',
//                 'ip_address' => $request->ip(),
//                 'user_agent' => $request->userAgent()
//             ]);

//             // Optional: Send email notification to HR/admin
//             // Mail::to('hr@richsol.com')->send(new NewJobApplication($application));
            
//             // Optional: Send auto-reply to applicant
//             // Mail::to($application->email)->send(new ApplicationReceived($application));

//             return response()->json([
//                 'status' => true,
//                 'message' => 'Application submitted successfully!',
//                 'data' => [
//                     'id' => $application->id,
//                     'fullname' => $application->fullname,
//                     'apply_for' => $application->apply_for
//                 ]
//             ], 200);

//         } catch (\Exception $e) {
//             Log::error('Career application error: ' . $e->getMessage(), [
//                 'data' => $request->all()
//             ]);
            
//             return response()->json([
//                 'status' => false,
//                 'message' => 'There was a technical error! Please try again.'
//             ], 500);
//         }
//     }

//     // Admin endpoints
//     public function index(Request $request)
//     {
//         $query = CareerApplication::latest();
        
//         // Filter by status
//         if ($request->has('status')) {
//             $query->where('status', $request->status);
//         }
        
//         // Filter by position
//         if ($request->has('position')) {
//             $query->where('apply_for', $request->position);
//         }
        
//         // Search
//         if ($request->has('search')) {
//             $search = $request->search;
//             $query->where(function($q) use ($search) {
//                 $q->where('fullname', 'like', "%{$search}%")
//                   ->orWhere('email', 'like', "%{$search}%")
//                   ->orWhere('mobile', 'like', "%{$search}%")
//                   ->orWhere('apply_for', 'like', "%{$search}%");
//             });
//         }
        
//         $applications = $query->paginate(20);
        
//         return response()->json($applications);
//     }

//     public function show($id)
//     {
//         $application = CareerApplication::findOrFail($id);
        
//         // Add file URL to response
//         $application->resume_url = $application->resume_url;
        
//         return response()->json($application);
//     }

//     public function downloadResume($id)
//     {
//         $application = CareerApplication::findOrFail($id);
        
//         if (!$application->resume_path || !Storage::disk('public')->exists($application->resume_path)) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'Resume not found'
//             ], 404);
//         }
        
//         return Storage::disk('public')->download($application->resume_path, $application->resume_original_name);
//     }

//     public function updateStatus(Request $request, $id)
//     {
//         $application = CareerApplication::findOrFail($id);
        
//         $validator = Validator::make($request->all(), [
//             'status' => 'required|in:pending,reviewed,shortlisted,rejected,hired',
//             'admin_notes' => 'nullable|string'
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['errors' => $validator->errors()], 422);
//         }

//         $application->update([
//             'status' => $request->status,
//             'admin_notes' => $request->admin_notes,
//             'reviewed_at' => in_array($request->status, ['reviewed', 'shortlisted', 'rejected', 'hired']) ? now() : $application->reviewed_at,
//             'reviewed_by' => auth()->id() ?? null
//         ]);

//         return response()->json([
//             'status' => true,
//             'message' => 'Status updated successfully',
//             'data' => $application
//         ]);
//     }

//     public function destroy($id)
//     {
//         $application = CareerApplication::findOrFail($id);
        
//         // Delete resume file
//         if ($application->resume_path && Storage::disk('public')->exists($application->resume_path)) {
//             Storage::disk('public')->delete($application->resume_path);
//         }
        
//         $application->delete();
        
//         return response()->json([
//             'status' => true,
//             'message' => 'Application deleted successfully'
//         ]);
//     }
// }