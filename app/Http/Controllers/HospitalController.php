<?php


namespace App\Http\Controllers;
use App\Models\LeadershipMessage;

use App\Models\Notice;

use App\Models\{
    Department,
    Doctor,
    Service,
    Facility,
    GalleryImage,
    NewsPost,
    SiteSetting
};

use Illuminate\Http\Request;

class HospitalController extends Controller
{
    // ==========================================
    // HOME PAGE
    // ==========================================
  
public function home()
{
    return view('pages.index', [
        'title' => 'Home | Attariya Hospital',

        // ACTIVE DOCTORS
        'doctors' => Doctor::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(8)
            ->get(),

        // ACTIVE DEPARTMENTS
        'departments' => Department::where('is_active', true)
            ->orderBy('sort_order')
            ->limit(6)
            ->get(),

        // ACTIVE SERVICES
        'services' => Service::where('is_active', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->limit(4)
            ->get(),

        // LATEST PUBLISHED NEWS
        'news' => NewsPost::where('is_published', true)
            ->where('published_at', '<=', now())
            ->latest('published_at')
            ->limit(3)
            ->get(),

        // LATEST PUBLISHED NOTICES
        'notices' => Notice::published()
            ->latest('published_at')
            ->limit(3)
            ->get(),

        // CHAIRMAN & DIRECTOR MESSAGES
        'leadershipMessages' => LeadershipMessage::published()
            ->orderBy('sort_order')
            ->limit(2)
            ->get(),
    ]);
}




    // ==========================================
    // NOTICES LISTING
    // ==========================================
    public function notices()
    {
        $notices = Notice::published()
            ->orderByDesc('published_at')
            ->get();

        return view('pages.notices', [
            'notices' => $notices,
            'title' => 'Notices | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SINGLE NOTICE DETAIL
    // ==========================================
    public function notice(string $slug)
    {
        $notice = Notice::published()
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedNotices = Notice::published()
            ->where('id', '!=', $notice->id)
            ->latest('published_at')
            ->limit(5)
            ->get();

        return view('notices.show', [
            'notice' => $notice,
            'relatedNotices' => $relatedNotices,
            'title' => $notice->title . ' | Attariya Hospital',
        ]);
    }

    // ==========================================
    // DOCTORS LIST
    // ==========================================
    public function doctors(Request $request)
    {
        $query = Doctor::where('is_active', true);

        if ($request->filled('q')) {
            $query->where(
                fn($q) =>
                $q->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('specialty', 'like', '%' . $request->q . '%')
            );
        }

        return view('pages.doctors', [
            'doctors' => $query->orderBy('sort_order')->get(),
            'title' => 'Doctors | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SINGLE DOCTOR
    // ==========================================
    public function doctor(string $slug)
    {
        return view('dynamic.doctor', [
            'doctor' => Doctor::where('slug', $slug)
                ->where('is_active', true)
                ->firstOrFail(),

            'title' => 'Doctor | Attariya Hospital',
        ]);
    }

    // ==========================================
    // DEPARTMENTS LIST
    // ==========================================
    public function departments()
    {
        return view('pages.departments', [
            'departments' => Department::where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'title' => 'Departments | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SINGLE DEPARTMENT
    // ==========================================
    public function department(string $slug)
    {
        $department = Department::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('dynamic.department', [
            'department' => $department,

            'doctors' => Doctor::where('department_id', $department->id)
                ->where('is_active', true)
                ->get(),

            'title' => $department->name . ' | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SERVICES LIST
    // ==========================================
    public function services()
    {
        return view('pages.services', [
            'services' => Service::where('is_active', true)
                ->orderByDesc('is_featured')
                ->orderBy('sort_order')
                ->get(),

            'title' => 'Services | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SINGLE SERVICE — CENTRALIZED DETAIL
    // ==========================================
    public function service(string $slug)
    {
        // Selected service
        $service = Service::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        // All active services for the sidebar
        // Includes the current service for active highlighting
        $relatedServices = Service::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        return view('services.show', [
            'service' => $service,
            'relatedServices' => $relatedServices,
            'title' => $service->name . ' | Attariya Hospital',
        ]);
    }

    // ==========================================
    // FACILITIES
    // ==========================================
    public function facilities()
    {
        $facilities = Facility::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Temporary featured facility selection
        $featuredFacility = $facilities->first(function ($facility) {
            $name = strtolower($facility->name);

            return str_contains($name, 'cath lab')
                || str_contains($name, 'catheterization');
        });

        $otherFacilities = $facilities->reject(
            fn($facility) => $featuredFacility
                && $facility->id === $featuredFacility->id
        );

        return view('pages.facilities', [
            'featuredFacility' => $featuredFacility,
            'otherFacilities' => $otherFacilities,
            'title' => 'Facilities | Attariya Hospital',
        ]);
    }

    // ==========================================
    // GALLERY
    // ==========================================
    public function gallery()
    {
        return view('dynamic.gallery', [
            'photos' => GalleryImage::where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'title' => 'Gallery | Attariya Hospital',
        ]);
    }

    // ==========================================
    // NEWS LIST
    // ==========================================
    public function news()
    {
        return view('pages.news', [
            'posts' => NewsPost::where('is_published', true)
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->paginate(9),

            'title' => 'News | Attariya Hospital',
        ]);
    }

    // ==========================================
    // SINGLE NEWS POST
    // ==========================================
// ==========================================
// SINGLE NEWS POST WITH RELATED NEWS
// ==========================================
public function newsPost(string $slug)
{
    $post = NewsPost::query()
        ->where('slug', $slug)
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->firstOrFail();

    $relatedNews = NewsPost::query()
        ->where('id', '!=', $post->id)
        ->where('is_published', true)
        ->whereNotNull('published_at')
        ->where('published_at', '<=', now())
        ->latest('published_at')
        ->limit(5)
        ->get();

    return view('dynamic.news-show', [
        'post' => $post,
        'relatedNews' => $relatedNews,
        'title' => $post->title . ' | Attariya Hospital',
    ]);
}

    // ==========================================
    // STATIC PAGES
    // ==========================================
    public function page(string $name)
    {
        abort_unless(
            in_array($name, [
                'about',
                'articles',
                'contact',
                'appointment',
                'privacy',
            ]),
            404
        );

        return view('pages.' . $name, [
            'title' => ucfirst($name) . ' | Attariya Hospital',
        ]);
    }
}