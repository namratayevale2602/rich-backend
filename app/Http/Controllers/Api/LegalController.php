<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactInfo;
use App\Models\ContactPhone;
use App\Models\LegalPage;

class LegalController extends Controller
{
    private function formatPage(LegalPage $page): array
    {
        $contact = null;
        $sections = $page->sections->map(function ($section) use (&$contact) {
            $data = [
                'id'      => $section->id,
                'title'   => $section->title,
                'content' => $section->content,
            ];

            if ($section->subsections->isNotEmpty()) {
                $data['subsections'] = $section->subsections->map(fn($s) => [
                    'title'   => $s->title,
                    'content' => $s->content,
                ])->values();
            }

            if ($section->show_contact_info) {
                if (!$contact) {
                    $info   = ContactInfo::active()->first();
                    $phones = ContactPhone::active()->where('type', 'support')->pluck('phone');
                    $contact = $info ? [
                        'company' => 'Rich System Solutions Pvt Ltd',
                        'address' => $info->address,
                        'email'   => $info->email,
                        'phone'   => $phones->implode(' / '),
                        'website' => 'richsol.com',
                    ] : null;
                }
                $data['contactInfo'] = $contact;
            }

            return $data;
        })->values();

        return [
            'pageTitle'    => $page->page_title,
            'lastUpdated'  => $page->last_updated,
            'introduction' => $page->introduction,
            'sections'     => $sections,
        ];
    }

    public function terms()
    {
        $page = LegalPage::where('type', 'terms')->where('is_active', true)->with(['sections.subsections'])->first();

        if (!$page) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $this->formatPage($page)]);
    }

    public function privacy()
    {
        $page = LegalPage::where('type', 'privacy')->where('is_active', true)->with(['sections.subsections'])->first();

        if (!$page) {
            return response()->json(['success' => false, 'message' => 'Not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $this->formatPage($page)]);
    }
}
