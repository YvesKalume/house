<?php

namespace App\Http\Controllers\House;

use App\Event;
use App\House;
use App\Http\Controllers\Controller;
use App\Http\Requests\HouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Status;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','map','search']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $houses = House::paginate(9);
        return view('house.index',compact('houses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = Status::get();
        return view('house.add',compact('statuses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HouseRequest $request)
    {
        $picture = request('picture')->store('pictures/house','public');

        House::create([
            'avenue'=>request('avenue'),
            'number'=>request('number'),
            'square'=>request('square'),
            'long'=>request('long'),
            'lat'=>request('lat'),
            'pieces'=>request('pieces'),
            'price'=>request('price'),
            'picture'=>$picture,
            'description'=>request('description'),
            'status_id'=>request('status'),
            'user_id'=>auth()->id(),
        ]);

        return redirect(route('house.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $house = House::findOrFail($id);
        return view('house.preview',compact('house'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $statuses = Status::get();
        $house = House::findOrFail($id);
        return view('house.edit',compact(['house','statuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHouseRequest $request, $id)
    {

        if ($request->missing('picture')) {

            $picture = House::find($id)->picture;

        } else {

            $picture = \request('picture')->store('pictures/house','public');

        }

        House::findOrFail($id)->update([
            'avenue'=>request('avenue'),
            'number'=>request('number'),
            'square'=>request('square'),
            'long'=>request('long'),
            'lat'=>request('lat'),
            'pieces'=>request('pieces'),
            'price'=>request('price'),
            'picture'=>$picture,
            'description'=>request('description'),
            'status_id'=>request('status'),
            'user_id'=>auth()->id(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        House::findOrFail($id)->delete();
        return back();
    }

    public function mine(Request $request){
        $houses=House::where('user_id',auth()->id())->paginate(10);
        return view('house.mine',compact('houses'));
    }

    public function map(){
        $houses = House::get();
        return view('house.map',compact('houses'));
    }

    public function search(){
        $query = request('search');
        $houses = House::where('avenue','LIKE','%'.$query.'%')->orWhere('square','LIKE','%'.$query.'%')->paginate(5);
        return response(view('house.index',compact('houses')));
    }
}
