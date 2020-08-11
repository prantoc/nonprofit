<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\DonateUser;
use App\Occasion;
use App\OccasionAmount;
use App\Investment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['route'] = "add-user";
        $data['eroute'] = "edit-user";
         $data['uroute'] = 'update-user';
        $data['droute'] = "delete-user";
         $data['user'] = 1;
        $data['invs'] = 0;
        $data['allUsers'] = DonateUser::all()->count();
        $data['dusers'] = DonateUser::orderBy('id','desc')->get();
         $data['totaladdfund']= OccasionAmount::all()->sum('addfund');
        $data['totalcutfund']= OccasionAmount::all()->sum('cutfund');
        $totalAmount1= DonateUser::all()->sum('january');
        $totalAmount2 = DonateUser::all()->sum('february');
        $totalAmount3 = DonateUser::all()->sum('march');
        $totalAmount4 = DonateUser::all()->sum('april');
        $totalAmount5 = DonateUser::all()->sum('may');
        $totalAmount6 = DonateUser::all()->sum('june');
        $totalAmount7 = DonateUser::all()->sum('july');
        $totalAmount8 = DonateUser::all()->sum('august');
        $totalAmount9 = DonateUser::all()->sum('september');
        $totalAmount10 = DonateUser::all()->sum('october');
        $totalAmount11 = DonateUser::all()->sum('november');
        $totalAmount12 = DonateUser::all()->sum('december');

        $data['totalAmount'] = $totalAmount1+$totalAmount2+$totalAmount3+$totalAmount4+$totalAmount5+$totalAmount6+$totalAmount7+$totalAmount8+$totalAmount9+$totalAmount10+$totalAmount11+$totalAmount12;

          
        $data['totalinvst']= Investment::all()->sum('amount');
        $totalA1= Investment::all()->sum('january');
        $totalA2 = Investment::all()->sum('february');
        $totalA3 = Investment::all()->sum('march');
        $totalA4 = Investment::all()->sum('april');
        $totalA5 = Investment::all()->sum('may');
        $totalA6 = Investment::all()->sum('june');
        $totalA7 = Investment::all()->sum('july');
        $totalA8 = Investment::all()->sum('august');
        $totalA9 = Investment::all()->sum('september');
        $totalA10 = Investment::all()->sum('october');
        $totalA11 = Investment::all()->sum('november');
        $totalA12 = Investment::all()->sum('december');

        $data['totalPaid'] = $totalA1+$totalA2+$totalA3+$totalA4+$totalA5+$totalA6+$totalA7+$totalA8+$totalA9+$totalA10+$totalA11+$totalA12;
        return view('home', $data);
    }

        public function addUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255', 
            'address' => 'required|string', 
            'phone' => 'required|numeric|min:11|regex:/^([0-9\s\-\(\)]*)$/', 
            'month' => 'nullable|string', 
            'year' => 'required|string', 
            'amount' => 'nullable|numeric',
            'january'=> 'nullable|numeric',
            'february'=> 'nullable|numeric',
            'march'=> 'nullable|numeric',
            'april'=> 'nullable|numeric',
            'may'=> 'nullable|numeric',
            'june'=> 'nullable|numeric',
            'july'=> 'nullable|numeric',
            'august'=> 'nullable|numeric',
            'september'=> 'nullable|numeric',
            'october'=> 'nullable|numeric',
            'november'=> 'nullable|numeric',
            'december'=>'nullable|numeric',
        ]);

        $du['name'] = $request->name;
        $du['address'] = $request->address;
        $du['phone'] = $request->phone;
        $du['month'] = $request->month;
        $du['year'] = $request->year;


        if ($request->january) {
            $du['january'] = $request->january;
        }

        if ($request->february) {
            $du['february'] = $request->february;
        }

        if ($request->march) {
            $du['march'] = $request->march;
        }

        if ($request->april) {
            $du['april'] = $request->april;
        }

        if ($request->may) {
            $du['may'] = $request->may;
        }

        if ($request->june) {
            $du['june'] = $request->june;
        }

        if ($request->july) {
            $du['july'] = $request->july;
        }

        if ($request->august) {
            $du['august'] = $request->august;
        }

        if ($request->september) {
            $du['september'] = $request->september;
        }

        if ($request->october) {
            $du['october'] = $request->october;
        }

        if ($request->november) {
            $du['november'] = $request->november;
        }

        if ($request->december) {
            $du['december'] = $request->december;
        }
      

        DonateUser::create($du);
        session()->flash('message', 'User Successfully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

     public function updateUser($id, Request $request)
    {
          $this->validate($request, [
            'name' => 'required|string|max:255', 
            'address' => 'required|string', 
            'phone' => 'required|numeric|min:11|regex:/^([0-9\s\-\(\)]*)$/', 
            'month' => 'nullable|string', 
            'year' => 'required|string', 
            'amount' => 'nullable|numeric', 
            'january'=> 'nullable|numeric',
            'february'=> 'nullable|numeric',
            'march'=> 'nullable|numeric',
            'april'=> 'nullable|numeric',
            'may'=> 'nullable|numeric',
            'june'=> 'nullable|numeric',
            'july'=> 'nullable|numeric',
            'august'=> 'nullable|numeric',
            'september'=> 'nullable|numeric',
            'october'=> 'nullable|numeric',
            'november'=> 'nullable|numeric',
            'december'=>'nullable|numeric',
        ]);

        $udu = DonateUser::findOrFail($id);

        if ($udu->name != $request->name)
        {
            $udu['name'] = $request->name;
        }

        if ($udu->address != $request->address)
        {
            $udu['address'] = $request->address;
        }
        if ($udu->phone != $request->phone)
        {
            $udu['phone'] = $request->phone;
        }
        if ($udu->month != $request->month)
        {
            $udu['month'] = $request->month;
        }
        if ($udu->year != $request->year)
        {
            $udu['year'] = $request->year;
        }

        if ($udu->january != $request->january) {
           
            $udu['january'] = $request->january;
        }

        if ($udu->february != $request->february) {
           
            $udu['february'] = $request->february;
        }

        if ($udu->march != $request->march) {
         
            $udu['march'] = $request->march;
        }

        if ($udu->april != $request->april) {
          
            $udu['april'] = $request->april;
        }

        if ($udu->may != $request->may) {
         
            $udu['may'] = $request->may;
        }

        if ($udu->june != $request->june) {
            
            $udu['june'] = $request->june;
        }

        if ($udu->july != $request->july) {
            
            $udu['july'] = $request->july;
        }

        if ($udu->august != $request->august) {
          
            $udu['august'] = $request->august;
        }

        if ($udu->september != $request->september) {
          
            $udu['september'] = $request->september;
        }

        if ($udu->october != $request->october) {
            
            $udu['october'] = $request->october;
        }

        if ($udu->november != $request->november) {
            
            $udu['november'] = $request->november;
        }

        if ($udu->december != $request->december) {
            
            $udu['december'] = $request->december;
        }
     

        $udu->save();
        session()->flash('message', 'User Successfully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }

       public function deleteUser($id)
    {
        $dltuser = DonateUser::findOrFail($id);
        $dltuser->delete();

        session()->flash('message', 'User SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


      public function occasion()
    {
        $data['route'] = "add-occasion";
        $data['eroute'] = "edit-occasion";
        $data['uroute'] = 'update-occasion';
        $data['droute'] = "delete-occasion";

        $data['aroute'] = "add-occasion-amount";
        $data['edroute'] = "edit-occasion-amount";
        $data['uproute'] = 'update-occasion-amount';
        $data['dlroute'] = "delete-occasion-amount";
        $data['allUsers'] = DonateUser::all()->count();
        $data['dusers'] = DonateUser::orderBy('id','desc')->get();
        $data['occasions'] = Occasion::orderBy('id','desc')->get();
        $data['occasionamounts'] = OccasionAmount::orderBy('id','desc')->get();

        $data['totaladdfund']= OccasionAmount::all()->sum('addfund');
        $data['totalcutfund']= OccasionAmount::all()->sum('cutfund');


        $totalAmount1= DonateUser::all()->sum('january');
        $totalAmount2 = DonateUser::all()->sum('february');
        $totalAmount3 = DonateUser::all()->sum('march');
        $totalAmount4 = DonateUser::all()->sum('april');
        $totalAmount5 = DonateUser::all()->sum('may');
        $totalAmount6 = DonateUser::all()->sum('june');
        $totalAmount7 = DonateUser::all()->sum('july');
        $totalAmount8 = DonateUser::all()->sum('august');
        $totalAmount9 = DonateUser::all()->sum('september');
        $totalAmount10 = DonateUser::all()->sum('october');
        $totalAmount11 = DonateUser::all()->sum('november');
        $totalAmount12 = DonateUser::all()->sum('december');

        $data['totalAmount'] = $totalAmount1+$totalAmount2+$totalAmount3+$totalAmount4+$totalAmount5+$totalAmount6+$totalAmount7+$totalAmount8+$totalAmount9+$totalAmount10+$totalAmount11+$totalAmount12;

          
        $data['totalinvst']= Investment::all()->sum('amount');
        $totalA1= Investment::all()->sum('january');
        $totalA2 = Investment::all()->sum('february');
        $totalA3 = Investment::all()->sum('march');
        $totalA4 = Investment::all()->sum('april');
        $totalA5 = Investment::all()->sum('may');
        $totalA6 = Investment::all()->sum('june');
        $totalA7 = Investment::all()->sum('july');
        $totalA8 = Investment::all()->sum('august');
        $totalA9 = Investment::all()->sum('september');
        $totalA10 = Investment::all()->sum('october');
        $totalA11 = Investment::all()->sum('november');
        $totalA12 = Investment::all()->sum('december');

        $data['totalPaid'] = $totalA1+$totalA2+$totalA3+$totalA4+$totalA5+$totalA6+$totalA7+$totalA8+$totalA9+$totalA10+$totalA11+$totalA12;
        return view('occasion', $data);
    }





     public function addOccasion(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'year' => 'required|string', 
        ]);

        $ao['name'] = $request->name;
        $ao['year'] = $request->year;
      

        Occasion::create($ao);
        session()->flash('message', 'Occasion Successfully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }



     public function updateOccasion($id, Request $request)
    {
          $this->validate($request, [
            'name' => 'required|string|max:255', 
            'year' => 'required|string',
        ]);

        $uo = Occasion::findOrFail($id);

        if ($uo->name != $request->name)
        {
            $uo['name'] = $request->name;
        }

        if ($uo->year != $request->year)
        {
            $uo['year'] = $request->year;
        }

        $uo->save();
        session()->flash('message', 'Occasion Successfully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }


    public function deleteOccasion($id)
    {
        $dlto = Occasion::findOrFail($id);
        $dltoa = OccasionAmount::whereOccasionId($id)->delete();
        $dlto->delete();

        session()->flash('message', 'Occasion & Occasion Transactions SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


     public function addOccasionAmount(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'occasion_id' => 'required',
            'addfund' => 'nullable|numeric', 
            'cutfund' => 'nullable|numeric',  
        ]);

        $aoa['name'] = $request->name;
        $aoa['occasion_id'] = $request->occasion_id;

        if ($request->addfund) {
            $aoa['addfund'] = $request->addfund;
        }
        if ($request->cutfund) {
            $aoa['cutfund'] = $request->cutfund;
        }
      

        OccasionAmount::create($aoa);

        //  $lastocaId = OccasionAmount::OrderBy('occasion_id', 'desc')->first();
        //  $fund = Occasion::findOrFail($lastocaId);

        // $fund['addfund'] =$request->addfund;
        // $fund['cutfund'] =  $request->cutfund;
        // $fund->save();

        session()->flash('message', 'Occasion Amount Successfully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }


     public function updateOccasionAmount($id, Request $request)
    {
          $this->validate($request, [
          'name' => 'required|string|max:255',
            'occasion_id' => 'required',
            'addfund' => 'nullable|numeric', 
            'cutfund' => 'nullable|numeric',  
        ]);

        $uoa = OccasionAmount::findOrFail($id);
       

        if ($uoa->name != $request->name)
        {
            $uoa['name'] = $request->name;
        }

        if ($uoa->occasion_id != $request->occasion_id)
        {
            $uoa['occasion_id'] = $request->occasion_id;
        }

        if ($uoa->addfund != $request->addfund)
        {
            $uoa['addfund'] = $request->addfund;
        }

         if ($uoa->cutfund != $request->cutfund)
        {
            $uoa['cutfund'] = $request->cutfund;
        }

        $uoa->save();
        session()->flash('message', 'Occasion Amount Successfully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }


  public function deleteOccasionAmount($id)
    {
        $dltoa = OccasionAmount::findOrFail($id);
        // $dltoa = OccasionAmount::whereOccasionId($id)->delete();
        $dltoa->delete();

        session()->flash('message', 'Occasion Transactions SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }





















       public function investment()
    {
        $data['route'] = "add-user";
        $data['eroute'] = "edit-user";
        $data['uroute'] = 'update-user';
        $data['droute'] = "delete-user";

        $data['aroute'] = "add-investment";
        $data['edroute'] = "edit-investment";
        $data['uproute'] = 'update-investment';
        $data['dlroute'] = "delete-investment";
        $data['user'] = 0;
        $data['invs'] = 1;


        $data['allUsers'] = DonateUser::all()->count();
        $data['dusers'] = DonateUser::orderBy('id','desc')->get();
        $data['iusers'] = Investment::orderBy('id','desc')->get();
        $data['totaladdfund']= OccasionAmount::all()->sum('addfund');
        $data['totalcutfund']= OccasionAmount::all()->sum('cutfund');
        $totalAmount1= DonateUser::all()->sum('january');
        $totalAmount2 = DonateUser::all()->sum('february');
        $totalAmount3 = DonateUser::all()->sum('march');
        $totalAmount4 = DonateUser::all()->sum('april');
        $totalAmount5 = DonateUser::all()->sum('may');
        $totalAmount6 = DonateUser::all()->sum('june');
        $totalAmount7 = DonateUser::all()->sum('july');
        $totalAmount8 = DonateUser::all()->sum('august');
        $totalAmount9 = DonateUser::all()->sum('september');
        $totalAmount10 = DonateUser::all()->sum('october');
        $totalAmount11 = DonateUser::all()->sum('november');
        $totalAmount12 = DonateUser::all()->sum('december');

        $data['totalAmount'] = $totalAmount1+$totalAmount2+$totalAmount3+$totalAmount4+$totalAmount5+$totalAmount6+$totalAmount7+$totalAmount8+$totalAmount9+$totalAmount10+$totalAmount11+$totalAmount12;


        $data['totalinvst']= Investment::all()->sum('amount');
        $totalA1= Investment::all()->sum('january');
        $totalA2 = Investment::all()->sum('february');
        $totalA3 = Investment::all()->sum('march');
        $totalA4 = Investment::all()->sum('april');
        $totalA5 = Investment::all()->sum('may');
        $totalA6 = Investment::all()->sum('june');
        $totalA7 = Investment::all()->sum('july');
        $totalA8 = Investment::all()->sum('august');
        $totalA9 = Investment::all()->sum('september');
        $totalA10 = Investment::all()->sum('october');
        $totalA11 = Investment::all()->sum('november');
        $totalA12 = Investment::all()->sum('december');

        $data['totalPaid'] = $totalA1+$totalA2+$totalA3+$totalA4+$totalA5+$totalA6+$totalA7+$totalA8+$totalA9+$totalA10+$totalA11+$totalA12;

        return view('home', $data);
    }

        public function addInvestment(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255', 
            'address' => 'nullable|string', 
            'phone' => 'nullable|numeric|min:11|regex:/^([0-9\s\-\(\)]*)$/',  
            'purpose' => 'nullable|string', 
            'amount' => 'required|numeric',
            'january'=> 'nullable|numeric',
            'february'=> 'nullable|numeric',
            'march'=> 'nullable|numeric',
            'april'=> 'nullable|numeric',
            'may'=> 'nullable|numeric',
            'june'=> 'nullable|numeric',
            'july'=> 'nullable|numeric',
            'august'=> 'nullable|numeric',
            'september'=> 'nullable|numeric',
            'october'=> 'nullable|numeric',
            'november'=> 'nullable|numeric',
            'december'=>'nullable|numeric',
        ]);

        $du['name'] = $request->name;
        $du['address'] = $request->address;
        $du['phone'] = $request->phone;
        $du['amount'] = $request->amount;
        $du['purpose'] = $request->purpose;


        if ($request->january) {
            $du['january'] = $request->january;
        }

        if ($request->february) {
            $du['february'] = $request->february;
        }

        if ($request->march) {
            $du['march'] = $request->march;
        }

        if ($request->april) {
            $du['april'] = $request->april;
        }

        if ($request->may) {
            $du['may'] = $request->may;
        }

        if ($request->june) {
            $du['june'] = $request->june;
        }

        if ($request->july) {
            $du['july'] = $request->july;
        }

        if ($request->august) {
            $du['august'] = $request->august;
        }

        if ($request->september) {
            $du['september'] = $request->september;
        }

        if ($request->october) {
            $du['october'] = $request->october;
        }

        if ($request->november) {
            $du['november'] = $request->november;
        }

        if ($request->december) {
            $du['december'] = $request->december;
        }
      

        Investment::create($du);
        session()->flash('message', 'Investment Successfully Added!');
        Session::flash('type', 'success');
        return redirect()->back();
    }

     public function updateInvestment($id, Request $request)
    {
          $this->validate($request, [
            'name' => 'required|string|max:255', 
            'address' => 'nullable|string', 
            'phone' => 'nullable|numeric|min:11|regex:/^([0-9\s\-\(\)]*)$/',  
            'purpose' => 'nullable|string', 
            'amount' => 'required|numeric',
            'january'=> 'nullable|numeric',
            'february'=> 'nullable|numeric',
            'march'=> 'nullable|numeric',
            'april'=> 'nullable|numeric',
            'may'=> 'nullable|numeric',
            'june'=> 'nullable|numeric',
            'july'=> 'nullable|numeric',
            'august'=> 'nullable|numeric',
            'september'=> 'nullable|numeric',
            'october'=> 'nullable|numeric',
            'november'=> 'nullable|numeric',
            'december'=>'nullable|numeric',
        ]);

        $udu = Investment::findOrFail($id);

        if ($udu->name != $request->name)
        {
            $udu['name'] = $request->name;
        }

        if ($udu->address != $request->address)
        {
            $udu['address'] = $request->address;
        }
        if ($udu->phone != $request->phone)
        {
            $udu['phone'] = $request->phone;
        }
        if ($udu->amount != $request->amount)
        {
            $udu['amount'] = $request->amount;
        }
        if ($udu->purpose != $request->purpose)
        {
            $udu['purpose'] = $request->purpose;
        }

        if ($udu->january != $request->january) {
           
            $udu['january'] = $request->january;
        }

        if ($udu->february != $request->february) {
           
            $udu['february'] = $request->february;
        }

        if ($udu->march != $request->march) {
         
            $udu['march'] = $request->march;
        }

        if ($udu->april != $request->april) {
          
            $udu['april'] = $request->april;
        }

        if ($udu->may != $request->may) {
         
            $udu['may'] = $request->may;
        }

        if ($udu->june != $request->june) {
            
            $udu['june'] = $request->june;
        }

        if ($udu->july != $request->july) {
            
            $udu['july'] = $request->july;
        }

        if ($udu->august != $request->august) {
          
            $udu['august'] = $request->august;
        }

        if ($udu->september != $request->september) {
          
            $udu['september'] = $request->september;
        }

        if ($udu->october != $request->october) {
            
            $udu['october'] = $request->october;
        }

        if ($udu->november != $request->november) {
            
            $udu['november'] = $request->november;
        }

        if ($udu->december != $request->december) {
            
            $udu['december'] = $request->december;
        }
     

        $udu->save();
        session()->flash('message', 'Investment Successfully Updated!');
        Session::flash('type', 'success');
        return redirect()->back();

    }


    public function deleteInvestment($id)
    {
        $dltinvs = Investment::findOrFail($id);
        $dltinvs->delete();

        session()->flash('message', 'User SuccessFully Deleted!');
        Session::flash('type', 'success');
        return redirect()->back();
    }



}
