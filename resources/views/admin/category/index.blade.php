@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="{{route('category.create')}}" class="btn btn-primary">Add Slider</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Category Table</h4>
              <p class="card-category"> Here is a subtitle for this table</p>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="slider" class="table table-striped table-bordered" style="width:100%">
                  <thead class=" text-primary">
                    <th>
                      Sl
                    </th>
                    <th>
                      Name
                    </th>
                    <th>
                      Slug
                    </th>
                    <th>
                      Active
                    </th>
                  </thead>
                  <tbody>
                      @foreach ($categoris as $key=>$category )
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->name}}</td>
                        <td>{{$category->slug}}</td>
                        <td>
                            <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary">Edits</a>
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are sure dalate! this item.')){
                              event.preventDefault();
                              document.getElementById('delete-form {{$category->id}}').submit();
                            }else{
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></button>

                            <form id="delete-form {{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                            </form>
                        </td>
                    </tr>
                      @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#slider').DataTable();
        } );
    </script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
@endpush
