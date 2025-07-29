<?php

namespace App\Http\Controllers;

use App\Models\AgencyLocation;
use App\Models\Announcements;
use App\Models\Blog;
use App\Models\FaqComment;
use App\Models\JobApplication;
use App\Models\JobOffer;
use App\Models\NewsletterSubscriber;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewsController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::where('is_published', true)
            ->latest()
            ->take(2)
            ->get();

        $total = Visitor::count();

        $announcement = Announcements::where('status', 'publier')->latest()->first();

        return view('welcome', [
            'blogs' => $blogs,
            'total' => $total,
            'announcement' => $announcement
        ]);
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function dashboard()
    {
        // Total des visiteurs
        $totalVisitors = Visitor::count();

        // Visiteurs par mois (par exemple, sur les 12 derniers mois)
        $visitorsByMonth = Visitor::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->take(12)
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        // Visiteurs par jour (par exemple, sur les 30 derniers jours)
        $visitorsByDay = Visitor::selectRaw('strftime("%Y-%m-%d", created_at) as day, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('day')
            ->orderBy('day', 'asc')
            ->get()
            ->pluck('count', 'day')
            ->toArray();

        // Visiteurs par semaine (par exemple, sur les 12 dernières semaines)
        $visitorsByWeek = Visitor::selectRaw('strftime("%Y-%W", created_at) as week, COUNT(*) as count')
            ->where('created_at', '>=', now()->subWeeks(12))
            ->groupBy('week')
            ->orderBy('week', 'asc')
            ->get()
            ->pluck('count', 'week')
            ->toArray();

        // Abonnés newsletter par mois (par exemple, sur les 12 derniers mois)
        $subscribersByMonth = NewsletterSubscriber::selectRaw('strftime("%Y-%m", created_at) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->take(12)
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $totalSubscribers = NewsletterSubscriber::count();
        $jobOffers = JobOffer::count();
        $jobApplications = JobApplication::count();

        return view('admin.dashboard', compact(
            'totalVisitors',
            'visitorsByMonth',
            'visitorsByDay',
            'visitorsByWeek',
            'totalSubscribers',
            'subscribersByMonth',
            'jobOffers',
            'jobApplications'
        ));
    }

    public function blogs()
    {

        $blogs = Blog::where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('admin.blog.index', ['blogs' => $blogs]);
    }


    public function agency()
    {
        $agencies = AgencyLocation::all();

        return view('main.agency', compact('agencies'));
    }

    public function about()
    {
        return view('main.about');
    }

    public function faq()
    {
        // On utilise l'eager loading pour éviter le problème N+1
        $comments = FaqComment::whereNull('parent_id')
            ->with('user', 'replies.user') // Charge les utilisateurs des commentaires ET des réponses
            ->latest()
            ->get();

        return view('main.faq', compact('comments'));
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function job()
    {
        // On récupère uniquement les offres ouvertes, les plus récentes en premier
        $jobOffers = JobOffer::where('status', 'open')->latest()->get();

        return view('main.job.index', compact('jobOffers'));
    }

    public function account()
    {
        return view('main.account.index');
    }

    public function products()
    {
        return view('main.products');
    }

    public function finance()
    {
        return view('main.digitalfinance');
    }

    public function announcements()
    {

        $announcements = Announcements::all();

        return view('admin.announcement.index', ['announcements' => $announcements]);
    }

    public function locality()
    {
        return view('admin.settings.localities');
    }
}
