<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Traits\RedirectTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use RedirectTrait;

    protected $page = 'admin';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Admin::admin()->get();

        return view('pages.admin.wrapper', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Admin::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nivel_id' => 1
        ]);

        return $this->redirectIndex($this->page);
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        if($request->has('nombre')){
            $admin->nombre = $request->nombre;
        }

        if($request->has('email')){
            $admin->email = $request->email;
        }

        if($request->has('password') && !empty($request->password)){
            $admin->password = Hash::make($request->password);
        }

        if (!$admin->isDirty()) {
            // return $this->redirectDirty($admin);
        }

        $admin->save();

        return $this->redirectIndex($this->page);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        $admin->delete();

        return $this->redirectIndex($this->page);
    }
}
