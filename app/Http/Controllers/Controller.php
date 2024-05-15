<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function autorisation($role, $controller){
        $droits = $role->droits;
        foreach ($droits as $droit) {
            if ($droit->route == $controller && $droit->access == 1){
                    $auth = 'true';
            } else {
                continue;
            }
          }
          if(isset($auth)) {
            $autoriser = 'true';
          }else {
            $autoriser = 'false';
          }
          return $autoriser;
    }
}
