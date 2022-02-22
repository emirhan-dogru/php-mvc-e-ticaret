@extends('backend.layout')

@section( "content" )

<!-- Begin Page Content -->
<div class="container-fluid">

                <div class="bg-white p-4 border rounded shadow">
                        <form action="{{base_url("admin/product-add")}}" method="POST"  enctype="multipart/form-data"  class="row" >

                                <div class="form-group col-md-12">
                                        <label>Ürün Adı</label>
                                        <input type="text" class="form-control" placeholder="Ürün Adı" required name="product_name" >
                                </div>

                                <div class="form-group col-md-6">
                                        <label>Ürün Fiyatı</label>
                                        <input type="number" value="0" step="0.01" min="0" max="999999" class="form-control" placeholder="Ürün Fiyatı" required name="product_price" >
                                </div>

                                <div class="form-group col-md-6">
                                        <label>Ürünün İndirimli Fiyatı  <small>İndirim yoksa (0) yazınız</small> </label>
                                        <input type="number" value="0" step="0.01" min="0" max="999999" class="form-control" placeholder="Ürün Fiyatı" required name="product_sale_price" >
                                </div>

                                <div class="form-group col-md-6">
                                        <label>Ürün Stok Sayısı</label>
                                        <input type="number" value="0" step="1" min="0" max="999999" class="form-control" placeholder="Ürün Stok Sayısı" required name="product_stock" >
                                </div>

                                <div class="form-group col-md-6">
                                        <label>Kategoriler</label>
                                       <select name="product_categories[]" class="form-control"  multiple required>
                                               @foreach(App\Models\Categories::where('status' , 1)->get() as $category )
                                                     <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                       </select>
                                </div>

                                <div class="form-group col-md-12">
                                        <label>Ürün Resimleri</label>
                                        <div class="row" id="imgSort">
                                                <div class="col-md-2 p-2">
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <div class="dragItem">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                </div>
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[1]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>

                                                <div class="col-md-2 p-2">
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <div class="dragItem">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                </div>
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[2]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>

                                                <div class="col-md-2 p-2">
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <div class="dragItem">
                                                                        <i class="fas fa-arrows-alt"></i>
                                                                </div>
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[3]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>

                                                <div class="col-md-2 p-2">
                                                        <div class="dragItem">
                                                                <i class="fas fa-arrows-alt"></i>
                                                        </div>
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[4]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>

                                                <div class="col-md-2 p-2">
                                                        <div class="dragItem">
                                                                <i class="fas fa-arrows-alt"></i>
                                                        </div>
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[5]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>
                                                
                                                <div class="col-md-2 p-2">
                                                        <div class="dragItem">
                                                                <i class="fas fa-arrows-alt"></i>
                                                        </div>
                                                        <div class="border rounded p-2 bg-light imageAddItem" style="height: 150px">
                                                                <input type="file" class="form-control imgInput" accept="image/*" name="product_images[6]">
                                                                <img src="https://icon-library.com/images/upload-image-icon-png/upload-image-icon-png-10.jpg" height="100%" width="100%" alt="">
                                                        </div>
                                                </div>
                                        </div>
                                </div>

                                
                                <div class="form-group col-md-12">
                                        <label>Ürün Açıklaması</label>
                                        <textarea name="product_description" placeholder="Ürün Açıklaması" class="form-control" rows="5"></textarea>
                                </div>
                                <div class="col-md-12">
                                        <div class="row" id="variants_area"></div>        
                                </div>

<div class="col-md-12">
        <button class="btn btn-dark mb-3" type="button" id="btnAddVariant">Varyant Ekle</button>
</div>


                                




                                <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>




                        </form>
                </div>


</div>
<!-- /.container-fluid -->

@endsection

@push('css')
 <style>
         .variantAddBtn {
                 position: absolute;
                 right: 0;
                 top: 0;
                 z-index: 9999;
         }

         .imageAddItem {
                position: relative;

         }

         .imageAddItem input {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                width: 100%;
                height: 100%;
                opacity: 0;
                z-index: 100;
                cursor: pointer;
         }

         .dragItem {
                 position: absolute;
                 z-index: 999;
                 right: 0;
                 top: 0;
                 cursor: move;
                 width: 30px;
                 height: 30px;
                 background: #fff;
                 border: 1px solid #ccc;
                 border-radius: 5px;
                 display: flex;
                 align-items: center;
                 justify-content: center;
         }

 </style>
@endpush

@push('js')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
            let variantCount = 1;

            $('#btnAddVariant').click(function(){

                let variantInput = ` <div class="form-group col-md-3">
                                                        <label>Varyant Değeri</label>
                                                        <input type="text" placeholder="Varyant Değeri" class="form-control" name="product_variant_value[values_${variantCount}][]" >
                                                </div>`;

                let html = `<div class="col-md-12 p-2 border bg-light rounded mb-4">
                                        <div class="row">
                                                <div class="form-group col-md-12">
                                                        <label>Varyant Adı</label>
                                                        <input type="text" placeholder="Varyant Adı" class="form-control" name="product_variant_name[names_${variantCount}]" >
                                                </div>

                                               <div class="col-md-12">
                                                <div class="row variantItemArea" data-count="${variantCount}">
                                                ${variantInput} 
                                                <button class="btn btn-primary btn-sm variantAddBtn" type="button"> Yeni Ekle</button>
                                                </div>
                                               </div>
                                        </div>
                                </div>`;


                $('#variants_area').append(html);

                $('.variantItemArea').on('click' , '.variantAddBtn' , function(){
                    //$(this).parent().append(variantInput);
                    const count = $(this).parent().data('count');
                    const div = document.createElement('div');
                    div.innerHTML = variantInput;
                    $(div).find('input').attr('name' , `product_variant_value[values_${count}][]`);
                   $(this).parent().append(div.innerHTML);
                
                    
                    
                });
           variantCount++;
            });

            $('.imgInput').on('change' , function(){
                    const input = this;
                const file = $(input).prop('files')[0];

                const reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                        console.log(reader.result);
                        $(input).next().attr('src' , reader.result);
                }
            });

            $('#imgSort').sortable({
                    placeholder : 'col-md-2 bg-light border rounded p-2',
                    update: function(event, ui) {
                        $('#imgSort .col-md-2').each(function(index , element){
                                $(element).find('input[type="file"]').attr('name' , `product_images[${index + 1}]`);
                        });
                    }
            });


    </script>
@endpush