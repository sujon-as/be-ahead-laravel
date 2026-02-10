<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth_check');
    }
    public function settings()
    {
        $setting = Setting::first();
        return view('admin.settings.settings',compact('setting'));
    }
    public function settingApp(Request $request)
    {
        try {
            $data = Setting::first();

            $defaults = [
                'site_name'      => $data ? $data->site_name : null,
                'address'        => $data ? $data->address : null,
                'welcome_msg'    => $data ? $data->welcome_msg : null,
                'email'          => $data ? $data->email : null,
                'phone'          => $data ? $data->phone : null,
                'footer_txt'     => $data ? $data->footer_txt : null,
                'copyright_mgs'  => $data ? $data->copyright_mgs : null,
                'facebook'       => $data ? $data->facebook : null,
                'rss_feed'       => $data ? $data->rss_feed : null,
                'google_plus'    => $data ? $data->google_plus : null,
                'pinterest'      => $data ? $data->pinterest : null,
                'instagram'      => $data ? $data->instagram : null,
                'logo'           => $data ? $data->logo : null,
                'fav_icon'       => $data ? $data->fav_icon : null,
            ];

            // File upload
            $logoPath = $defaults['logo'];
            if ($request->hasFile('logo')) {
                $logoPath = storeFile($request->file('logo'), 'logo', 'logo_');
            }

            $favIconPath = $defaults['fav_icon'];
            if ($request->hasFile('fav_icon')) {
                $favIconPath = storeFile($request->file('fav_icon'), 'fav_icon', 'favIcon_');
            }

            $payload = [
                'site_name'     => $request->site_name ?? $defaults['site_name'],
                'address'       => $request->address ?? $defaults['address'],
                'welcome_msg'   => $request->welcome_msg ?? $defaults['welcome_msg'],
                'email'         => $request->email ?? $defaults['email'],
                'phone'         => $request->phone ?? $defaults['phone'],
                'footer_txt'    => $request->footer_txt ?? $defaults['footer_txt'],
                'copyright_mgs' => $request->copyright_mgs ?? $defaults['copyright_mgs'],
                'facebook'      => $request->facebook ?? $defaults['facebook'],
                'rss_feed'      => $request->rss_feed ?? $defaults['rss_feed'],
                'google_plus'   => $request->google_plus ?? $defaults['google_plus'],
                'pinterest'     => $request->pinterest ?? $defaults['pinterest'],
                'instagram'     => $request->instagram ?? $defaults['instagram'],
                'logo'          => $logoPath,
                'fav_icon'      => $favIconPath,
            ];

            if ($data) {
                Setting::where('id', $data->id)->update($payload);
            } else {
                Setting::create($payload);
            }

            $notification = [
                'message' => 'Successfully updated',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);

        } catch (Exception $e) {

            Log::error('Error in updating settings: ', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'line' => $e->getLine()
            ]);

            $notification = [
                'message' => 'Something went wrong!!!',
                'alert-type' => 'error'
            ];

            return redirect()->back()->with($notification);
        }
    }
}
