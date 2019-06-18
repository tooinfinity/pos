<?php

namespace App\Http\Controllers\Dashboard;

use App\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class GeneralSettingController extends Controller
{
    public function index(Request $request)
    {
        $general_settings = DB::table('general_settings')->where('id', 1)->get();
        // dd($general_settings);
        return view('dashboard.settings.index', compact('general_settings'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'store_name' => 'required',
            'start_day' => 'required',
            'image' => 'image',
        ]);

        $general_setting = GeneralSetting::findOrFail($id);
        $general_setting->store_name = $request->input('store_name');
        $general_setting->start_day = $request->input('start_day');

        if ($request->image) {
            if ($general_setting->image == 'logo_default.png') {
                Storage::disk('public_uploads')->delete(
                    '/settings/' . $general_setting->image
                );
            }
            Image::make($request->image)
                ->resize(160, 160, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(
                    public_path(
                        'uploads/settings/' .
                            $request->image->hashName()
                    )
                );
            $general_setting['image'] = $request->image->hashName();
        }

        $general_setting->save();
    }
}