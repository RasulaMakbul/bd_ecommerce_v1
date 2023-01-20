<?php

namespace App\Http\Controllers;

use App\Http\Requests\MakeupColorpRequest;
use App\Models\MakeupColorp;
use App\Models\makeupProduct;
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
        return view('makeupColorP.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $makeupProduct = makeupProduct::all();
        return view('makeupColorP.create', compact('makeupProduct'));
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
        return redirect()->back()->withMessage('Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */
    public function show(MakeupColorp $makeupColorp)
    {
        dd($makeupColorp);
        return view('makeupColorP.show', compact('makeupColorp'));
    }
    public function viewColor($id)
    {
        // dd($id);
        $colorP = MakeupColorp::find($id);
        return view('makeupColorP.show', compact('colorP'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MakeupColorp  $makeupColorp
     * @return \Illuminate\Http\Response
     */
    public function edit(MakeupColorp $makeupColorp)
    {
        dd($makeupColorp);
        return view('makeupColorP.edit', compact('makeupColorp'));
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
        //
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
