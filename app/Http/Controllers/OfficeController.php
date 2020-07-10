<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\OfficeRequest;

use App\Models\Office;

use Exception;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Session;

class OfficeController extends Controller
{

    public function __construct()
    {
        // Middleware
        $this->middleware('sentinel.auth');
        $this->middleware('sentinel.access:offices.create', ['only' => ['create', 'store']]);
        $this->middleware('sentinel.access:offices.view', ['only' => ['index', 'show', 'trash']]);
        $this->middleware('sentinel.access:offices.update', ['only' => ['edit', 'update']]);
        $this->middleware('sentinel.access:offices.destroy', ['only' => ['destroy']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::paginate(5);
        return view('Centaur::offices.index', compact('offices'));
    }

    /**
     * Display a listing of all soft deleted records.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $offices = Office::onlyTrashed()->paginate(5);
        return view('Centaur::offices.trash', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Centaur::offices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\OfficeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfficeRequest $request)
    {
        $data = $request->except('_token');
        $office = new Office();
        try{
            $newOffice = $office->saveOffice($data);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully added a new office with ID:'.$newOffice->id.' and location '.$newOffice->city);

        return Redirect::route('offices.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        return view('Centaur::offices.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Office $office)
    {
        return view('Centaur::offices.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request\OfficeRequest  $request
     * @param  \App\Models\Office $office
     * @return \Illuminate\Http\Response
     */
    public function update(OfficeRequest $request, Office $office)
    {
        $data = $request->except(['_token', '_method']);
        try{
            $updatedOffice = $office->updateOffice($data);

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'You have successfully update office with ID:'.$office->id.' and location '.$office->city);

        return Redirect::route('offices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $office = Office::withTrashed()->findOrFail($id);

        try{
            $office->deleteOffice();

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Office with ID:'.$office->id.' and location '.$office->city. ' has been deleted');

        return Redirect::route('offices.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $office = Office::withTrashed()->findOrFail($id);
        try{
            $office->restore();

        } catch (Exception $e){
            Session::flash('error', 'Something went wrong, please try again');
            return Redirect::back();
        }

        Session::flash('success', 'Office with ID:'.$office->id.' and location '.$office->city. ' has been successfully restored');

        return Redirect::route('offices.index');
    }
}
