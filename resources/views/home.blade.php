@extends('layouts.master')
@section('styles')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<style>
   .box{
   display: none;
   }
</style>
@endsection
@section('content')
<div class="container-fluid">
   <div class="row justify-content-center">
      <!-- left column -->

      @if($user)
      <div class="col-md-12">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Add User</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
               <form method="POST" action="{{ route($route) }}">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputName">Name</label>
                           <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputAddress">Address</label>
                           <textarea name="address" class="form-control" rows="1"> </textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputPhone">Phone Number</label>
                           <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputYear">Year</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Choose Month</label>
                           <select class="form-control select2bs4" name="month" style="width: 100%;">
                              <option>Select Month</option>
                              <option value="january">January</option>
                              <option value="february">February</option>
                              <option value="march">March</option>
                              <option value="april">April</option>
                              <option value="may">May</option>
                              <option value="june">June</option>
                              <option value="july">July</option>
                              <option value="august">August</option>
                              <option value="september">September</option>
                              <option value="october">October</option>
                              <option value="november">November</option>
                              <option value="december">December</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputAmount">Amount</label>
                           <input type="text" name="january" class="form-control box january" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="february" class="form-control box february" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="march" class="form-control box march" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="april" class="form-control box april" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="may" class="form-control box may" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="june" class="form-control box june" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="july" class="form-control box july" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="august" class="form-control box august" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="september" class="form-control box september" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="october" class="form-control box october" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="november" class="form-control box november" id="exampleInputAmount" placeholder="Enter amount">
                           <input type="text" name="december" class="form-control box december" id="exampleInputAmount" placeholder="Enter amount">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.card -->
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">All Users Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Year</th>
                        <th>January</th>
                        <th>February</th>
                        <th>March</th>
                        <th>April</th>
                        <th>May</th>
                        <th>June</th>
                        <th >July</th>
                        <th>August</th>
                        <th>September</th>
                        <th>October</th>
                        <th>November</th>
                        <th>December</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     @foreach($dusers as $user)
                     <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->year }}</td>
                        <td>
                           @if(!empty($user->january))
                           {{ $user->january }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->february))
                           {{ $user->february }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->march))
                           {{ $user->march }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td> 
                           @if(!empty($user->april))
                           {{ $user->april }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->may))
                           {{ $user->may }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->june))
                           {{ $user->june }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->july))
                           {{ $user->july }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->august))
                           {{ $user->august }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->september))
                           {{ $user->september }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->october))
                           {{ $user->october }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->november))
                           {{ $user->november }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->december))
                           {{ $user->december }}৳
                           @else
                           <span class="badge badge-danger">Dues</span>
                           @endif
                        </td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->updated_at))}}</td>
                        <td>
                           <a href="{{route($droute,$user->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($eroute,$user->id)}}" class="btn btn-primary" data-toggle="modal"  data-target="#modal-xl{{ $user->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="modal-xl{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                              <div class="modal-header bg-primary">
                                 <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <!-- form start -->
                              <div class="card-body">
                                 <form method="POST" action="{{ route($uroute,$user->id)}}">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAddress">Address</label>
                                             <textarea name="address" class="form-control" rows="1">{{$user->address}} </textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputPhone">Phone Number</label>
                                             <input  type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputYear">Year</label>
                                             <input type="text" name="year" value="{{$user->year}}" class="form-control" id="exampleInputYear" placeholder="Enter year">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">January</label>
                                             <input type="text" name="january" class="form-control january" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->january}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">February</label>
                                             <input type="text" name="february" class="form-control february" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->february}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">March</label>
                                             <input type="text" name="march" class="form-control march" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->march}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">April</label>
                                             <input type="text" name="april" class="form-control april" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->april}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">May</label>
                                             <input type="text" name="may" class="form-control may" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->may}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">June</label>
                                             <input type="text" name="june" class="form-control june" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->june}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">July</label>
                                             <input type="text" name="july" class="form-control july" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->july}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">August</label>
                                             <input type="text" name="august" class="form-control august" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->august}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">September</label>
                                             <input type="text" name="september" class="form-control september" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->september}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">October</label>
                                             <input type="text" name="october" class="form-control october" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->october}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">November</label>
                                             <input type="text" name="november" class="form-control november" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->november}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">December</label>
                                             <input type="text" name="december" class="form-control december" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->december}}">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
            </div>
            @endforeach
            </tbody>
            <tfoot class="text-center">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Year</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th >July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
            </tr>
            </tfoot>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
































