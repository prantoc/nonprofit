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

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          @if($singleUser)


          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              

                <h3 class="profile-username text-center">{{$duser->doner->name}}</h3>

                <p class="text-muted text-center">+88 {{$duser->doner->phone}}</p>
                <p class="text-muted text-center">{{$duser->doner->address}}</p>

               @php
               $current = Carbon\Carbon::now();
               $cmwf = $current->format('m');
               $cywf = $current->format('Y');
               @endphp

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    Current Month-
                    <b>

                      (
                      @if($cmwf == 1)

                      January
                      @elseif($cmwf == 2)
                      February
                      @elseif($cmwf == 3)
                      March
                      @elseif($cmwf == 4)
                      April
                      @elseif($cmwf == 5)
                      May
                      @elseif($cmwf == 6)
                      June
                      @elseif($cmwf == 7)
                      July
                      @elseif($cmwf == 8)
                      August
                      @elseif($cmwf == 9)
                      September
                      @elseif($cmwf == 10)
                      October
                      @elseif($cmwf == 11)
                      November
                      @elseif($cmwf == 12)
                      December
                      @else
                      
                      @endif
                      )


                    </b> <a class="float-right">
                       {{-- @foreach($dusert as $duser) --}}
                      @if( $cywf == $duser->year && $cmwf == 1 && !empty($duser->january))
                      {{ $duser->january }}৳
                      @elseif($cywf == $duser->year && $cmwf == 2 && !empty($duser->february))
                      {{ $duser->February }}৳
                      @elseif($cywf == $duser->year && $cmwf == 3 && !empty($duser->march))
                      {{ $duser->March }}৳
                      @elseif($cywf == $duser->year && $cmwf == 4 && !empty($duser->april))
                      {{ $duser->April }}৳
                      @elseif($cywf == $duser->year && $cmwf == 5 && !empty($duser->may))
                      {{ $duser->May }}৳
                      @elseif($cywf == $duser->year && $cmwf == 6 && !empty($duser->june))
                      {{ $duser->June }}৳
                      @elseif($cywf == $duser->year && $cmwf == 7 && !empty($duser->july))
                      {{ $duser->July }}৳
                      @elseif($cywf == $duser->year && $cmwf == 8 && !empty($duser->august))
                      {{ $duser->August }}৳
                      @elseif($cywf == $duser->year && $cmwf == 9 && !empty($duser->september))
                      {{ $duser->September }}৳
                      @elseif($cywf == $duser->year && $cmwf == 10 && !empty($duser->october))
                      {{ $duser->October }}৳
                      @elseif($cywf == $duser->year && $cmwf == 11 && !empty($duser->november))
                      {{ $duser->November }}৳
                      @elseif($cywf == $duser->year && $cmwf == 12 && !empty($duser->december))
                      {{ $duser->December }}৳
                      @else
                      <span class="badge badge-danger">Dues</span>
                      @endif
                  {{-- @endforeach --}}
                    </a>
                
                  </li>
                  <li class="list-group-item">
                    <b>Total Funded</b><a class="float-right badge badge-success text-white">{{$tmbi}}৳</a>
                  </li>

                     <li class="list-group-item">
                    <b>Created-</b><a class="float-right">{{date('d-m-y / h:i:m A',strtotime($duser->doner->created_at))}}</a>
                  </li>
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Dues Months And Years</h3>
              </div>
              <!-- /.card-header -->
              @foreach($dusert as $duser)
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>{{$duser->year}}</strong>

                <p class="text-muted">
                  @if(!empty($duser->january))
                  @else
                  <span class="badge badge-danger">january</span>,
                  @endif
                  @if(!empty($duser->february))
                  @else
                  <span class="badge badge-danger">february</span>,
                  @endif
                   @if(!empty($duser->march))
                  @else
                  <span class="badge badge-danger">march</span>,
                  @endif
                   @if(!empty($duser->april))
                  @else
                  <span class="badge badge-danger">april</span>,
                  @endif
                   @if(!empty($duser->may))
                  @else
                  <span class="badge badge-danger">may</span>,
                  @endif

                   @if(!empty($duser->june))
                  @else
                  <span class="badge badge-danger">june</span>,
                  @endif
                   @if(!empty($duser->july))
                  @else
                  <span class="badge badge-danger">july</span>,
                  @endif

                   @if(!empty($duser->august))
                  @else
                  <span class="badge badge-danger">august</span>,
                  @endif

                   @if(!empty($duser->september))
                  @else
                  <span class="badge badge-danger">september</span>,
                  @endif

                   @if(!empty($duser->october))
                  @else
                  <span class="badge badge-danger">october</span>,
                  @endif

                   @if(!empty($duser->november))
                  @else
                  <span class="badge badge-danger">november</span>,
                  @endif


                   @if(!empty($duser->december))
                  @else
                  <span class="badge badge-danger">december</span>,
                  @endif
                </p>

                <hr>

               
              </div>
              @endforeach
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
               
                  <li class="nav-item "><a class="nav-link active" href="#timeline" data-toggle="tab">Transaction history</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  @foreach($dusert as $duser)
                    <form method="POST" action="{{ route($suroute,$duser->id)}}">
                                 @csrf

                  <div class="active tab-pane " id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          Year - {{$duser->year}} / {{date('d-m-y(h:i:m A)',strtotime($duser->created_at))}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> January</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->january))
                           <span class="btn btn-success">{{$duser->january}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                           
                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="january" class="form-control january" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->january}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                        <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> February</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->february))
                           <span class="btn btn-success">{{$duser->february}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="february" class="form-control january" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->february}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> March</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->march))
                           <span class="btn btn-success">{{$duser->march}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="march" class="form-control march" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->march}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>



                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> April</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->april))
                           <span class="btn btn-success">{{$duser->april}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="april" class="form-control april" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->april}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>



                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> May</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->may))
                           <span class="btn btn-success">{{$duser->may}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="may" class="form-control may" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->may}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> June</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->june))
                           <span class="btn btn-success">{{$duser->june}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="june" class="form-control june" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->june}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> July</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->july))
                           <span class="btn btn-success">{{$duser->july}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="july" class="form-control july" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->july}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> August</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->august))
                           <span class="btn btn-success">{{$duser->august}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="august" class="form-control august" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->august}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> September</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->september))
                           <span class="btn btn-success">{{$duser->september}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="september" class="form-control september" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->september}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> October</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->october))
                           <span class="btn btn-success">{{$duser->october}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="october" class="form-control october" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->october}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>



                            <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> November</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->november))
                           <span class="btn btn-success">{{$duser->november}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="november" class="form-control november" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->november}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>


                            <div>
                        <i class="far fa-clock bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($duser->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($duser->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> December</h3>

                          <div class="timeline-body">
                            @if(!empty($duser->december))
                           <span class="btn btn-success">{{$duser->december}}৳</span>
                           @else
                           <span class="btn btn-danger">Dues</span>
                           @endif
                          </div>
                          <div class="timeline-footer">
                            

                                 <input type="hidden" name="doner_id" value="{{$duser->doner_id}}">
                                 <input type="hidden" name="year" value="{{$duser->year}}">
                             <input type="text" name="december" class="form-control december" id="exampleInputAmount" placeholder="Enter amount" value="{{$duser->december}}">
                         <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>

                     



                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->


                    </div>
                      <span class="btn btn-warning mb-3">Next Year Start From Here !</span>
                  </div>
                   </form>
                  @endforeach
                
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->


