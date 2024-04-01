<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Subscription;

class SubscriptionController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::all();

        return view('subscription.index', compact('subscriptions'));
    }
    public function create()
    {
        return view('subscription.create');
    }

    public function subscription(Request $request)
    {
        return view('subscription.index', [
            'user' => $request->user(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validatedData)
        {
            $subscription = new Subscription();
            $subscription->name = $request->name;
            $subscription->description = $request->description;
            $subscription->price = $request->price;
            $subscription->start_date = $request->start_date;
            $subscription->end_date = $request->end_date;
            $subscription->save();
        }


        return redirect()->route('subscription.index')->with('success', 'Subscription created successfully!');
    }

    public function edit($id)
    {
        $subscription = Subscription::findOrFail($id);
        return view('subscription.edit', compact('subscription'));
    }

    public function update(Request $request,$id)
    {
        $subscription = Subscription::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        if ($validatedData)
        $subscription->update($validatedData);

        return redirect()->route('subscription.index')->with('success', 'Subscription updated successfully!');
    }

    public function destroy($id)
    {

        $subscription = Subscription::findOrFail($id);
        $subscription->delete();

        return redirect()->route('subscription.index')->with('success', 'Subscription deleted successfully!');
    }

    public function show($id)
    {
        $subscription = Subscription::find($id);
        return response()->json($subscription);
    }



}
