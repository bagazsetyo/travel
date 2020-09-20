<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackages;
use App\Gallery;
use App\Http\Requests\Admin\TravelPackagesRequest;
use Str;

class TravelPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = TravelPackages::all();

        return view('pages.admin.travel-package.index')->with([
            'items' => $items,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackagesRequest $request)
    {
        $data = $request->all();
        // dd($data);
        // url agarr lebih bagus ,jangan lupa use str
        $data['slug'] = Str::slug($request->title);
        // $data['slug'] = Str::slug($request->name);


        TravelPackages::create($data);
        // dd($data);
        return redirect()->route('travel-package.index');
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
        $items = TravelPackages::findOrFail($id);
        return view('pages.admin.travel-package.edit')->with([
            'items' => $items,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TravelPackagesRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        // dd($data);

        TravelPackages::findOrFail($id)->update($data);
        
        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TravelPackages::destroy($id);
        Gallery::where('travel_packages_id',$id)->destroy();
        return redirect()->route('travel-package.index');
    }
}