@else
























































            <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              

                <h3 class="profile-username text-center">{{$occasion->name}}</h3>
                <p class="text-muted text-center">{{$occasion->year}}</p>

               @php
               $current = Carbon\Carbon::now();
               $cmwf = $current->format('m');
               $cywf = $current->format('Y');
               @endphp

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Total Funded</b><a class="float-right badge badge-success text-white">(+) {{$adf}}৳</a>
                  </li>
                  <li class="list-group-item">
                    <b>Total Expanse</b><a class="float-right badge badge-danger text-white">(-) {{$ctf}}৳</a>
                  </li>
                  
                  <li class="list-group-item">
                    <b>Total Balance</b><a class="float-right badge badge-info text-white">{{$tmbi}}৳</a>
                  </li>


                     <li class="list-group-item">
                    <b>Created-</b><a class="float-right">{{date('d-m-y / h:i:m A',strtotime($occasion->created_at))}}</a>
                  </li>
                  
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
               
                  <li class="nav-item "><a class="nav-link active" href="#timeline" data-toggle="tab">Transaction history</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  @foreach($oamounts as $oa)

                  <div class="active tab-pane " id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="
                      @if($oa->addfund)
                        bg-success
                      @else
                        bg-danger
                      @endif

                        ">
                           @if($oa->addfund)
                        Add Fund
                      @else
                        Expanse Fund
                      @endif - {{$oa->name}} / {{$oa->occasion->name}}
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="far fa-clock bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time font-weight-bold badge badge-dark text-white mb-3"><i class="far fa-clock"></i> Updated at- {{date('d-m-y/h:i:m A',strtotime($oa->updated_at))}}</span>

                          <span class="time font-weight-bold badge badge-info text-white mb-2"><i class="far fa-clock"></i> Created at- {{date('d-m-y/h:i:m A',strtotime($oa->created_at))}} </span> 

                          <h3 class="timeline-header font-weight-bold"> 

                            @if($oa->addfund)
                              <span class="bg-success px-3 py-2">(+) {{$oa->addfund}}</span>
                            @else
                              <span class="bg-danger px-3 py-2">(-) {{$oa->cutfund}}</span>
                            @endif



                        </h3>

                         
                        </div>
                      </div>

                     



                          </div>
                        </div>
                  @endforeach
                      </div>
                   
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>

          @endif
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection