@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Category</h4>
              <p class="card-category">Complete This Category</p>
            </div>
            <div class="card-body">
              <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name</label>
                      <input type="text" name="name" value="{{$category->name}}" class="form-control">
                    </div>
                  </div>

                </div>

                <button type="submit" class="btn btn-primary pull-right">Create</button>
                <a href="{{route('category.index')}}" class="btn btn-danger pull-right"> Back </a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
