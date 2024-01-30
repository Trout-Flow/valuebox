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
        $countries = $this->CountryService->search($request->all());
        $name = $request['name'];
        return view('Countries.index', compact('countries', 'name'));
    }
    public function create()
    {

       return view('Countries.create');
    }


    public function store(CountryRequest $request)
    {
        $data = $data = $request->except('_token','id');
        $this->CountryService->findUpdateOrCreate(countries::class, ['id'=>''], $data);
        return redirect('Country/list')->with('message', CountryService::COUNTRY_SAVED);
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
        $deleted = countries::destroy($id);
        if($deleted){
            return redirect()->route('country.list')->with('error','Country Deleted successfully.');
        }else{
            return response()->json(['error'=>'', 'message'=>'Country not deleted']);
        }
    }

}