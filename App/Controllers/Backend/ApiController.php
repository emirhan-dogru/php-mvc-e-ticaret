<?php

namespace App\Controllers\Backend;

use Core\Controller;
use App\Models\Admins;
use App\Models\Users;

class ApiController extends Controller
{
    public function getByAdminId($id) {
        $admin = Admins::find($id);
        if ($admin) {
            response(
                [
                    'status' => true,
                    'message' => 'başarılı',
                    'data' => $admin
                ]
            );
        }
        else {
            response(
                [
                    'status' => false,
                    'message' => 'başarısız',
                    'data' => null
                ]
            ); 
        }
    }


    public function getByUserId($id) {
        $user = Users::find($id);
        if ($user) {
            response(
                [
                    'status' => true,
                    'message' => 'başarılı',
                    'data' => $user
                ]
            );
        }
        else {
            response(
                [
                    'status' => false,
                    'message' => 'başarısız',
                    'data' => null
                ]
            ); 
        }
    }
}
