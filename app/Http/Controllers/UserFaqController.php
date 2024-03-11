<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class UserFaqController extends Controller
{
    public function index()
	{
	$faqs = Faq::all();
    return view('content.pages.faq.index',compact('faqs'));
}
}
