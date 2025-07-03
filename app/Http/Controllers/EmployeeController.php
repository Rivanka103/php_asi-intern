<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
{
    $data = $request->all();

    // Upload ke S3
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('uploads', 'public');
        $data['photo_upload_path'] = '/storage/' . $path;

    }

    $employee = Employee::create($data);

    // Simpan ke Redis
    $redisKey = 'emp_' . $employee->nomor;
    Redis::set($redisKey, $employee->toJson());

    return response()->json($employee);
}


    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
{
    $employee = Employee::findOrFail($id);
    $employee->update($request->all());

    $redisKey = 'emp_' . $employee->nomor;
    Redis::set($redisKey, $employee->toJson());

    return response()->json($employee);
}


    public function destroy($id)
{
    $employee = Employee::findOrFail($id);

    $redisKey = 'emp_' . $employee->nomor;
    Redis::del($redisKey);

    $employee->delete();

    return response()->json(['message' => 'Deleted']);
}

}
