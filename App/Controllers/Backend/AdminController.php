<?php

namespace App\Controllers\Backend;

use Core\Controller;
use App\Models\Admins;
use App\Models\Users;

class AdminController extends Controller
{
    public function IndexPage()
    {
        $data['user'][0] = ['ad' => 'Emirhan'];
        return $this->view("backend.default.index", compact('data'));
    }

    public function LoginPage()
    {
        return $this->view('backend.default.login');
    }

    public function ProductPage()
    {
        return $this->view('backend.product.index');
    }

    public function UserPage()
    {
        return $this->view('backend.user.index');
    }

    public function ProductAddPage()
    {
        return $this->view('backend.product.product-add');
    }

    public function AdminListPage()
    {
        return $this->view('backend.admin.index');
    }

    public function LoginForm()
    {
        $admins = Admins::where(['email' => $_POST['email']])->first();
        if ($admins) {
            $admins = $admins->toArray();
            if (passwordVerify($admins['password'] , $_POST['password'])) {
                auth()->create('adminAuth', [
                    "id" => $admins['id'],
                    'email' => $admins['email'],
                    'name' => $admins['name_surname']
                ]);
                header('Location:' . base_url('admin'));
                exit();
            } else {
                header('Location:' . base_url('admin/login?durum=hata&mesaj=E-posta veya şifre hatalı'));
                exit();
            }
        } else {

            header('Location:' . base_url('admin/login?durum=hata&mesaj=E-posta veya şifre hatalı'));
            exit();
        }
    }

    public function AddNewAdmin() {
        $email = $_POST['email'];
        $password = passwordHash($_POST['password']);
        $name_surname = $_POST['name_surname'];

       $add = Admins::create([
'email' => $email,
'password' => $password,
'name_surname' => $name_surname
        ]);

      $message = $add ? 'durum=basarili&mesaj=admin oluşturuldu' : 'durum=hata&mesaj=admin oluşturulamadı';
      header('Location:' . base_url('admin/yetkililer?' . $message));
      exit();
    }

    public function UpdateAdmin() {

        $updateData = [
            'email' => $_POST['email'],
            'name_surname' => $_POST['name_surname']
        ];

        if (isset($_POST['password'])) {
            $updateData['password'] = passwordHash($_POST['password']);
        }

        if (isset($_POST['id'])) {
            $update = Admins::where('id' , $_POST['id'])->update(
                $updateData
            );

            if ($update) {
                redirect('admin/kullanicilar' , true , 'Admin Bilgileri Güncellendi');
            }
            else {
                redirect('admin/kullanicilar' , false , 'İşlem Başarısız');
            }
        }
        else {
            redirect('admin/kullanicilar' , false , 'İşlem Başarısız');
        }
    }

    public function UpdateUser() {

        $updateData = [
            'name_surname' => $_POST['name_surname'],
            'birth_date' => $_POST['birth_date'],
            'status' => $_POST['status']
        ];

        if (isset($_POST['id'])) {
            $update = Users::where('id' , $_POST['id'])->update(
                $updateData
            );

            if ($update) {
                redirect('admin/kullanicilar' , true , 'Kullanıcı Güncellendi');
            }
            else {
                redirect('admin/kullanicilar' , false , 'İşlem Başarısız');
            }
        }
        else {
            redirect('admin/kullanicilar' , false , 'İşlem Başarısız');
        }
    }
}
