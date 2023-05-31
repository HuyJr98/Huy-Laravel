<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\Register;
use App\Http\Requests\Login;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Validator;

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
    

                    // return response()->json(['token' => $input], 200);
        // $validator = Validator::make($input,[
        //     'username' => 'required',
        //     'password' => 'required',
        // ]);
        // if($validator->failed()){
        //     return response() -> json(['error'=> $validator-> errors()->all()], 422);

        // }
        $input = $request->all();
        echo "1111";
        echo $input['username'];
        echo "000";
        echo $input['password'];

         if (Auth::attempt(['username' => $input['username'], 'password' => $input['password']])) {
            echo "222";
            $user = Auth::user();
            echo "3333";
            $token = $user->createToken('Token name')->accessToken;
            echo "444";
            return response()->json(['token' => $token]);
        }

        
        // if (Auth::attempt($credentials)) {
        //     $user = Auth::user();
        //     $token = $user->createToken('authToken')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // }
        echo "555";
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
    // public function store(StoreTableRequest $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
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
    public function destroy(Table $table)
    {
        //
    }
}
