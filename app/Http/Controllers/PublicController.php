<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organisation;
use App\Models\Page;

class PublicController extends Controller
{
    public function index()
    {
        $organisations = Organisation::where('status', 'approved')->withCount('membershipPlans')->get();
        return view('public.organisations.index', compact('organisations'));
    }

    public function indexMerchants()
    {
        $merchants = \App\Models\Merchant::where('status', 'approved')->with(['organisation'])->get();
        return view('public.merchants.index', compact('merchants'));
    }

    public function showOrganisation(Organisation $organisation)
    {
        if ($organisation->status !== 'approved') {
            abort(404);
        }

        $organisation->load('membershipPlans');
        return view('public.organisations.show', compact('organisation'));
    }

    public function showPage($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        return view('public.page', compact('page'));
    }
}
