<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeupRequest;
use App\Models\Makeup;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MakeupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeups = Makeup::all();
        return view('makeups.index', compact('makeups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('makeups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeupRequest $makeupRequest)
    {
        // dd($makeupRequest);
        $requestData = [
            'title' => $makeupRequest->title,
            'description' => $makeupRequest->description,
            'is_active' => $makeupRequest->is_active ? true : false,
        ];
        Makeup::create($requestData);
        return redirect()->route('makeup.index')->withMessage('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Makeup  $makeup
     * @return \Illuminate\Http\Response
     */
    public function show(Makeup $makeup)
    {
        return view('makeups.show', compact('makeup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Makeup  $makeup
     * @return \Illuminate\Http\Response
     */
    public function edit(Makeup $makeup)
    {
        return view('makeups.edit', compact('makeup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Makeup  $makeup
     * @return \Illuminate\Http\Response
     */
    public function update(MakeupRequest $makeupRequest, Makeup $makeup)
    {
        // dd($makeupRequest);
        $requestData = [
            'title' => $makeupRequest->title,
            'description' => $makeupRequest->description,
            'is_active' => $makeupRequest->is_active ? true : false,
        ];
        $makeup->update($requestData);
        return redirect()->route('makeup.index')->withMessage('Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Makeup  $makeup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Makeup $makeup)
    {
        $makeup->delete();
        return back()->withMessage('Successfully deleted');
    }

    public function trash()
    {
        $makeups = Makeup::onlyTrashed()->get();
        return view('makeups.trash', compact('makeups'));
    }

    public function restore($id)
    {
        $makeup = Makeup::onlyTrashed()->find($id);
        $makeup->restore();

        return redirect()
            ->route('makeup.trash')
            ->withMessage('Successfully restored');
    }

    public function delete($id)
    {
        try {
            $makeup = Makeup::onlyTrashed()->find($id);
            $makeup->forceDelete();

            return redirect()
                ->route('makeup.trash')
                ->withMessage('Successfully deleted');
        } catch (QueryException $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function active($id)
    {
        // dd($id);
        $makeup = Makeup::find($id);
        $makeup->is_active = 1;
        $makeup->update();
        return back();
    }
    public function inactive($id)
    {
        // dd($id);
        $makeup = Makeup::find($id);
        $makeup->is_active = 2;
        $makeup->update();
        return back();
    }
}
