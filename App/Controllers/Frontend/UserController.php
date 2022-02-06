<?php


namespace App\Controllers\Frontend;

use App\Models\Users;
use Core\Auth;
use Core\Controller;

class UserController extends Controller
{
    //kullanıcı kayıt
    public function addUser()
    {
        if ($_POST['passwordone'] == $_POST['passwordtwo']) {
            $_POST['password'] = passwordHash($_POST['passwordone']);
            $_POST['question_answer'] = passwordHash($_POST['question_answer']);

            $add = Users::create($_POST);

            if ($add) {
                Auth()->create('userLogin' , [
                    'id' => $add->id,
                    'name' => $_POST['name_surname'],
                    'email' => $_POST['email']
                ]);
                header('Location:' . base_url('hesabim?durum=basarili&mesaj=Hesabınız oluşturuldu'));
            } else {
                header('Location:' . base_url('giris-yap?durum=hata&mesaj=Kayıt oluşurken bir hata oluştu'));
            }
        } else {
            header('Location:' . base_url('giris-yap?durum=hata&mesaj=Şifreler eşleşmiyor'));
            exit;
        }
    }

    public function loginUser()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = Users::where(['email' => $email , 'status' => 1])->first();

        if ($user) {
            $user = $user->toArray();
            if (passwordVerify($user['password'] , $password)) {
Auth()->create('userLogin' , [
    'id' => $user['id'],
    'name' => $user['name_surname'],
    'email' => $user['email']
]);
                header('Location:' . base_url('hesabim'));
            }
            else {
                header('Location:' . base_url('giris-yap?durum=hata&mesaj=Lütfen bilgilerinizi kontrol edin'));
            }
        }
        else {
           header('Location:' . base_url('giris-yap?durum=hata&mesaj=Lütfen bilgilerinizi kontrol edin'));
        }
    }
}
