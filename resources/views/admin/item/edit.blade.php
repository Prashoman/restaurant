@extends('layouts.app')
@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Edit Item</h4>
              <p class="card-category">Complete This Item</p>
            </div>
            <div class="card-body">
              <form action="{{route('item.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Name</label>
                        <input type="text" name="name" value="{{$item->name}}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="bmd-label-floating">Category Name</label>
                        <select name="category_name" class="form-control" id="">
                            @foreach($categoris as $key=>$category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="bmd-label-floating">Price</label>
                              <input type="text" name="price" value="{{$item->price}}"           class="form-control">
                            </div>
                      </div>
                      <div class="col-md-6">
                        <img src="{{asset('uploads/item/'.$item->image)}}" alt="" style="height: 70px; width:150px;">
                          <label class="bmd-label-floating">Image</label>
                          <input type="file" name="image" class="form-control">

                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Description</label>
                            <textarea name="description" id="" class="form-control">{{$item->description}}</textarea>
                          </div>
                        </div>
                  </div>


                <button type="submit" class="btn btn-primary pull-right">Create</button>
                <a href="{{route('item.index')}}" class="btn btn-danger pull-right"> Back </a>
                <div class="clearfix"></div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection
