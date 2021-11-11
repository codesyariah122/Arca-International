<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $employee = Employee::latest()->get();
        $employee = Employee::first()->get();

        try{
            return response()->json([
                'success' => true,
                'message' => 'Fetch employee data',
                'data' => $employee
            ], 200);
        }catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch',
                'data' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'honor' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->honor = $request->honor;
        $employee->save();
        // $employee = Employee::create([
        //     'name' => $request->get('name'),
        //     'honor' => $request->get('honor')
        // ]);

        if($employee){
            return response()->json([
                'success' => true,
                'message' => 'Success add employee data',
                'data' => $employee
            ], 201);
        }
        return response()->json([
            'success' => false,
            'message' => 'Failed add employee data'
        ], 401);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // join employees and projects table
        // $employee = Employee::findOrFail($id);
        $employee = Employee::join('projects', 'employees.id', '=', 'projects.employee_id')
                    ->where('employees.id', '=', $id)
                    ->get(['employees.*', 'projects.*']);

        // echo count($employee); die;

        try{
            if(count($employee) > 0){
                return response()->json([
                    'success' => true,
                    'message' => 'Show detail employee with Project',
                    'data' => $employee
                ], 201);
            }else{
                $employee = Employee::findOrFail($id);
                return response()->json([
                    'success' => true,
                    'message' => 'Show detail employee no Project',
                    'data' => $employee
                ], 201);
            }
        }catch(\Exception $e){
            return response()->json([
                'success' => false,
                'message' => 'Failed show detail data employee',
            ], 404);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'honor' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $employee = Employee::findOrFail($id);
        $employee->name = $request->name;
        $employee->honor = $request->honor;
        $employee->save();

        if($employee){
            return response()->json([
                'success' => true,
                'message' => 'Update data employee successfully',
                'data' => $employee
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'Data employee not found'
            ], 404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $employee = Employee::findOrFail($id);
        if($employee){
            $employee->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data employee has been delete'
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed delete employee data'
        ], 404);
    }


    public function projects(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'project_name' => 'required',
            'employee_id' => 'required',
            'payout' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }

        $employee_id = explode(',', $request->employee_id);

        for($i=0; $i<count($employee_id); $i++){
            $Project = new Project();
            $Project->project_name = $request->project_name;
            $Project->employee_id = $employee_id[$i];
            $Project->payout = $request->payout;
            $Project->percentage = floor(100 / count($employee_id));
            $Project->bonus = ($Project->percentage / 100) * $Project->payout;
            $Project->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Project has been created'
        ], 201);
    }

    public function add_teams()
    {
        $employee = Employee::join('projects', 'employees.id', '=', 'projects.employee_id')
                    ->get(['projects.*', 'employees.*']);

        // echo count($employee); die;
        if(count($employee) > 0){
            return response()->json([
                'success' => false,
                'message' => 'Telah mempunyai project'
            ]);
        }else{
            $add_team = Employee::all();
            return response()->json([
                'success' => true,
                'message' => 'Success fetch data team project',
                'data' => $add_team
            ]);
        }
    }

    public function detail_project($project_name)
    {
        $projects = Employee::join('projects', 'employees.id', '=', 'projects.employee_id')
                    ->where('projects.project_name', '=', $project_name)
                    ->get(['projects.*', 'employees.*']);
        return response()->json([
            'success' => true,
            'message' => 'Detail project',
            'data' => $projects
        ]);
    }

}
