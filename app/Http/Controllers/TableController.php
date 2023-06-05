<?php

namespace App\Http\Controllers;

use App\Models\Table;
// use App\Http\Requests\StoreTableRequest;
// use App\Http\Requests\UpdateTableRequest;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Table::all();
        return response()->json(["content" => $data], 200);
    }

    public function register(Register $request)
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = Table::create($input);
        // $success['token'] =  $user->createToken('MyApp')->accessToken;
        // $success['username'] =  $user->username;
        return response()->json(['success' => $user], 200);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function login(Login $request)
    {

        $input = $request->all();

        if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {

            $user = Auth::user();

            $token = $user->createToken('Token name')->accessToken;

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);

        // $input = $request->all();
        // if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
        //     $user = Auth::user();
        //     $token = $user->createToken('Token name')->accessToken;
        //     return response()->json(['token' => $token]);
        // }


        // $validator = Validator::make($request->all(), [
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        // ]); 

        // if ($validator->fails()) {
        //     return $this->sendError('Validation Error', $validator->errors());
        // }
    }



    /**
     * Store a newly created resource in storage.
     */
    public function createTable(HttpRequest $request)
    {
        $input = $request->all();
        $table = Table::create($input);
        return response()->json(['data' => $table], 200);
    }


    public function getId($id)
    {
        $tableDetail = Table::findOrFail($id);
        return response()->json($tableDetail, 200);
    }
    // return Table::findOr


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function updateTable(HttpRequest $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $data = Table::where('id', $id)->update($request->all());
        // echo "1111";
        return response()->json([$data], 200);

        // $table->username = $input['username'];
        // $table->password = $input['password'];
        // $table->email = $input['email'];
        // $table->save();
        // return response()->json([$table], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateTableRequest $request, Table $table)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return Table::where('id', $id)->delete();
    }
}
