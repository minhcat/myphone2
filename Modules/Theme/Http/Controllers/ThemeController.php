<?php

namespace Modules\Theme\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Theme\Repositories\ThemeRepository;
use Modules\Theme\Repositories\ThemeSettingRepository;

class ThemeController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Theme\Repositories\ThemeRepository */
    protected $themeRepository;

    /** @var \Modules\Theme\Repositories\ThemeSettingRepository */
    protected $themeSettingRepository;

    /**
     * Create a new tag controller instance.
     */
    public function __construct()
    {
        $this->themeRepository = new ThemeRepository();
        $this->themeSettingRepository = new ThemeSettingRepository();

        view()->share('menu', ['group' => 'theme', 'active' => 'themes']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $themes = $this->themeRepository->all();

        return view('theme::index', compact('themes'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function setting($id)
    {
        $setting = $this->themeRepository->find($id)->setting;
        $theme_id = $id;

        return view('theme::setting', compact('setting', 'theme_id'));
    }
    
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateSetting(Request $request, $id)
    {
        $this->themeSettingRepository->update($id, $request->all());

        return redirect()->route('admin.theme.setting', $id)->with('success', __('notification.update.success', ['model' => 'Theme Setting']));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'is_active'     => 'required'
        ]);
        // dd($request->all());

        $this->themeRepository->update($id, $request->only('is_active'));

        return redirect()->route('admin.theme.index')->with('success', __('notification.update.success', ['model' => 'Theme']));
    }
}
