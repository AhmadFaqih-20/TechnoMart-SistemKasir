<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class CustomerController extends BaseController
{
     public function index()
    {
        // Menampilkan seluruh Data Employee Tanpa Join Table
        $customersModel = new \App\Models\CustomerModel();
        $keyword = $this->request->getGet('keyword');
        $data = [
            'title' => 'Customers',
            'subtitle' => 'Data Customer',
            'customers' => $customersModel->getCustomer(5, 'customers', $keyword),
            'pager' => $customersModel->pager,
            'perPage' => 5,
            'keyword' => $keyword
        ];
        return view('customers/index', $data); // Mengirimkan data ke folder employee/index.php
    }

    public function create() {
        $data = [
            'title' => 'customers',
            'subtitle' => 'Tambah Data customer',
        ];

        return view('customers/create', $data);
    }

    public function insert() {
      $customersModel = new \App\Models\CustomerModel();
        // Dibawah ini adalah query INSERT INTO untuk anggota versi CodeIgniter
        $customersModel->insert([
            'customer_name' => $this->request->getPost('customer_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
        ]);

        // Mengembalikan ke index anggota dengan flash message "success"
        return redirect()->to('/customers')->with('success', 'Data Customer berhasil disimpan');  
    }

    public function edit($customer_id) {
      $customersModel = new \App\Models\CustomerModel();
        
        $data=[
            'title'=>'customer',
            'subtitle'=>'Edit Data Customer',
           'customers' => $customersModel->find($customer_id),
        ];

        return view('customers/edit', $data);
    }

    public function update($customer_id) {
        $customersModel = new \App\Models\CustomerModel();

        $customersModel->update($customer_id, [
            'customer_name' => $this->request->getPost('customer_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/customers')->with('success', 'Data berhasil diupdate');
    }

    public function delete($customer_id) {
        $customersModel = new \App\Models\CustomerModel();

        $customers = $customersModel->find($customer_id);
        if(!$customers) {
            throw PageNotFoundException::forPageNotFound('Data Customer tidak ditemukan');
        }

        $customersModel->delete($customer_id);
        return redirect()->to('/customers')->with('success', 'Data Customer berhasil dihapus');
    }


}
