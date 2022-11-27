<?php

namespace App\Controllers\Backend;

use Core\Controller;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function IndexPage()
    {
        $data = Categories::get();
        return $this->view("backend.category.index", compact('data'));
    }

    public function addCategory()
    {
        $saveProduct = [
            "title" => $_POST["category_name"],
            "slug" => slug($_POST["category_name"])
        ];

        $add = Categories::create( $saveProduct );

        $message = $add ? 'durum=basarili&mesaj=category created' : 'durum=hata&mesaj=Failed to create category';
      header('Location:' . base_url('admin/kategoriler?' . $message));
      exit();
    }

    public function deleteCategory($id = null) 
    {
        if ($id != null) {
            $delete = Categories::find($id)->delete();
        }
        else {
            $delete = false;
        }
        
        $message = $delete ? 'durum=basarili&mesaj=category deleted' : 'durum=hata&mesaj=Failed to deleted category';
        header('Location:' . base_url('admin/kategoriler?' . $message));
        exit();
    }
    
}
