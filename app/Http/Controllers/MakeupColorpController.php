<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeupColorpRequest;
use App\Models\MakeupColorp;
use App\Models\makeupProduct;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class MakeupColorpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $makeupColorp = MakeupColorp::latest()->paginate(15);
        return view('backend.makeupColorP.index', compact('makeupColorp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeupProductp = makeupProduct::all();
        return view('backend.makeupColorP.create', compact('makeupProductp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MakeupColorpRequest $request)
    {
        //dd($request);
        $requestData = [
            'title' => $request->title,
            'code' => $request->code,
            'costing' => $request->costing,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'makeup_product_id' => $request->makeup_product_id,

        ];

        $images = [];
        foreach ($request['images'] as $image) {
            $originalName = $image->getClientOriginalName();
            $fileName = date('Y-m-d') . time() . $originalName;
            $image_path =  $image->storeAs('image', $fileName, 'public');

            array_push($images, $image_path);
        }

        $requestData['images'] = $images;

        MakeupColorp::create($requestData);
        return back()->withMessage('Successfully Created!');
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */
    public function show(MakeupColorp $makeupColorp)
    {
        // dd($makeupColorp);
        return view('backend.makeupColorP.show', compact('makeupColorp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */
    public function edit(MakeupColorp $makeupColorp)
    {
        // dd($makeupColorp);
        $makeupProduct = makeupProduct::all();
        return view('backend.makeupColorP.edit', compact('makeupColorp', 'makeupProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, MakeupColorp $makeupColorp)
    {
        // dd($makeupColorp);
        $requestData = [
            'title' => $request->title,
            'code' => $request->code,
            'costing' => $request->costing,
            'unitPrice' => $request->unitPrice,
            'stock' => $request->stock,
            'makeup_product_id' => $request->makeup_product_id,

        ];

        if ($request->hasFile('images')) {

            $images = [];
            foreach ($request['images'] as $image) {
                $originalName = $image->getClientOriginalName();
                $fileName = date('Y-m-d') . time() . $originalName;
                $image_path =  $image->storeAs('image', $fileName, 'public');

                array_push($images, $image_path);
            }

            $requestData['images'] = $images;
        }

        $makeupColorp->update($requestData);
        return redirect()->route('makeupColorp.index')->withMessage('Successfully Created!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */
    public function destroy(MakeupColorp $makeupColorp)
    {
        //
    }
}
