<?php

namespace Modules\Dashboard\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        try {
            $this->authorize('dashboard:browse');
    
            return view('dashboard::index');
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse dashboard']));
        }
    }
}
