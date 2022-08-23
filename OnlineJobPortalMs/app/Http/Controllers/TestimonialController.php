<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function __construct()
    {   //---ADMIN ONLY
        $this->middleware('admin');
    }

    //---Testimonial Page---
    public function index()
    {
        $testimonials = Testimonial::paginate(10);
        return view('testimonial.index', compact('testimonials'));
    }

    //---Create testimonial---
    public function create()
    {
        return view('testimonial.create');
    }

    //---Store Created Testimonial---
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'content' => 'required',
            'profession' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('uploads/testimonial', 'public');
            Testimonial::create([
                'name' => $request->get('name'),
                'profession' => $request->get('profession'),
                'content' => $request->get('content'),
                'image' => $path
            ]);
        }
        return redirect()->back()->with('message', 'Testimonial created successfully!');
    }


}
