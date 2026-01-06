<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{
     public function index()
    {
        // Menampilkan seluruh Data Employee Tanpa Join Table
       $categoriesModel = new \App\Models\CategoryModel();
        $keyword = $this->request->getGet('keyword');
        $data = [
            'title' => 'Categories',
            'subtitle' => 'Data Categories',
            'categories' => $categoriesModel->getCategory(5, 'categories', $keyword),
            'pager' => $categoriesModel->pager,
            'perPage' => 5,
            'keyword' => $keyword
        ];
        return view('categories/index', $data); // Mengirimkan data ke folder employee/index.php
    }

    public function create() {
        $data = [
            'title' => 'category',
            'subtitle' => 'Tambah Data Kategori',
        ];

        return view('categories/create', $data);
    }

    public function insert() {
      $categoriesModel = new \App\Models\CategoryModel();
        // Dibawah ini adalah query INSERT INTO untuk anggota versi CodeIgniter
        $categoriesModel->insert([
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        // Mengembalikan ke index anggota dengan flash message "success"
        return redirect()->to('/categories')->with('success', 'Data Category berhasil disimpan');  
    }

    public function edit($category_id) {
      $categoriesModel = new \App\Models\CategoryModel();
        
        $data=[
            'title'=>'category',
            'subtitle'=>'Edit Data category',
           'categories' => $categoriesModel->find($category_id),
        ];

        return view('categories/edit', $data);
    }

    public function update($category_id) {
        $categoriesModel = new \App\Models\CategoryModel();

        $categoriesModel->update($category_id, [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
        ]);

        return redirect()->to('/categories')->with('success', 'Data berhasil diupdate');
    }

    public function delete($category_id) {
        $categoriesModel = new \App\Models\CategoryModel();

        $categories = $categoriesModel->find($category_id);
        if(!$categories) {
            throw PageNotFoundException::forPageNotFound('Data category tidak ditemukan');
        }

        $categoriesModel->delete($category_id);
        return redirect()->to('/categories')->with('success', 'Data category berhasil dihapus');
    }
}
