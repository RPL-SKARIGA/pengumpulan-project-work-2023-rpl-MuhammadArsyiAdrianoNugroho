<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProdukModel;
use App\Models\KategoriModel;
use App\Models\KeranjangModel;


class Home extends BaseController
{
    protected $produkmodel, $keranjangmodel, $usermodel, $kategorimodel;

    public function __construct()
    {
        $this->produkmodel = new ProdukModel();
        $this->keranjangmodel = new KeranjangModel();
        $this->usermodel = new UserModel();
        $this->kategorimodel = new KategoriModel();
    }
    public function index()
    {
        // if (!session()->has('userLogin')) {
        //     redirect()->to('/home/login');
        // }
        $data['produk'] = $this->produkmodel->findAll();
        return view('user/index', $data);
    }

public function more($key = null)
    {
        $data = [];
        if ($key === null) {
            $data = [
                'kategori' => $this->kategorimodel->findAll(),
                'produk' => $this->produkmodel->findAll(),
            ];
        } else if (ctype_alpha($key)) {
            if ($key == 'termurah') {
                $data = [
                    'kategori' => $this->kategorimodel->findAll(),
                    'produk' => $this->produkmodel->getProdukHarga('ASC'),
                ];
            }else if ($key == 'termahal') {
                $data = [
                    'kategori' => $this->kategorimodel->findAll(),
                    'produk' => $this->produkmodel->getProdukHarga('DESC'),
                ];
            } else {
                $data = [
                    'kategori' => $this->kategorimodel->findAll(),
                    'produk' => $this->produkmodel->getProdukByName($key),
                ];
            }
        } else if (ctype_digit($key)) {
            $data = [
                'kategori' => $this->kategorimodel->findAll(),
                'produk' => $this->produkmodel->getProdukByKategori($key),
            ];
        }
        return view('user/more', $data);
    }

    public function login()
    {
        if (session()->has('userLogin')) {
            redirect()->to(base_url());
        }
        return view('user/login');
    }
    public function detail($slug)
    {
        $data = [
            'produk' => $this->produkmodel->getProduk($slug)
        ];
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' Not Found.');
        }
        return view('user/detail_produk', $data);
    }
    public function keranjang()
    {
        $select = $this->request->getVar('select');
        $customer = session()->get('id');
        $produk = [];
        if ($select == 'keranjang') {
            $produk = $this->keranjangmodel->getBorrowID($customer);
        } else
            $data = [

                'produk' => $produk
            ];
        return view('user/keranjang', $produk);
    }
    public function register()
    {
        return view('user/register');
    }
    public function register_action()
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
            'provinsi' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
        ];
        if ($this->validate($rules)) {
            $nama = $this->request->getVar('nama');
            $email = $this->request->getVar('email');
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $telp = $this->request->getVAR('telp');
            $provinsi = $this->request->getVar('provinsi');
            $kota = $this->request->getVar('kota');
            $alamat = $this->request->getVar('alamat');
            $kode_pos = $this->request->getVar('kode_pos');

            if ($this->usermodel->createUser($nama, $email, $username, $password, $telp, $provinsi, $kota, $alamat, $kode_pos)) {
                return redirect()->to('home/login');
            } else {
                return redirect()->to(site_url('home/register'));
            }
        }
    }

    public function auth()
    {
        $username = $this->request->getVar('email');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $customer = $this->usermodel->where('username', $username)->first();

        if (is_null($customer)) {
            session()->setFlashdata('msg', "User tidak ditemukan!");
            return redirect()->to('home/login')->withInput();
        }
        if (!password_verify($password, $customer['password'])) {
            session()->setFlashdata('msg', "Password Salah!");
            return redirect()->to('home/login')->withInput();
        }
        $loginSession = [
            'userLogin' => true,
            'username' => $customer['username'],
            'id' => $customer['id'],
        ];

        session()->set($loginSession);
        return redirect()->to('home');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('home');
    }

    public function edpro()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'user' => $this->usermodel->getUserbyId(session()->get('id'))
        ];
        return view('user/profile', $data);
    }

    public function uppro($id_customer)
    {
        $user = $this->usermodel->getUserbyId(session()->get('id'));
        if ($user['username'] == $this->request->getVar('username')) {
            $rule_nama = "required";
        } else {
            $rule_nama = "required|is_unique[customer.username]";
        }
        if (
            !$this->validate([
                'username' => [
                    'rules' => $rule_nama,
                    'errors' => [
                        'required' => '{field} Username harus diisi',
                        'is_uniqe' => '{field} Username sudah terdaftar'
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('username', $validation->getError('username'));
            return redirect()->to('/home/edpro')->withInput();
        }

        $data = [
            'username' => $this->request->getVar('username'),
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'telp' => $this->request->getVar('telp'),
            'alamat' => $this->request->getVar('alamat'),
            'kota' => $this->request->getVar('kota'),
            'provinsi' => $this->request->getVar('provinsi'),
            'kode_pos' => $this->request->getVar('kode_pos'),
            'kota' => $this->request->getVar('kota'),
        ];

        $this->usermodel->UpdateUser(session()->get('id'), $data);
        session()->set('username', $this->request->getVar('username'));

        return redirect()->to('/home');
    }
}
