<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

use function PHPUnit\Framework\fileExists;

class ProductController extends BaseController
{
    // public function index()
    // {
    //     // Menampilkan seluruh Data Buku Tanpa Join Table
    //     $bukuModel = new \App\Models\BukuModel(); // Menghubungkan file model ke controller
    //     $data['buku'] = $bukuModel->findAll(); // SELECT * FROM buku
    //     return view('buku/index', $data); // Mengirimkan data ke folder buku/index.php
    // }

    public function index()
    {
        // Menampilkan Seluruh Data Produk dengan Join Table dari Model
        $productsModel = new \App\Models\ProductModel();
        $keyword = $this->request->getGet('keyword');
        $data = [
            'title' => 'Product',
            'subtitle' => 'Data Produk',
            'products' => $productsModel->getProduct(5, 'products', $keyword),
            'pager' => $productsModel->pager,
            'perPage' => 5,
            'keyword' => $keyword
        ];
        return view('products/index', $data);
    }

    public function create()
    {
        $categoriesModel = new \App\Models\CategoryModel();
        $data = [
            'title' => 'Product',
            'subtitle' => 'Tambah Data Product',
            'categories' => $categoriesModel->findAll()
        ];

        return view('products/create', $data);
    }

    public function insert()
    {
        $productsModel = new \App\Models\ProductModel();
        // Dibawah ini adalah query INSERT INTO versi CodeIgniter

        // Ambil file gambar dari form
        $coverFile = $this->request->getFile('cover');
        $coverName = null; // default jika tidak ada yang diupload

        if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
            // nama file random agar tidak terjadi duplikasi
            $coverName = $coverFile->getRandomName();

            // simpan file upload ke folder public/image/cover
            $coverFile->move(FCPATH . 'image/cover', $coverName);
        }

        $productsModel->insert([
            'category_id' => $this->request->getPost('category_id'),
            'sku' => $this->request->getPost('sku'),
            'product_name' => $this->request->getPost('product_name'),
            'unit_price' => $this->request->getPost('unit_price'),
            'stock' => $this->request->getPost('stock'),
            'status' => $this->request->getPost('status'),
            'cover' => $coverName,
        ]);

        // Mengembalikan ke index buku dengan flash message "success"
        return redirect()->to('/products')->with('success', 'Data Product berhasil disimpan');
    }

    public function edit($product_id)
    {
        $productsModel = new \App\Models\ProductModel();
        $categoriesModel = new \App\Models\CategoryModel();

        $data = [
            'title' => 'Product',
            'subtitle' => 'Edit Data Product',
            'products' => $productsModel->find($product_id),
            'categories' => $categoriesModel->findAll(),
        ];

        return view('products/edit', $data);
    }

    public function update($product_id)
    {
        $productsModel = new \App\Models\ProductModel();

        // nama cover lama jika tidak diupdate
        $coverLama = $this->request->getPost('cover_lama');

        // file cover diupdate
        $coverFile = $this->request->getFile('cover');
        $coverName = $coverLama; // Nama Cover yang lama

        if ($coverFile && $coverFile->isValid() && !$coverFile->hasMoved()) {
            // Bikin nama file random
            $newName = $coverFile->getRandomName();

            // Simpan di folder image/cover
            $coverFile->move(FCPATH . 'image/cover', $newName);

            // hapus cever lama kalau ada
            if (!empty($coverLama) && file_exists(FCPATH . 'image/cover/' . $coverLama)) {
                @unlink(FCPATH . 'image/cover/' . $coverLama);
            }

            // pakai nama baru
            $coverName = $newName;
        }

        $productsModel->update($product_id, [
            'category_id' => $this->request->getPost('category_id'),
            'sku' => $this->request->getPost('sku'),
            'product_name' => $this->request->getPost('product_name'),
            'unit_price' => $this->request->getPost('unit_price'),
            'stock' => $this->request->getPost('stock'),
            'status' => $this->request->getPost('status'),
            'cover' => $coverName,
        ]);

        return redirect()->to('/products')->with('success', 'Data produk berhasil diupdate');
    }

    public function delete($product_id)
    {
        $productsModel = new \App\Models\ProductModel();

        $products = $productsModel->find($product_id);
        if (!$products) {       
            throw PageNotFoundException::forPageNotFound('Data produk tidak ditemukan');
        }

        $productsModel->delete($product_id);
        return redirect()->to('/products')->with('success', 'Data produk berhasil dihapus');
    }
}
