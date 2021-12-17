@extends('backend.admin.admin_master')
@section('content')

<div class="container">

    <div class="row-fluid sortable">

        <div class="box span12">


            {{-- @if(Session('cat_update'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{Session('cat_update')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span aria-hidden="true">&times;</span>
            </div>
            @endif --}}

                @php
                $message=Session::get('message');
                if($message){
                    echo "$message";
                    Session::put('message',null);
                }
               @endphp


            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">

                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                  <thead>
                      <tr>
                          <th>Image</th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Brand</th>
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Short Desc</th>
                          <th>Long Desc</th>
                          <th>Status</th>
                          <th style="text-align:center;">Actions</th>
                      </tr>
                  </thead>
                  <tbody>

                    @foreach ($products as $product)
                     <tr>
                        <td>
                            <img src="{{asset($product->image_one)}}" width="50px" height="50px" alt="">
                        </td>
                        <td>{{$product->product_name}}</td>
                        <td>{{$product->category->category_name}}</td>
                        <td>{{$product->brand->brand_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->product_quantity}}</td>
                        <td>{!! $product->short_description !!}</td>
                        <td>{!! $product->long_description !!}</td>

                        <td class="center">
                            @if ($product->status==1)
                            <span class="label label-success">Active</span>
                            @else
                            <span class="label label-danger">Deactive</span>
                            @endif

                        </td>
                        <td class="row">
                            <div class="span3"></div>
                            <div class="span2">
                                @if ($product->status==1)
                                <a class="btn btn-danger" href="{{url('/admin/products/deactive/'.$product->id)}}">Deactive|
                                    <i class="halflings-icon white thumbs-down"></i>
                                </a>
                                @else
                                <a class="btn btn-success" href="{{url('/admin/products/active/'.$product->id)}}">
                                   Active|
                                   <i class="halflings-icon white thumbs-up"></i>
                                </a>
                                @endif
                           </div>
                           <div class="span3"></div>
                                <div class="span2">
                                    <a class="btn btn-info" href="{{url('/admin/products/edit/'.$product->id)}}">
                                        <i class="halflings-icon white edit"></i>
                                    </a>
                                </div>
                                <div class="span2">
                                    <form action="{{url('/admin/products/delete/'.$product->id)}}">
                                        <button class="btn btn-danger">
                                            <i class="halflings-icon white trash"></i>
                                        </button>
                                    </form>
                                </div>
                            <div class="span3"></div>
                        </td>
                    </tr>
                    @endforeach

                  </tbody>
              </table>
            </div>
        </div><!--/span-->

    </div><!--/row--

  </div>

@endsection
