@extends('backend.admin.admin_master')
@section('content')


<h2>Create a new Brand</h2>
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


    <div class="row-fluid sortable">
    <div class="box span12">
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{route('brand.store')}}" method="post">
                @csrf

                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="date01">Brand Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="brand_name" @error('brand_name') is-invalid  @enderror required placeholder="brand name">
                        </div>
                    </div>
                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Brand</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

    </div>

@endsection
