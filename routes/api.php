<?php
// routes/api.php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\AboutHeroController;
use App\Http\Controllers\Api\AboutUsSectionController;
use App\Http\Controllers\Api\AboutKeyController;
use App\Http\Controllers\Api\EnquiryFlexController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\SoftwareItServiceController;
use App\Http\Controllers\Api\DigitalMarketingServiceController;
use App\Http\Controllers\Api\HeroSectionController;
use App\Http\Controllers\Api\ServiceSliderController;
use App\Http\Controllers\Api\CounterController;
use App\Http\Controllers\Api\ClientLogoController;
use App\Http\Controllers\Api\ServiceWeOfferController;
use App\Http\Controllers\Api\IndustryController;
use App\Http\Controllers\Api\OfferSectionController;
use App\Http\Controllers\Api\TestimonialController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\InternshipApplicationController;
use App\Http\Controllers\Api\FormSubmissionController;
use App\Http\Controllers\Api\CareerController;
use App\Http\Controllers\Api\HowToGuideController;
use App\Http\Controllers\Api\FaqResourceController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactInfoController;
use App\Http\Controllers\Api\LegalController;
use App\Http\Controllers\Api\PageSeoController;
use App\Http\Controllers\Api\SeoKeywordController;
use Illuminate\Support\Facades\Route;


Route::get('/about-hero', [AboutHeroController::class, 'index']);
Route::get('/about-us', [AboutUsSectionController::class, 'index']);
Route::get('/about-keys', [AboutKeyController::class, 'index']);
Route::get('/enquiry-flex', [EnquiryFlexController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{slug}', [ServiceController::class, 'show']);
Route::get('/software-it-services', [SoftwareItServiceController::class, 'index']);
Route::get('/software-it-services/{slug}', [SoftwareItServiceController::class, 'show']);
Route::get('/digital-marketing-services', [DigitalMarketingServiceController::class, 'index']);
Route::get('/digital-marketing-services/{slug}', [DigitalMarketingServiceController::class, 'show']);
Route::get('/banners', [BannerController::class, 'index']);
Route::get('/banners/{id}', [BannerController::class, 'show']);
Route::get('/hero', [HeroSectionController::class, 'index']);
Route::get('/service-sliders', [ServiceSliderController::class, 'index']);
Route::get('/service-sliders/{id}', [ServiceSliderController::class, 'show']);
Route::get('/counters', [CounterController::class, 'index']);
Route::get('/client-logos', [ClientLogoController::class, 'index']);
Route::get('/services-we-offer', [ServiceWeOfferController::class, 'index']);
Route::get('/industries', [IndustryController::class, 'index']);
Route::get('/offer-section', [OfferSectionController::class, 'index']);
Route::get('/testimonials', [TestimonialController::class, 'index']);
Route::get('/faqs', [FaqController::class, 'index']);


// Public routes for internship applications
Route::post('/internship/apply', [InternshipApplicationController::class, 'store']);
Route::get('/internship/status/{id}', [InternshipApplicationController::class, 'show']);
Route::post('/internship/check-status', [InternshipApplicationController::class, 'checkStatus']);
Route::post('/form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'contact');
    Route::post('/enquiry-form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'enquiry');
    Route::post('/demo-form-submit', [FormSubmissionController::class, 'submit'])
         ->defaults('type', 'demo');
Route::get('/contact-info', [ContactInfoController::class, 'index']);

Route::get('/legal/terms', [LegalController::class, 'terms']);
Route::get('/legal/privacy', [LegalController::class, 'privacy']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{slug}', [BlogController::class, 'show']);
Route::get('/blog-categories/{slug}', [BlogController::class, 'byCategory']);
Route::get('/blog-tags/{slug}', [BlogController::class, 'byTag']);
Route::get('/blog-slugs', [BlogController::class, 'slugs']);

Route::get('/faq/products', [FaqResourceController::class, 'getProducts']);
Route::get('/faq/questions', [FaqResourceController::class, 'getQuestions']);

Route::get('/seo', [PageSeoController::class, 'index']);
Route::get('/seo/{pageKey}', [PageSeoController::class, 'show']);
Route::get('/seo-keywords', [SeoKeywordController::class, 'index']);
Route::get('/seo-keywords/{groupKey}', [SeoKeywordController::class, 'show']);

Route::get('/how-to-guide/intro', [HowToGuideController::class, 'getIntro']);
Route::get('/how-to-guide/magazines', [HowToGuideController::class, 'getMagazines']);
Route::get('/how-to-guide/samples', [HowToGuideController::class, 'getSamples']);

Route::get('/career/intro', [CareerController::class, 'getIntro']);
Route::get('/career/positions', [CareerController::class, 'getPositions']);
Route::post('/career/apply', [CareerController::class, 'apply']);

// Protected admin routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::put('/internship/update-status/{id}', [InternshipApplicationController::class, 'updateStatus']);

      Route::get('/submissions', [FormSubmissionController::class, 'index']);
        Route::get('/submissions/{id}', [FormSubmissionController::class, 'show']);
        Route::put('/submissions/{id}/status', [FormSubmissionController::class, 'updateStatus']);
        Route::delete('/submissions/{id}', [FormSubmissionController::class, 'destroy']);

           Route::get('/career/applications', [CareerController::class, 'index']);
        Route::get('/career/applications/{id}', [CareerController::class, 'show']);
        Route::get('/career/applications/{id}/download', [CareerController::class, 'downloadResume']);
        Route::put('/career/applications/{id}/status', [CareerController::class, 'updateStatus']);
        Route::delete('/career/applications/{id}', [CareerController::class, 'destroy']);
});