@else

      <div class="col-md-12">
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Add Invesment</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
               <form method="POST" action="{{ route($aroute) }}">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputName">Name</label>
                           <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputAddress">Address <span class="text-red">(Optional)</span></label>
                           <textarea name="address" class="form-control" rows="1"> </textarea>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputPhone">Phone Number <span class="text-red">(Optional)</span></label>
                           <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputYear">Invest Amount</label>
                           <input type="text" name="amount" class="form-control" id="exampleInputYear" placeholder="Enter amount">
                        </div>
                     </div>

                        <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputAddress">Invest Purpose <span class="text-red">(Optional)</span></label>
                           <textarea name="purpose" class="form-control" rows="1"> </textarea>
                        </div>
                     </div>
                    
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
         <!-- /.card -->
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">All Investments Data</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Invest Amount</th>
                        <th>January</th>
                        <th>February</th>
                        <th>March</th>
                        <th>April</th>
                        <th>May</th>
                        <th>June</th>
                        <th >July</th>
                        <th>August</th>
                        <th>September</th>
                        <th>October</th>
                        <th>November</th>
                        <th>December</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     @foreach($iusers as $user)
                     <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->amount }}</td>
                        <td>
                           @if(!empty($user->january))
                           {{ $user->january }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->february))
                           {{ $user->february }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->march))
                           {{ $user->march }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td> 
                           @if(!empty($user->april))
                           {{ $user->april }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->may))
                           {{ $user->may }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->june))
                           {{ $user->june }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->july))
                           {{ $user->july }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->august))
                           {{ $user->august }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->september))
                           {{ $user->september }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->october))
                           {{ $user->october }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->november))
                           {{ $user->november }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>
                           @if(!empty($user->december))
                           {{ $user->december }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->updated_at))}}</td>
                        <td>
                           <a href="{{route($dlroute,$user->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($edroute,$user->id)}}" class="btn btn-primary" data-toggle="modal"  data-target="#modal-xl{{ $user->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="modal-xl{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                           <div class="modal-content">
                              <div class="modal-header bg-primary">
                                 <h5 class="modal-title" id="exampleModalLabel">Edit Invest Amount</h5>
                                 <h5 class="modal-title ml-5">
                                    @php

                                    $totalinvest = $user->amount;

                                    $totalgain= $user->january + $user->february + $user->march + $user->april + $user->may + $user->june + $user->july + $user->august + $user->september + $user->october + $user->november + $user->december; 

                                    $totalprofit = $totalgain - $totalinvest;



                                    @endphp

                                    @if($totalinvest < $totalgain)

                                    Total Profite <span class="badge badge-success">{{$totalprofit}}৳</span>

                                    @else

                                     Unpaid <span class="badge badge-danger">{{$totalprofit}}৳</span>

                                     @endif





                                 </h5>
                                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <!-- form start -->
                              <div class="card-body">
                                 <form method="POST" action="{{ route($uproute,$user->id)}}">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAddress">Address</label>
                                             <textarea name="address" class="form-control" rows="1">{{$user->address}} </textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputPhone">Phone Number</label>
                                             <input  type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputYear">Invest Amount</label>
                                             <input type="text" name="amount" value="{{$user->amount}}" class="form-control" id="exampleInputYear" placeholder="Enter amount">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">January</label>
                                             <input type="text" name="january" class="form-control january" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->january}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">February</label>
                                             <input type="text" name="february" class="form-control february" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->february}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">March</label>
                                             <input type="text" name="march" class="form-control march" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->march}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">April</label>
                                             <input type="text" name="april" class="form-control april" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->april}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">May</label>
                                             <input type="text" name="may" class="form-control may" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->may}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">June</label>
                                             <input type="text" name="june" class="form-control june" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->june}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">July</label>
                                             <input type="text" name="july" class="form-control july" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->july}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">August</label>
                                             <input type="text" name="august" class="form-control august" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->august}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">September</label>
                                             <input type="text" name="september" class="form-control september" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->september}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">October</label>
                                             <input type="text" name="october" class="form-control october" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->october}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">November</label>
                                             <input type="text" name="november" class="form-control november" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->november}}">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="form-group">
                                             <label for="exampleInputAmount">December</label>
                                             <input type="text" name="december" class="form-control december" id="exampleInputAmount" placeholder="Enter amount" value="{{$user->december}}">
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <!-- /.card-body -->
                              <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
            </div>
            @endforeach
            </tbody>
            <tfoot class="text-center">
            <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Year</th>
            <th>January</th>
            <th>February</th>
            <th>March</th>
            <th>April</th>
            <th>May</th>
            <th>June</th>
            <th >July</th>
            <th>August</th>
            <th>September</th>
            <th>October</th>
            <th>November</th>
            <th>December</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
            </tr>
            </tfoot>
            </table>
         </div>
         <!-- /.card-body -->
      </div>
      @endif
   </div>
</div>
</div>
</div>
@endsection
@section('scripts')
<!-- Select2 -->
<script src="{{asset('admin/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script>
   $(function () {
     //Initialize Select2 Elements
     $('.select2bs4').select2({
       theme: 'bootstrap4',
       "responsive": true,
     });
   
      $("#example1").DataTable({
       "responsive": true,
       "autoWidth": false,
     });
   });
</script>
<script>
   $(document).ready(function(){
       $("select").change(function(){
           $(this).find("option:selected").each(function(){
               var optionValue = $(this).attr("value");
               if(optionValue){
                   $(".box").not("." + optionValue).hide();
                   $("." + optionValue).show();
   
               } else{
                   $(".box").hide();
                   
               }
           });
       }).change();
   });
   
   
   
   
</script>
@endsection