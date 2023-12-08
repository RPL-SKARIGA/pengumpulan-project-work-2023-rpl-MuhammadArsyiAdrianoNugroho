<?php

namespace App\Controllers;

use App\Models\DetailTransaksiModel;
use App\Models\KategoriModel;
use App\Models\KeranjangModel;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\Request;

class Checkout extends BaseController
{
    protected $produkmodel, $keranjangmodel, $usermodel, $kategorimodel, $detailtransaksimodel, $transaksimodel;

    public function __construct()
    {
        $this->produkmodel = new ProdukModel();
        $this->keranjangmodel = new KeranjangModel();
        $this->usermodel = new UserModel();
        $this->kategorimodel = new KategoriModel();
        $this->detailtransaksimodel = new DetailTransaksiModel();
        $this->transaksimodel = new TransaksiModel();
    }

    public function index() {
        $data = [
            'transaksi' => $this->transaksimodel->transaksiByCustomer(session()->get('id')),
            'detailTransaksi' => $this->detailtransaksimodel->findAllDetailTransaksi(),
        ];
        return view('user/transaksi', $data);
    }

    public function detail($id)
    {
        $data = [
            'transaksi' => $this->transaksimodel->findTransaksi($id),
            'detailTransaksi' => $this->detailtransaksimodel->findByIdTransaksi($id),
            'produk' => $this->produkmodel->findAll(),
        ];
        return view('user/checkout', $data);
    }
    
    public function checkout() {
        $request = $this->request;
        $data = [
            'id_customer' => session()->get('id'),
            'total_harga' => $request->getVar('total_harga'),
            'status' => 0,
        ];

        $kode_produk = explode(",", $request->getVar('kode_produk'));
        
        $result = $this->transaksimodel->addTransaksi($data);
        
        if ($result !== false) {
            foreach ($kode_produk as $k) {
                $produk = $this->produkmodel->findProduk($k);
                $data = [
                    'kode_produk' => $k,
                    'id_transaksi' => $result,
                    'sub_harga' => $produk->harga,
                ];
                $this->detailtransaksimodel->addDetailTransaksi($data);
            }
            $this->keranjangmodel->hapusKeranjang(session()->get('id'));
            return redirect()->to('home/checkout/detail/'.$result);
        } else {
            return redirect()->to('keranjang');
        }
    }
    
    public function remove()
    {
        $id = $this->request->getVar('id_transaksi');
        if ($this->detailtransaksimodel->deleteByIdTransaksi($id)) {
            if ($this->transaksimodel->deleteTransaksi($id)) {
                return redirect()->to('home/checkout');
            } else {
                return redirect()->to('home/checkout/detail/'.$id);
            }
        } else {
            return redirect()->to('home/checkout/detail/'.$id);
        }
    }
}
