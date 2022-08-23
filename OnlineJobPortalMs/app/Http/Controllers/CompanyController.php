<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Auth;
use App\Models\Rating;
use App\Http\Resources\Rating as RatingResource;

//use ExpressiveDate;
use Validator;


class CompanyController extends Controller
{
    public function __construct()
    {
        //--Verified Employer, then the except array are not employer middleware guided
        $this->middleware(['employer', 'verified'], ['except' => array('index', 'company', 'setRating', 'getRating', 'searchCompanies')]);

    }

    //---Company index page showing ratings---
    public function index($id, Company $company)
    {
        $data = RatingResource::collection(Rating::all()->where('company_id', $id));
        return view('company.index', compact('company', 'data'));
    }

    //--Creat new Rating n Allow expressively and easily transform the Rating model its collections into JSON
    public function setRating(Request $request, $id)
    {
        $company_id = $id;
        $user_id = auth()->user()->id;
        return new RatingResource(Rating::create([
            'company_id' => $company_id,
            'user_id' => $user_id,
            'rating' => $request->rating
        ]));
    }

    //---List of companies---
    public function company()
    {
        $companies = Company::paginate(12);
        return view('company.companies', compact('companies'));
    }

    //---View Company details/profile---
    public function create()
    {
        return view('company.create');
    }

    //---Store Company Details---
    public function store(Request $request)
    {
        //To Validate
        $this->validate($request, [
            'address' => 'required',
            'slogan' => 'required',
            'description' => 'required|min:20',
            'phone' => 'required|min:11|numeric'
        ]);

        $user_id = auth()->user()->id;

        //Query To update the current user that logged in
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description')
        ]);
        return redirect()->back()->with('message', 'Company Information Successfully Updated !');  //Alert Message
    }


    //---Update company Cover Photo---
    public function coverPhoto(Request $request)
    {
        $this->validate($request, [
            'cover_photo' => 'required|mimes:png,jpg,jpeg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasfile('cover_photo')) {
            $file = $request->file('cover_photo');
            //---This get the file extension like jpg, png n so on
            $ext = $file->getClientOriginalExtension();
            //---and concat the extension with this time function which make each of it unique as well
            $filename = time() . '.' . $ext;
            //---Move it to this public directory location
            $file->move('uploads/coverphoto/', $filename);
            //Update Query to Update to DB by assigning the $filesname to cover_photo on company table for the current user in session
            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename
            ]);
            return redirect()->back()->with('message', 'Company Cover Photo Successfully Updated !');  //Alert Message

        }
    }


    //---Update Company Logo with same proceduare as above
    public function companyLogo(Request $request)
    {
        $this->validate($request, [
            'company_logo' => 'required|mimes:png,jpg,jpeg|max:20000'
        ]);
        $user_id = auth()->user()->id;
        if ($request->hasfile('company_logo')) {
            $file = $request->file('company_logo');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('uploads/logo/', $filename);
            Company::where('user_id', $user_id)->update([
                'logo' => $filename
            ]);
            return redirect()->back()->with('message', 'Company Logo Successfully Updated !');
        }
    }

    //---Search Companies and send Json Response to Search VueJs to display the result
    public function searchCompanies(Request $request)
    {
        //---get keyword from v-model SearchComponentVueJs
        $keyword = $request->get('keyword');
        $company = Company::where('cname', 'LIKE', '%' . $keyword . '%')->limit(5)->get();
        return response()->json($company);
    }


}
