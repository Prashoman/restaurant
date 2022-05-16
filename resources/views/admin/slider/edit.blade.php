@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Slider</h4>
              <p class="card-category">Complete This Slider</p>
            </div>
            <div class="card-body">
              <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tittle</label>
                      <input type="text" name="tittle" value="{{$slider->tittle}}" class="form-control">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Sub Tittle</label>
                      <input type="text" name="sub_tittle" value="{{$slider->sub_tittle}}" class="form-control">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                      <img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" style="height: 70px; width:150px;">
                      <label class="bmd-label-floating">Image</label>
                      <input type="file" name="image" class="form-control">

                  </div>
                </div>


                <button type="submit" class="btn btn-primary pull-right">Create</button>
                <a href="{{route('slider.index')}}" class="btn btn-danger pull-right"> Back </a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
