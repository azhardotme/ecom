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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>

        </div>

        <div class="box-content">
            <form class="form-horizontal" action="{{route('update.brand')}}" method="post">
                @csrf

                <fieldset>
                    <input type="hidden" value="{{$brands->id}}" name="id">
                    <div class="control-group">
                        <label class="control-label" for="date01">Brand Name</label>
                        <div class="controls">
                            <input type="text" class="input-xlarge" name="brand_name" @error('brand_name') is-invalid  @enderror required value="{{$brands->brand_name}}">
                        </div>
                    </div>
                    @error('brand_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                    </div>
                </fieldset>
            </form>

        </div>
    </div><!--/span-->
    </div><!--/row-->
    </div><!--/row-->

    </div>

@endsection
