@extends('layouts.app')



@section('content')

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <a href="" class="btn btn-primary">All Reservation</a>
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title ">Reservation Table</h4>
              <p class="card-category"> Here is a Item for this table</p>
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
                      Email
                    </th>
                    <th>
                      Phone
                    </th>
                    <th>
                        TimeDate
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                       Massage
                    </th>
                    <th>
                      Active
                    </th>
                  </thead>
                  <tbody>
                      @foreach ($reservs as $key=>$reserve )
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$reserve->name}}</td>
                        <td>{{$reserve->email}}</td>
                        <td>{{$reserve->phone}}</td>
                        <td>{{$reserve->datetime}}</td>


                        <td>
                            @if($reserve->status == 0)
                            Please Confrim Reservation
                            @else
                            Bocking Done.
                            @endif
                        </td>


                        <td>{{$reserve->listing}}</td>
                        <td>

                            <a href="{{ route('eamil',$reserve->id )}}" class="btn btn-success">Sent</a>
                            <button class="btn btn-danger" type="button" onclick="if(confirm('Are sure dalate! this item.')){
                                event.preventDefault();
                                document.getElementById('delete-form {{$reserve->id}}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="material-icons">delete</i></button>

                              <form id="delete-form {{$reserve->id}}" action="{{route('reserve.destroy',$reserve->id)}}" method="POST">
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

