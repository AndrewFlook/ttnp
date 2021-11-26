<?php

namespace App\Http\Controllers;

use App\Item;
use App\User;
use App\Hours;
use App\Price;
use App\Option;
use App\Contact;
use App\Message;
use App\Category;
use App\Holidays;
use Carbon\Carbon;
use App\Preferences;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Hours $hours, Contact $contact, Category $categories, Item $items, Option $options, Price $prices)
    {
        $contact = Contact::first();
        $hours = Hours::orderBy('id')->get();
        $months = Preferences::where('key', 'holidays_display_months_ahead')->first();
        $first = Carbon::now();
		$second = Carbon::now()->addMonths($months->value);
        $holidays = Holidays::whereBetween('date', [$first, $second])->get();
        $disabled = Preferences::where('key', 'menu_status')->first();
        $message = Message::first();

        $categories = Category::all();
        $items = Item::all();
        $options = Option::all();
        $prices = Price::all();

        return view('layouts.main', compact(['contact', 'hours', 'holidays', 'categories', 'items', 'options', 'prices', 'disabled', 'message']));
    }
}
