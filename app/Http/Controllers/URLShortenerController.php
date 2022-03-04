<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Exception;
use Illuminate\Http\Request;

class URLShortenerController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function generate(Request $request)
    {
        $alphabet = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm1234567890";
        $token = '';
        while (strlen($token) < 6) {
            $token .= $alphabet[rand(0, strlen($alphabet) - 1)];
        }

        try {
            Link::create([
                'url' => $request->url,
                'short_token' => $token
            ]);
            return back()->with('token', $token);
        } catch (Exception $e) {
            return $this->generate($request);
        }
    }

    public function remote($token)
    {
        try {
            $url = Link::where('short_token', $token)->first()->url;
            return redirect()->away($url);
        } catch (Exception $e) {
            return response()->view('error', [], 404);
        }
    }
}
