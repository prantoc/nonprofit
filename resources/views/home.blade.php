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
   .box1{
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
         <button type="button" class="btn btn-info mb-2" data-toggle="modal" data-target="#modal-default">
         Add User Name
         </button>
         <div class="card card-primary">
            <div class="card-header">
               <h3 class="card-title">Add User Transaction</h3>
               <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
               </div>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
               <form method="POST" action="{{ route($route) }}">
                  @csrf
                  <div class="modal fade" id="modal-default"  aria-modal="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h4 class="modal-title">Add User Name</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                              </button>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputName">Name</label>
                                 <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputAddress">Address</label>
                                 <textarea name="address" class="form-control" rows="1"> </textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="exampleInputPhone">Phone Number</label>
                                 <input type="text" name="phone" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
                              </div>
                           </div>
                           <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </div>
                        <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                  </div>
               </form>
               <form method="POST" action="{{ route($troute) }}">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Choose User</label>
                           <select class="form-control select2bs4" name="doner_id" style="width: 100%;">
                              @foreach($dusers as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputPhone">Year</label>
                           <input type="text" name="year" class="form-control" id="exampleInputPhone" placeholder="Enter year">
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
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody class="text-center">
                     {{-- @php $i = 0;@endphp --}}
                     @foreach($dusers as $user)
                     {{-- @php $i++; @endphp --}}
                     <tr>
                        <td>
                           
                           {{ $user->c_id }}
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->created_at))}}</td>
                        <td>{{date('d-m-y/h:i:m A',strtotime($user->updated_at))}}</td>
                        <td>
                           <a href="{{route('delete-user-passcheck',$user->id)}}" class=" btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                           <a href="{{route($eroute,$user->id)}}" class="btn btn-primary" data-toggle="modal"  data-target="#modal-sm{{ $user->id }}"><i class="fas fa-edit"></i> Edit </a>
                        </td>
                     </tr>
                     <div class="modal fade " id="modal-sm{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md">
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
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="exampleInputName">ID</label>
                                             <input type="text" value="{{$user->c_id}}" name="c_id" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="exampleInputName">Name</label>
                                             <input type="text" value="{{$user->name}}" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="exampleInputAddress">Address</label>
                                             <textarea name="address" class="form-control" rows="1">{{$user->address}} </textarea>
                                          </div>
                                       </div>
                                       <div class="col-md-12">
                                          <div class="form-group">
                                             <label for="exampleInputPhone">Phone Number</label>
                                             <input  type="text" name="phone" value="{{$user->phone}}" class="form-control" id="exampleInputPhone" placeholder="Enter phone">
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
            </table>
         </div>
      </div>
      <div class="card card-primary">
         <div class="card-header">
            <h3 class="card-title">All User Transactions Data</h3>
            <h3 class="card-title float-right"> <a href="{{route('download-users-data')}}" class=" btn btn-dark mb-1"><i class="far fa-file-excel"></i> </a></h3>
         </div>
         <!-- /.card-header -->
         <div class="card-body">
            <table id="example" class="table table-bordered table-striped">
               <thead class="text-center">
                  <tr>
                     <th>#</th>
                     <th>Name</th>
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
                  @php $i= 0; @endphp 
                  @foreach($duserst as $usert)
                  @php $i++; @endphp
                  <tr>
                     <td>{{ $i }}</td>
                     <td><a href="{{route('single-user',$usert->id)}}">{{ $usert->doner->name }}</a></td>
                     <td>{{ $usert->year}}</td>
                     <td>
                        @if(!empty($usert->january))
                        <span class="badge badge-success">jan-paid</span>
                        <span class="badge badge-dark">{{ $usert->january }}৳</span>
                        @else
                        <span class="badge badge-danger">jan-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->february))
                        <span class="badge badge-success">feb-paid</span>
                        <span class="badge badge-dark">{{ $usert->february }}৳</span>
                        @else
                        <span class="badge badge-danger">feb-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->march))
                        <span class="badge badge-success">mar-paid</span>
                        <span class="badge badge-dark">{{ $usert->march }}৳</span>
                        @else
                        <span class="badge badge-danger">mar-dues</span>
                        @endif
                     </td>
                     <td> 
                        @if(!empty($usert->april))
                        <span class="badge badge-success">apr-paid</span>
                        <span class="badge badge-dark">{{ $usert->april }}৳</span>
                        @else
                        <span class="badge badge-danger">apr-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->may))
                        <span class="badge badge-success">may-paid</span>
                        <span class="badge badge-dark">{{ $usert->may }}৳</span>
                        @else
                        <span class="badge badge-danger">may-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->june))
                        <span class="badge badge-success">jun-paid</span>
                        <span class="badge badge-dark">{{ $usert->june }}৳</span>
                        @else
                        <span class="badge badge-danger">jun-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->july))
                        <span class="badge badge-success">jul-paid</span>
                        <span class="badge badge-dark">{{ $usert->july }}৳</span>
                        @else
                        <span class="badge badge-danger">jul-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->august))
                        <span class="badge badge-success">aug-paid</span>
                        <span class="badge badge-dark">{{ $usert->august }}৳</span>
                        @else
                        <span class="badge badge-danger">aug-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->september))
                        <span class="badge badge-success">sep-paid</span>
                        <span class="badge badge-dark">{{ $usert->september }}৳</span>
                        @else
                        <span class="badge badge-danger">sep-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->october))
                       <span class="badge badge-success">oct-paid</span>
                        <span class="badge badge-dark">{{ $usert->october }}৳</span>
                        @else
                        <span class="badge badge-danger">oc-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->november))
                        <span class="badge badge-success">nov-paid</span>
                        <span class="badge badge-dark">{{ $usert->november }}৳</span>
                        @else
                        <span class="badge badge-danger">nov-dues</span>
                        @endif
                     </td>
                     <td>
                        @if(!empty($usert->december))
                        <span class="badge badge-success">dec-paid</span>
                        <span class="badge badge-dark">{{ $usert->december }}৳</span>
                        @else
                        <span class="badge badge-danger">dec-dues</span>
                        @endif
                     </td>
                     <td>{{date('d-m-y/h:i:m A',strtotime($usert->created_at))}}</td>
                     <td>{{date('d-m-y/h:i:m A',strtotime($usert->updated_at))}}</td>
                     <td>
                        <a href="{{route('delete-usertransaction-passcheck',$usert->id)}}" class=" btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
                        <a href="{{route($teroute,$usert->id)}}" class="btn btn-primary" data-toggle="modal"  data-target="#modal-xl{{ $usert->id }}"><i class="fas fa-edit"></i> Edit </a>
                     </td>
                  </tr>
                  <div class="modal fade " id="modal-xl{{ $usert->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                           <div class="modal-header bg-primary">
                              <h5 class="modal-title" id="exampleModalLabel">Edit User Transaction</h5>
                              <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <!-- form start -->
                           <div class="card-body">
                              <form method="POST" action="{{ route($turoute,$usert->id)}}">
                                 @csrf
                                 <div class="row">
                                      <input type="hidden" value="{{$usert->doner_id}}" name="doner_id">
                            
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputYear">Year</label>
                                          <input type="text" name="year" value="{{$usert->year}}" class="form-control" id="exampleInputYear" placeholder="Enter year">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">January</label>
                                          <input type="text" name="january" class="form-control january" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->january}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">February</label>
                                          <input type="text" name="february" class="form-control february" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->february}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">March</label>
                                          <input type="text" name="march" class="form-control march" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->march}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">April</label>
                                          <input type="text" name="april" class="form-control april" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->april}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">May</label>
                                          <input type="text" name="may" class="form-control may" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->may}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">June</label>
                                          <input type="text" name="june" class="form-control june" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->june}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">July</label>
                                          <input type="text" name="july" class="form-control july" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->july}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">August</label>
                                          <input type="text" name="august" class="form-control august" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->august}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">September</label>
                                          <input type="text" name="september" class="form-control september" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->september}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">October</label>
                                          <input type="text" name="october" class="form-control october" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->october}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">November</label>
                                          <input type="text" name="november" class="form-control november" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->november}}">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="form-group">
                                          <label for="exampleInputAmount">December</label>
                                          <input type="text" name="december" class="form-control december" id="exampleInputAmount" placeholder="Enter amount" value="{{$usert->december}}">
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
             <h3 class="card-title float-right"> <a href="{{route('download-invest-data')}}" class=" btn btn-dark mb-1"><i class="far fa-file-excel"></i> </a></h3>
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
                  @php $i= 0; @endphp
                  @foreach($iusers as $user)
                  @php $i++; @endphp
                  <tr>
                     <td>{{ $i}}</td>
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
                        <a href="{{route('delete-investment-passcheck',$user->id)}}" class="btn btn-danger mb-1"><i class="fas fa-trash-alt"></i> Delete </a>
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
   
   
      $("#example").DataTable({
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