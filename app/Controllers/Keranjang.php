<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KeranjangModel;


class Keranjang extends BaseController
{
    protected $produkmodel, $keranjangmodel;

    public function __construct()
    {
        $this->produkmodel = new ProdukModel();
        $this->keranjangmodel = new KeranjangModel();
    }
    public function index()
    {
        $user = session()->get('id');
        $keranjang = $this->keranjangmodel->getKeranjangData($user);
        $data = [
            'keranjang' => $keranjang,
            'produk' => $this->produkmodel->findAll(),
        ];
        return view('user/keranjang', $data);
    }

    public function add($id_produk)
    {
        $idKeranjang = $this->keranjangmodel->getCartID($id_produk);
        $customer = session()->get('id');
        // dd($customer);
        $data = $this->produkmodel->getDetailProduk($id_produk);
        $cek = $this->keranjangmodel->cekKeranjang($customer, $id_produk);
        if (count($cek) > 0) {
            return redirect()->to('keranjang');
        } else {
            // dd(intval($customer));
            $this->keranjangmodel->insert(
                [
                    'id_keranjang' => $idKeranjang,
                    'id_customer' => $customer,
                    'kode_produk' => $id_produk,
                    'harga' => $data[0]['harga'],
                ]
            );
            return redirect()->to('keranjang');
        }
    }

    public function delete($id_keranjang)
    {
        $this->keranjangmodel->delete($id_keranjang);
        return redirect()->to('keranjang/index');
    }
}
