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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>

        </div>

        <div class="row">
            <form class="form-horizontal" action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <fieldset>
                <div class="col-lg-6">
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_name" value="{{old('product_name')}}" placeholder="product name">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="control-group">
                        <label class="control-label" for="date01">Product Code </label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="product_code" value="{{old('product_code')}}" required placeholder="product code">
                        </div>
                    </div>
                </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Price</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="price" value="{{old('price')}}" required placeholder="product price">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Product Quantity</label>
                        <div class="controls">
                            <input type="number" class="input-xlarge" name="product_quantity" required placeholder="quantity">
                        </div>
                    </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Short Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="short_description" rows="2" required></textarea>
                    </div>
                </div>


                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Long Description</label>
                    <div class="controls">
                        <textarea class="cleditor" name="long_description" rows="3" required></textarea>
                    </div>
                </div>

                    <div class="control-group">
                        <label class="control-label">Category</label>
                        <div class="controls">
                           <select name="category_id">
                               <option>Select Category</option>
                               @foreach ($categories as $category)
                               <option value="{{$category->id}}">{{$category->category_name}}</option>
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
                               <option value="{{$brand->id}}">{{$brand->brand_name}}</option>
                               @endforeach
                           </select>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date01">Image 1 </label>
                        <div class="controls">
                            <input type="file" class="input-xlarge" name="image_one">
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
                            <input type="file" class="input-xlarge" name="image_three">
                        </div>
                    </div>


                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/row-->

@endsection
