<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Category;

class CategoryController extends Controller
{
    //---Display Jobs of each category and the category name
    public function index($id)
    {
        $jobs = Job::where('category_id', $id)->paginate(5);
        $categoryName = Category::where('id', $id)->first();

        return view('job.jobs-category', compact('jobs', 'categoryName'));
    }
}
