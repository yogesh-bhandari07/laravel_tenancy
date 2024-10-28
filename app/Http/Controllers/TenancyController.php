<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Stancl\Tenancy\UUIDGenerator;
use Throwable;

class TenancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $log = [
            'file' => __FILE__,
            'line' => __LINE__,
            'function' => __FUNCTION__,
            'msg' => "Tenancy Controller index",
            'data' => [],
            'LOG_CODE' => 'TC001'
        ];
        Log::info($log);
        return view('tenancy.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $log = [
            'file' => __FILE__,
            'line' => __LINE__,
            'function' => __FUNCTION__,
            'msg' => "Tenancy Controller create",
            'data' => [],
            'LOG_CODE' => 'TC002'
        ];
        Log::info($log);
        return view('tenancy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {


            $log = [
                'file' => __FILE__,
                'line' => __LINE__,
                'function' => __FUNCTION__,
                'msg' => "Tenancy Controller store",
                'data' => $request->all(),
                'LOG_CODE' => 'TC003'
            ];
            Log::info($log);

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'domains' => [
                    'required',
                    'regex:/^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?)(,[a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?)*$/'
                ],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:8'],
                'confirm_password' => ['required', 'same:password'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }




            $tenant = Tenant::create([
                'id' => UUIDGenerator::generate($request->name),
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'logo' => null,
                'active' => $request->has('active') ? 1 : 0,
            ]);

            $domains = explode(',', $request->domains);

            foreach ($domains as $domain) {
                $tenant->domains()->create([
                    'domain' => env('APP_DOMAIN', '') . $domain,
                ]);
            }

            return redirect()->route('tenant.index');
        } catch (Throwable $e) {
            $log = [
                'file' => __FILE__,
                'line' => __LINE__,
                'function' => __FUNCTION__,
                'msg' => $e->getMessage(),
                'data' => [],
                'LOG_CODE' => 'TC004',
            ];
            Log::info($log);
            return redirect()->route('tenant.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
