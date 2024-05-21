<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Statement;
use Illuminate\Support\Facades\Auth;


class StatementController extends Controller
{
  public function showStatementForm()
  {
    return view('statement_form');
  }

  public function newStatement(Request $request)
  {
    $user = Auth::user();
    $request->merge([
      'user_fullname' => $user->fullname,
      'user_email' => $user->email,
      'user_tel' => $user->tel,
    ]);
    $this->validator($request->all())->validate();
    $this->create($request->all());
    
    return redirect()->route('home');
  }
  
  protected function validator(array $data)
  {
      // dd($data);
        return Validator::make($data, [
          'car_number' => ['required', 'string'],
          'description' => ['required', 'string'],
        ]);
    }
    
    protected function create(array $data)
    {
      return Statement::create([
        'user_fullname' => $data['user_fullname'],
        'user_email' => $data['user_email'],
        'user_tel' => $data['user_tel'],
        'car_number' => $data['car_number'],
        'description' => $data['description'],
        'status' => 'new',
      ]);
    }
    public function updateStatus(Request $request)
    {
      $statement = Statement::find($request['id']);
      $statement->status = $request['status'];
      $statement->save();
  
      return redirect()->route('home');
    }
    

}