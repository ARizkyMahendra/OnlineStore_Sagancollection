<?php

namespace App\Http\Controllers;

use App\Models\detailTransaction;
use App\Models\product;
use App\Models\tblCart;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index(){
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('costumer.page.home',[
            'title' => 'Home',
            'count' => $CartCount,
        ]);
    }

    public function shop(){
        $data = product::all();
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('costumer.page.shop',[
            'title' => 'Shop',
            'data' => $data,
            'count' => $CartCount,
        ]);
    }

    public function transaksi(){
        $db = tblCart::where(['idUser' => 'guest123', 'status' => 0])->get();
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('costumer.page.transaksi',[
            'title' => 'Transaksi',
            'count' => $CartCount,
            'data'  => $db,
        ]);
    }
    public function contact(){
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        return view('costumer.page.contact',[
            'title' => 'Contact Us',
            'count' => $CartCount,
        ]);
    }

    public function checkout(){
        $CartCount = tblCart::where(['idUser' => 'guest123', 'status' => 0])->count();
        $code = transaction::count();
        $codeTransaction = date('Ymd').$code;

        $checkoutDetail = detailTransaction::where(['id_transaction'=> $codeTransaction, 'status' => 0])->sum('price');
        $totalBarang = detailTransaction::where(['id_transaction'=> $codeTransaction, 'status' => 0])->count('id_sku');
        $totalQty = detailTransaction::where(['id_transaction'=> $codeTransaction, 'status' => 0])->sum('Qty');

        return view('costumer.page.checkout',[
            'title' => 'Checkout',
            'count' => $CartCount,
            'detailBelanja' => $checkoutDetail,
            'totalBarang' => $totalBarang, 
            'totalQty' => $totalQty, 
            'codeTransaktion' => $codeTransaction, 
        ]);
    }

    public function checkoutProses(Request $request, $id){
        $data = $request->all();

        $code = transaction::count();
        $codeTransaction = date('Ymd').$code;

        //simpan detail barang
        $detailTransaction = new detailTransaction();
        $fieldDetail = [
            'id_transaction' => $codeTransaction,
            'id_sku' => $data['idProduct'],
            'Qty' => $data['qty'],
            'price' => $data['total'],
        ];

        $detailTransaction::create($fieldDetail);
            
        //update cart
        $fieldCart = [
            'Qty' => $data['qty'],
            'price' => $data['total'],
            'status' => 1,
        ];
        tblCart::where('id',$id)->update($fieldCart);

        Alert::toast('Checkout Berhasil', 'success');
        return redirect()->route('checkout');
    }

    public function payment(Request $request){
        $data = $request->all();

        // dd($data);die;

        $dbTransaksi = new transaction();

        $dbTransaksi-> codeTransaction   = $data['code'];
        $dbTransaksi-> totalPrice        = $data['dibayarkan'];
        $dbTransaksi-> totalQty          = $data['totalQty'];
        $dbTransaksi-> costumerName      = $data['nama_penerima'];
        $dbTransaksi-> address           = $data['alamat_penerima'];
        $dbTransaksi-> notlp             = $data['notlf'];
        $dbTransaksi-> ekspedisi         = $data['ekspedisi'];

        $dbTransaksi->save();
        
        $dataCart = detailTransaction::where('id_transaction', $data['code'])->get();
        foreach($dataCart as $item){
            $dataup = detailTransaction::where('id',$item->id)->first();
            $dataup->status =1;
            $dataup->save();

            $idProduct = product::where('id', $item->id_sku)->first();
            $idProduct->quantity = $idProduct->quantity - $item->Qty;
            $idProduct->quantityOut = $idProduct->quantityOut + $item->Qty;
            $idProduct->save();
        }

        Alert::alert()->success('Checkout Berhasil', 'Barang segera dikirim');
        return redirect()->route('home');
    }

    public function admin(){
        return view('admin.page.dashboard',[
            'name' => 'Dashboard',
            'title' => 'Admin Dashboard'
        ]);
    }
    
    public function userManagement(){
        return view('admin.page.user',[
            'name' => 'User management',
            'title' => 'Admin User management'
        ]);
    }
    public function report(){
        return view('admin.page.report',[
            'name' => 'Report',
            'title' => 'Admin Report'
        ]);
    }

    public function login(){
        return view('admin.page.login',[
            'name' => 'Login',
            'title' => 'Admin Login'
        ]);
    }

    public function loginProses(Request $request){
        // Session::flash('error', $request->email);
        $dataLogin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = new User;
        $proses = $user::where('email', $request->email)->first();
        if(Auth::attempt($dataLogin) && $proses->isAdmin===0){
            Alert::toast('Kamu bukan admin','error');
            return back();
        }else{
            if(Auth::attempt($dataLogin)){
                Alert::toast('Berhasil Login','success');
                $request->session()->regenerate();
                return redirect()->intended('/admin/dashboard');
            }else{
                Alert::toast('Email or password not valid','error');
                return back();
            }
        }
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::toast('logout success','success');
        return redirect('admin');
    }
}
