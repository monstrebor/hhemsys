<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserInfoRequest;
use App\Models\{UserInfo, User};
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());
        if (!$user->userInfo) {
            $user->setRelation('userInfo', new UserInfo());
        }
        return view('profile.index', compact('user'));
    }

    public function infoCreateOrUpdate(UserInfoRequest $request)
    {
        try {
            $validated = $request->validated();
            if (isset($validated['middle_name']) && in_array(strtolower($validated['middle_name']), ['n/a', 'none'])) {
                $validated['middle_name'] = null;
            }
            $userInfo = UserInfo::where('user_id', auth()->id())->first();
            if ($request->hasFile('image')) {
                $imageName = (string) Str::uuid() . '.' . $request->image->extension();
                $request->image->move(public_path('image/profile'), $imageName);
                $validated['image'] = $imageName;
            }
            UserInfo::updateOrCreate(
                ['user_id' => auth()->id()],
                [
                    'user_id' => $validated['user_id'],
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'middle_name' => $validated['middle_name'],
                    'date_of_birth' => $validated['date_of_birth'],
                    'phone_number' => $validated['phone_number'],
                    'street' => $validated['street'],
                    'city' => $validated['city'],
                    'province' => $validated['province'],
                    'image' => $validated['image'] ?? ($userInfo->image ?? null),
                ]
            );
            return redirect()->back()->with('success', 'User info has been saved successfully!');
        } catch (\Exception $e) {
            \Log::error('User info save failed: ' . $e->getMessage(), [
                'user_id' => auth()->id(),
                'request_data' => $request->all()
            ]);
            return redirect()->back()->with('error', 'An unexpected error occurred while saving user info.');
        }
    }
}
