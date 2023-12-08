<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\ProdukModel;
use App\Models\AccountModel;
use App\Models\DetailTransaksiModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class Admin extends BaseController
{
    protected $produkmodel, $adminModel, $accountmodel, $usermodel, $kategorimodel, $transaksimodel, $detailtransaksimodel;

    public function __construct()
    {
        $this->produkmodel = new ProdukModel();
        $this->adminModel = new AdminModel();
        $this->accountmodel = new AccountModel();
        $this->usermodel = new UserModel();
        $this->kategorimodel = new KategoriModel();
        $this->transaksimodel = new TransaksiModel();
        $this->detailtransaksimodel = new DetailTransaksiModel();
    }
    public function index()
    {
        if (!session()->has('adminLogin')) {
            return redirect()->to('/admin/login');
        }
        $currentPage = $this->request->getVar('pager') ? $this->request->getVar('pager') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->produkmodel->search($keyword);
        } else {
            $produk = $this->produkmodel;
        }

        $data = [
            'kategori' => $this->kategorimodel->findAll(),
            'produk' => $this->produkmodel->paginate(5, 'produk'),
            'pager' => $this->produkmodel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/home', $data);
    }

    public function login()
    {
        return view('admin/login');
    }
    public function detail($slug)
    {
        $data = [
            'produk' => $this->produkmodel->getProduk($slug)
        ];
        if (empty($data['produk'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk' . $slug . 'Not Found.');
        }
        return view('admin/detail', $data);
    }


    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kategori' => $this->kategorimodel->findAll()
        ];
        return view('admin/create', $data);
    }

    public function crekat()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/crekat', $data);
    }

    public function sakat()
    {
        $validationRules = [
            'nama_kategori' => [
                'rules' => 'required|is_unique[kategori.nama_kategori]',
                'errors' => [
                    'required' => '{field} Nama produk harus diisi',
                    'is_unique' => '{field} Nama produk sudah terdaftar'
                ]
            ]
        ];

        if (!$this->validate($validationRules)) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('nama_kategori', $validation->getError('nama_kategori'));
            return redirect()->to('/admin/crekat')->withInput();
        }

        $kategori = $this->request->getVar('nama_kategori');
        $insertData = ['nama_kategori' => $kategori];

        try {
            $this->kategorimodel->insert($insertData);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
            return redirect()->to('/admin/kategori');
        } catch (\Exception $e) {
            // Handle any potential database insertion errors here
            session()->setFlashdata('error', 'Terjadi kesalahan saat menambah data.');
            return redirect()->to('/admin/crekat')->withInput();
        }
    }

    public function dekat($id_kategori)
    {
        $this->kategorimodel->delete($id_kategori);
        return redirect()->to('/admin/kategori');
    }

    public function save()

    {
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required|is_unique[produk.nama_produk]',
                'errors' => [
                    'required' => '{field} Nama produk harus diisi',
                    'is_uniqe' => '{field} Nama produk sudah terdaftar'
                ]
            ],
            'image' => [
                'rules' => 'is_image[image]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('nama_produk', $validation->getError('nama_produk'));
            session()->setFlashdata('image', $validation->getError('image'));
            return redirect()->to('/admin/create')->withInput();
        }

        $fileImage = $this->request->getFile('image');
        // Periksa apakah tidak ada gambar yang diunggah
        if ($fileImage->getError() == 4) {
            $namaImage = 'default.jpg';
        } else {
            //generate nama sampul random
            $namaImage = $fileImage->getRandomName();
            //pindahkan file ke folder img
            $fileImage->move('img/produk', $namaImage);
        }

        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->produkmodel->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'id_kategori' => $this->request->getVar('id_kategori'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'create_at' => $this->request->getVar('create_at'),
            'harga' => $this->request->getVar('harga'),
            'image' => $namaImage,
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'produk' => $this->produkmodel->getProduk($slug)
        ];
        return view('admin/edit', $data);
    }

    public function update($kode_produk)
    {
        $produkmodel = $this->produkmodel->getProduk($this->request->getVar('slug'));
        if ($produkmodel['nama_produk'] == $this->request->getVar('nama_produk')) {
            $rule_nama = "required";
        } else {
            $rule_nama = "required|is_unique[produk.nama_produk]";
        }
        if (
            !$this->validate([
                'nama_produk' => [
                    'rules' => $rule_nama,
                    'errors' => [
                        'required' => '{field} Nama produk harus diisi',
                        'is_uniqe' => '{field} Nama produk sudah terdaftar'
                    ]
                ],
                'image' => [
                    'rules' => 'is_image[image]',
                    'errors' => [
                        'is_image' => 'Yang anda pilih bukan gambar',
                    ]
                ]
            ])
        ) {
            $validation = \Config\Services::validation();
            session()->setFlashdata('nama_produk', $validation->getError('nama_produk'));
            session()->setFlashdata('image', $validation->getError('image'));
            return redirect()->to('/admin/edit')->withInput();
        }

        $fileImage = $this->request->getFile('image');
        if ($fileImage->getError() == 4) {
            $namaImage = $this->request->getVar('oldimage');
        } else {
            $namaImage = $fileImage->getRandomName();
            $fileImage->move('img/produk', $namaImage);
            unlink('img/produk/' . $this->request->getVar('oldimage'));
        }


        $slug = url_title($this->request->getVar('nama_produk'), '-', true);
        $this->produkmodel->save([
            'kode_produk' => $kode_produk,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'create_at' => $this->request->getVar('create_at'),
            'harga' => $this->request->getVar('harga'),
            'image' => $namaImage
        ]);

        return redirect()->to('/admin');
    }

    public function auth()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $admin = $this->adminModel->where('username', $username)->first();

        if (is_null($admin)) {
            session()->setFlashdata('msg', "User tidak ditemukan!");
            return redirect()->to('admin/login')->withInput();
        }
        if (!password_verify($password, $admin['password'])) {
            session()->setFlashdata('msg', "Password Salah!");
            return redirect()->to('admin/login')->withInput();
        }
        $loginSession = [
            'adminLogin' => true,
            'adminName' => $admin['username'],
        ];

        session()->set($loginSession);
        return redirect()->to('admin');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('admin/login');
    }

    public function delete($kode_produk)
    {
        //cari gambar berdasarkan id
        $produk = $this->produkmodel->find($kode_produk);

        //cek jika file gambar default
        if ($produk['image'] != 'default.jpg') {
            //hps gambar
            unlink('img/produk/' . $produk['image']);
        }

        $this->produkmodel->delete($kode_produk);
        return redirect()->to('/admin');
    }

    public function kategori()
    {
        $currentPage = $this->request->getVar('pager') ? $this->request->getVar('pager') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->kategorimodel->search($keyword);
        } else {
            $user = $this->kategorimodel;
        }

        $data = [
            'kategori' => $this->kategorimodel->paginate(10, 'kategori'),
            'pager' => $this->kategorimodel->pager,
            'currentPage' => $currentPage,
            'validation' => \Config\Services::validation()
        ];
        return view('admin/kategori', $data);
    }

    public function user()
    {
        $currentPage = $this->request->getVar('pager') ? $this->request->getVar('pager') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $this->usermodel->search($keyword);
        } else {
            $user = $this->usermodel;
        }

        $data = [
            'user' => $this->usermodel->paginate(10, 'customer'),
            'pager' => $this->usermodel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/user', $data);
    }

    public function transaksi()
    {
        if (!session()->has('adminLogin')) {
            return redirect()->to('/admin/login');
        }
        $currentPage = $this->request->getVar('pager') ? $this->request->getVar('pager') : 1;


        $data = [
            'transaksi' => $this->transaksimodel->orderBy('status', 'ASC')->paginate(15, 'transaksi'),
            'detailTransaksi' => $this->detailtransaksimodel->findAll(),
            'user' => $this->usermodel->findAll(),
            'pager' => $this->transaksimodel->pager,
            'currentPage' => $currentPage
        ];
        return view('admin/transaksi', $data);
    }

    public function transaksi_detail($id)
    {
        $data = [
            'transaksi' => $this->transaksimodel->findTransaksi($id),
            'detailTransaksi' => $this->detailtransaksimodel->findByIdTransaksi($id),
            'produk' => $this->produkmodel->findAll(),
        ];
        if (empty($data['transaksi'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Transaksi Not Found.');
        }
        return view('admin/transaksi_detail', $data);
    }

    public function updateTransaksi($id_transaksi, $status)
    {
        $this->transaksimodel->update($id_transaksi, ['status' => $status]);
        return redirect()->to('/admin/transaksi/detail/'.$id_transaksi);
    }
}
