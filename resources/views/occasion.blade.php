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
    
      <div class="col-md-12">
         <div class="row">
            <div class="col-md-5">
                  <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Add Occasion</h3>
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
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputName">Occasion Name</label>
                           <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="exampleInputYear">Year</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
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
            <div class="col-md-7">
            <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Occasion Transaction </h3>
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
                     <div class="col-md-6">
                          <div class="form-group">
                           <label>Choose Occasion</label>
                           <select class="form-control select2bs4" name="occasion_id" style="width: 100%;">
                              @foreach($occasions as $occasion)
                              <option value="{{ $occasion->id }}">{{ $occasion->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputname">Name</label>
                           <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter name">
                        </div>
                     </div>
                       <div class="col-md-6">
                          <div class="form-group">
                           <label>Choose Option</label>
                           <select class="form-control select2bs4" style="width: 100%;">
                              <option>Select Option</option>
                              <option value="addfund">(+) Add Money</option>
                              <option value="cutfund">(-) Expense Money</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputaddfund">Amount</label>
                           <input type="text" name="addfund" class="form-control box addfund" id="exampleInputaddfund" placeholder="Enter fund">
                           <input type="text" name="cutfund" class="form-control box cutfund" id="exampleInputcutfund" placeholder="Enter fund">
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
            <div class="col-md-12">
               <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">All Occasions</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example1" class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Year</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     @foreach($occasions as $occasion)
                     <tr>
                        <td>{{ $occasion->id }}</td>
                        <td>{{ $occasion->name }}</td>
                        <td>{{ $occasion->year }}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($occasion->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($occasion->updated_at))}}</td>
                        <td>
                           <a href="{{route($droute,$occasion->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($eroute,$occasion->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $occasion->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="exampleModal{{ $occasion->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header bg-primary">
                                 <h5 class="modal-title" id="exampleModalLabel">Edit Occasion</h5>
                                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <!-- form start -->
                              <div class="card-body">
                                 <form method="POST" action="{{ route($uroute,$occasion->id)}}">
                                    @csrf
                                    <div class="row">
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$occasion->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputYear">Year</label>
                                             <input type="text" name="year" value="{{$occasion->year}}" class="form-control" id="exampleInputYear" placeholder="Enter year">
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
               </table>
            </div>
            <!-- /.card-body -->
         </div>
            </div>

                <div class="col-md-12">
               <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">All Occasion Transaction</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
               <table id="example2" class="table table-bordered table-striped">
                  <thead class="text-center">
                     <tr>
                        <th>#</th>
                        <th>Occasion Name</th>
                        <th>Name</th>
                        <th>Add Fund</th>
                        <th>Expense Fund</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     @foreach($occasionamounts as $occasionamount)
                     <tr>
                        <td>{{ $occasionamount->id }}</td>
                        <td>{{ $occasionamount->occasion->name}}</td>
                        <td>{{ $occasionamount->name }}</td>
                        <td>
                          
                            @if(!empty($occasionamount->addfund ))
                            (+){{ $occasionamount->addfund }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif

                        </td>
                        <td>
                             @if(!empty($occasionamount->cutfund ))
                            (-){{ $occasionamount->cutfund }}৳
                           @else
                           <span class="badge badge-danger">Empty</span>
                           @endif
                        </td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($occasionamount->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($occasionamount->updated_at))}}</td>
                        <td>
                           <a href="{{route($dlroute,$occasionamount->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($edroute,$occasionamount->id)}}" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1{{ $occasionamount->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="exampleModal1{{ $occasionamount->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header bg-primary">
                                 <h5 class="modal-title" id="exampleModalLabel">Edit Occasion Transaction</h5>
                                 <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                 </button>
                              </div>
                              <!-- form start -->
                              <div class="card-body">
                                 <form method="POST" action="{{ route($uproute,$occasionamount->id)}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                             <label>Choose Occasion</label>
                                             <select class="form-control select2bs4" name="occasion_id" style="width: 100%;">
                                                @foreach($occasions as $occasion)
                                                <option value="{{ $occasion->id }}" {{ $occasion->id == $occasionamount->occasion->id ? 'selected': '' }}>{{ $occasion->name }}</option>
                                                @endforeach
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$occasionamount->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                             <div class="col-md-6">
                                                  <div class="form-group">
                                                   <label>Choose Option</label>
                                                   <select class="form-control select2bs4" style="width: 100%;">
                                                      <option>Select Option</option>
                                                      <option value="addfund">(+) Add Money</option>
                                                      <option value="cutfund">(-) Expense Money</option>
                                                   </select>
                                                </div>
                                             </div>
                                          <div class="col-md-6">
                                             <div class="form-group">
                                                <label for="exampleInputaddfund">Amount</label>
                                                <input type="text" name="addfund" class="form-control box addfund" id="exampleInputaddfund" placeholder="Enter fund" value="{{$occasionamount->addfund}}">
                                                <input type="text" name="cutfund" class="form-control box cutfund" id="exampleInputcutfund" placeholder="Enter fund" value="{{$occasionamount->cutfund}}">
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
               </table>
            </div>
            <!-- /.card-body -->
         </div>
            </div>
         </div>
      

{{-- 
         <div class="row">
            <div class="col-md-12">
                  <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">Occasion Earning </h3>
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
                     <div class="col-md-6">
                          <div class="form-group">
                           <label>Choose Occasion</label>
                           <select class="form-control select2bs4" name="month" style="width: 100%;">
                              <option>Select Occasion</option>
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
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Donor Name</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Donor Phone</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                         <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Amount</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-success">Submit</button>
                  </div>
               </form>
            </div>
         </div>
            </div>
            <div class="col-md-12">
               <div class="card card-success">
            <div class="card-header">
               <h3 class="card-title">All Occasion Earnings</h3>
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
                        <th>Month</th>
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
                        <td>{{ $user->month }}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->updated_at))}}</td>
                        <td>
                           <a href="{{route($droute,$user->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($eroute,$user->id)}}" class="btn btn-success" data-toggle="modal" data-target="#exampleModal1{{ $user->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="exampleModal1{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header bg-success">
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
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputAddress">Address</label>
                                             <textarea name="address" class="form-control" rows="1">{{$user->address}} </textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputPhone">Phone Number</label>
                                             <input  type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputYear">Year</label>
                                             <input type="text" name="year" value="{{$user->year}}" class="form-control" id="exampleInputYear" placeholder="Enter year">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
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
                                       <div class="col-md-6">
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
                                       <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
            </div>
         </div> --}}

         {{--  <div class="row">
            <div class="col-md-12">
                  <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">Occasion Expense</h3>
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
                     <div class="col-md-6">
                          <div class="form-group">
                           <label>Choose Occasion</label>
                           <select class="form-control select2bs4" name="month" style="width: 100%;">
                              <option>Select Occasion</option>
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
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Donor Name</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Donor Phone</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                         <div class="col-md-6">
                        <div class="form-group">
                           <label for="exampleInputYear">Amount</label>
                           <input type="text" name="year" class="form-control" id="exampleInputYear" placeholder="Enter year">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                     <button type="submit" class="btn btn-info">Submit</button>
                  </div>
               </form>
            </div>
         </div>
            </div>
            <div class="col-md-12">
               <div class="card card-info">
            <div class="card-header">
               <h3 class="card-title">All Occasion Expenses</h3>
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
                        <th>Month</th>
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
                        <td>{{ $user->month }}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->updated_at))}}</td>
                        <td>
                           <a href="{{route($droute,$user->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($eroute,$user->id)}}" class="btn btn-info" data-toggle="modal" data-target="#exampleModal2{{ $user->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="exampleModal2{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header bg-info">
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
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputAddress">Address</label>
                                             <textarea name="address" class="form-control" rows="1">{{$user->address}} </textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputPhone">Phone Number</label>
                                             <input  type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
                                          <div class="form-group">
                                             <label for="exampleInputYear">Year</label>
                                             <input type="text" name="year" value="{{$user->year}}" class="form-control" id="exampleInputYear" placeholder="Enter year">
                                          </div>
                                       </div>
                                       <div class="col-md-6">
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
                                       <div class="col-md-6">
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
                                       <button type="submit" class="btn btn-info">Submit</button>
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  </tbody>
               </table>
            </div>
            <!-- /.card-body -->
         </div>
            </div>
         </div> --}}
     
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

         $("#example2").DataTable({
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