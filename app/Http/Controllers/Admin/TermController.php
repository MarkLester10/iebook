<?php

namespace App\Http\Controllers\Admin;

use App\Models\Term;
use App\Imports\TermsImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.terms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = Term::findOrFail($id);
        $term->delete();
        return back()->with(
            'message', '<a href="'.route('terms.restore', $term->id).'" class="btn btn-brand btn-sm m-btn m-btn--pill m-btn--wide">
            Restore
        </a>');
    }

    public function forceDelete($id)
    {
        $term = Term::onlyTrashed()->findOrFail($id);
        Storage::delete('public/term_images/' . $term->image);
        $term->forceDelete();
        return redirect()->route('terms.index', ['type' => 0])->with('success', 'Term has been deleted.');
    }

    public function restoreTerm($id)
    {
        $term = Term::onlyTrashed()->findOrFail($id);
        $term->restore();
        return back()->with('success', 'Term has been restored.');
    }

    public function bulkUpload(Request $request)
    {
        Excel::import(new TermsImport(), $request->file('excel_file'));
        notify()->success('Bulk Upload Completed Successfully');
        return back();
    }
}
