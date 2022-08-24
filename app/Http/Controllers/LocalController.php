<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LocalController extends Controller
{
    //
    public function authenticationBoss(Request $request)
    {
      $user = User::whereRole('boss')->first();
      
      if (is_null($user)) {
        $user = User::factory()->create(['role' => 'boss']);
      }
      
      Auth::login($user);
      
      return responseApi()->success();
    }
}
