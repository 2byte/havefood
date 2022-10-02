<?php

namespace App\Http\Controllers\Admin\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\AdminBaseController;
use App\Http\Resources\BaseApiCollection;
use App\Models\User;

class AdminApiUserController extends AdminBaseController
{
  public function list(Request $request) 
  {
    
    $users = User::getList();
    
    return new BaseApiCollection($users);
  }

}