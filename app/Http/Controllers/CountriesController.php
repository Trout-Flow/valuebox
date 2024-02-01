<?php

namespace App\Http\Controllers;

use App\Models\countries;
use Illuminate\Http\Request;
use App\Services\CountryService;
use App\Http\Requests\CountryRequest;

class CountriesController extends Controller
{
    protected $CountryService;

    public function __construct(CountryService $CountryService)
    {
        $this->CountryService =$CountryService;
    }

    public function index(Request $request)
    {
        $request = request()->all();
        $countries = $this->CountryService->search($request);
        return view('Countries.index', compact('countries'));
    }
    public function create()
    {

       return view('Countries.create');
    }


    public function store(CountryRequest $request)
    {
        $data = $request->except('_token','id');
        $this->CountryService->findUpdateOrCreate(countries::class, ['id'=>''], $data);
        return redirect('country/list')->with('message', CountryService::COUNTRY_SAVED);
    }

    public function edit($id)
    {
        $country = countries::find($id);

        if(empty($country)){
            abort(404);
        }
        return view('countries.create', compact('country'));

    }

    public function update(CountryRequest $request){
        $request = $request->except('_token','id');
        $this->CountryService->findUpdateOrCreate(countries::class, ['id' => request('id')], $request);
        return redirect('country/list')->with('message', CountryService::COUNTRY_UPDATED);
    }

    public function destroy($id)
    {
        $deleted = Countries::destroy($id);
        if ($deleted) {
            $message = config('constants.delete') ;
            session()->flash('message', $message);
            return redirect('country/list')->with('message', config('constants.delete'));
        } else {
            $message = config('constants.wrong') ;
            session()->flash('message', $message);
            return redirect('country/list')->with('message', config('constants.wrong'));
        }
    }

}
