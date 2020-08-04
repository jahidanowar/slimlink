<?php

namespace App\Http\Controllers;

use App\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Stevebauman\Location\Facades\Location;

class LinkController extends Controller
{


    public function short(Request $request)
    {
        $request->validate([
            'url' => 'required|url'
        ]);
        // dd($request->url);
        $url = $request->url;

        $data = [
            'destination' => $url,
            'short' =>  Str::random(6),
            'hits'  => 0,
            'user_id' => Auth::user()->id ? Auth::user()->id : null
        ];

        $link = Link::create($data);
        if ($link) {
            return redirect()->back()->with('message', config('app.url') . '/go/' . $link->short);
        }
        return redirect()->back()->with('message', 'Error');
    }

    public function redirect($id)
    {
        $destination_link = Link::where('short', $id)->first();

        if ($destination_link) {

            if ($destination_link->update([
                'hits' => $destination_link->hits + 1,
                'last_location' => json_encode(Location::get(), true)
            ])) {
                return redirect($destination_link->destination);
            }

            return "Error";
        }

        return "Not Found";
    }
}
