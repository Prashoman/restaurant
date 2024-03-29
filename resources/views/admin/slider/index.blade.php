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
            <a href="{{route('slider.create')}}" class="btn btn-primary">Add Slider</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Simple Table</h4>
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
                      Tittle
                    </th>
                    <th>
                      Sub_Tittle
                    </th>
                    <th>
                      Image
                    </th>
                    <th>
                      Active
                    </th>
                  </thead>
                  <tbody>
                      @foreach ($sliders as $key=>$slider )
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$slider->tittle}}</td>
                        <td>{{$slider->sub_tittle}}</td>
                        <td><img src="{{asset('uploads/slider/'.$slider->image)}}" alt="" style="height: 70px; width:150px;"></td>
                        <td>
                            <a href="{{route('slider.edit',$slider->id)}}" class="btn btn-primary">Edits</a>
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are sure dalate! this item.')){
                              event.preventDefault();
                              document.getElementById('delete-form {{$slider->id}}').submit();
                            }else{
                              event.preventDefault();
                            }"><i class="material-icons">delete</i></button>

                            <form id="delete-form {{$slider->id}}" action="{{route('slider.destroy',$slider->id)}}" method="POST">
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
