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
              <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Name</label>
                      <input type="text" name="name" class="form-control">
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
