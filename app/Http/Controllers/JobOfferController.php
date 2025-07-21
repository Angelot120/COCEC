<?php

namespace App\Http\Controllers;

use App\Interfaces\JobOfferInterface;
use Illuminate\Http\Request;

class JobOfferController extends Controller

{
    /**
     * Display a listing of the resource.
     */


protected $jobRepo;

public function __construct(JobOfferInterface $jobRepo){
    $this->$jobRepo=$jobRepo;
}

    public function index()
    {
        //
        return view('admin.settings.job', compact(job_offer));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {
            $request->validate([
                'name'=>'required|string|max:255',
                'description'=>'required|string|max:255',
                'type'=>'required|in:stage, emploi',
            ])
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
