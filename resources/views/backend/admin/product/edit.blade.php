@extends('backend.admin.admin_master')
@section('content')
<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

        <p class="alert-success">
            @php
            $message=Session::get('message');
            if($message){
                echo "$message";
                Session::put('message',null);
            }
        @endphp
        </p>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Product</h2>

        </div>

        <div class="row">
            <form class="form-horizontal" action="{{route('update.product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$products->id}}" name="id">
                <fieldset>
                <div class="col-lg-6">
                    <div class="control-group">

                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_name" value="{{$products->product_name}}">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Code </label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_code" value="{{$products->product_code}}">
                        </div>
                    </div>
                </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="price" value="{{$products->price}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Product Quantity</label>
                        <div class="controls">
                            <input type="number" class="input-xlarge" name="product_quantity" required  value="{{$products->product_quantity}}">
                        </div>
                    </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Short Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="short_description" rows="2" >{{ $products->short_description }}</textarea>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Long Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="long_description" rows="3" required>{{$products->long_description}}</textarea>
                    </div>
                </div>

                    <div class="control-group">
                        <label class="control-label">Category</label>
                        <div class="controls">
                           <select name="category_id">
                               <option>Select Category</option>
                               @foreach ($categories as $category)
                               <option value="{{$category->id}}" {{$category->id == $products->category_id ? "selected":" "}}>{{$category->category_name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Brand</label>
                        <div class="controls">
                           <select name="brand_id">
                               <option>Select Brand</option>
                               @foreach ($brands as $brand)
                               <option value="{{$brand->id}}"  {{$brand->id == $products->brand_id ? "selected":" "}}>{{$brand->brand_name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>


                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Product Data</button>
                    </div>
                </fieldset>
            </form>

            <form action="{{route('update.image')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$products->id}}" name="id">
                <input type="hidden" value="{{$products->image_one}}" name="img_one">
                <input type="hidden" value="{{$products->image_two}}" name="img_two">
                <input type="hidden" value="{{$products->image_three}}" name="img_three">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Main THambnail </label>
                        <div class="controls">
                         <img src="{{asset($products->image_one)}}" alt="" height="200px" width="150px">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Main Thambnail </label>
                        <div class="controls">
                            <input type="file" class="input-xlarge" name="image_one">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Image 2 </label>
                        <div class="controls">
                            <img src="{{asset($products->image_two)}}" alt="" height="200px" width="150px">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Image 2 </label>
                        <div class="controls">
                            <input type="file" class="input-xlarge" name="image_two">
                        </div>
                    </div>


                    <div class="control-group">
                        <label class="control-label" for="date01">Image 3 </label>
                        <div class="controls">
                            <img src="{{asset($products->image_three)}}" alt="" height="200px" width="150px">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Image 3 </label>
                        <div class="controls">
                            <input type="file" class="input-xlarge" name="image_three">
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Product Image</button>
                    </div>

                </fieldset>
            </form>

        </div>
    </div><!--/row-->

@endsection
