<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use App\Models\Blog;
use App\Models\JobOffer;
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
        return view('welcome', ['blogs' => $blogs]);
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
        return view('admin.dashboard');
    }

    public function blogs()
    {

        $blogs = Blog::all();

        return view('admin.blog.index', ['blogs' => $blogs]);
    }


    public function agency()
    {
        return view('main.agency');
    }

    public function about()
    {
        return view('main.about');
    }

    public function faq()
    {
        return view('main.faq');
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
