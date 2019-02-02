<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class ModeratorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:read_users'])->only('index');
        $this->middleware(['permission:create_users'])->only('create');
        $this->middleware(['permission:update_users'])->only('edit');
        $this->middleware(['permission:delete_users'])->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $moderator = User::whereRoleIs('employer')
            ->when($request->search, function ($query) use ($request) {
                return $query
                    ->where('first_name', 'like', '%' . $request->search . '%')
                    ->orwhere(
                        'last_name',
                        'like',
                        '%' . $request->search . '%'
                    );
            })
            ->latest()
            ->paginate(5);
        return view('dashboard.moderator.index', compact('moderator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.moderator.create', compact('moderator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed'
        ]);
        $request_data = $request->except([
            'password',
            'password_confirmation',
            'permissions'
        ]);
        $request_data['password'] = bcrypt($request->password);
        $moderator = User::create($request_data);
        $moderator->attachRole('employer');
        $moderator->syncPermissions($request->permissions);
        //Toastr::success('created successfully');
        toast('Created Successfully', 'success', 'top-right');
        return redirect()->route('moderator.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $moderator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $moderator)
    {
        return view('dashboard.moderator.edit', compact('moderator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $moderator)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required'
        ]);
        $request_data = $request->except(['permissions']);
        $moderator->update($request_data);
        $moderator->syncPermissions($request->permissions);
        toast('Updated Successfully', 'success', 'top-right');
        return redirect()->route('moderator.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $moderator)
    {
        //$moderator->delete();
        /*Alert::success('Moderator deleted successfully', 'Success')->persistent(
            "Close"
        );*/

        $moderator->delete();
        toast('deleted Successfully', 'error', 'top-right');
        return redirect()->route('moderator.index');
    }
}
