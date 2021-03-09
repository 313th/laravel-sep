<?php


namespace sahifedp\Sep\Controllers;

use App\Http\Controllers\Controller;
use Facuz\Theme\Facades\Theme;
use Illuminate\Http\Request;

class PayController extends Controller {
    /**
     * Display the registration view.
     * @param  \Illuminate\Http\Request  $request
     * @return Theme
     */
    public function create(Request $request) {
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  string $token
     * @return Theme
     *
     */
    public function submit($token) {
    }
}
