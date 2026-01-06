<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class EmployeeController extends BaseController
{
     public function index()
    {
        // Menampilkan seluruh Data Employee Tanpa Join Table
        $employeesModel = new \App\Models\EmployeeModel();
        $keyword = $this->request->getGet('keyword');
        $data = [
            'title' => 'Employees',
            'subtitle' => 'Data Customer',
            'employees' => $employeesModel->getEmployees(5, 'employees', $keyword),
            'pager' => $employeesModel->pager,
            'perPage' => 5,
            'keyword' => $keyword
        ];
        return view('employees/index', $data); // Mengirimkan data ke folder employee/index.php
    }

    public function create() {
        $data = [
            'title' => 'employees',
            'subtitle' => 'Tambah Data customer',
        ];

        return view('employees/create', $data);
    }

    public function insert() {
      $employeesModel = new \App\Models\EmployeeModel();
        // Dibawah ini adalah query INSERT INTO untuk anggota versi CodeIgniter
        $employeesModel->insert([
            'employee_name' => $this->request->getPost('employee_name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'position' => $this->request->getPost('position'),
            'hire_date' => $this->request->getPost('hire_date'),
            'status' => $this->request->getPost('status'),
        ]);

        // Mengembalikan ke index anggota dengan flash message "success"
        return redirect()->to('/employees')->with('success', 'Data Employe berhasil disimpan');
    }

     public function edit($employee_id) {
      $employeesModel = new \App\Models\EmployeeModel();

        $data=[
            'title'=>'employee',
            'subtitle'=>'ubah empleyees',
           'employees' => $employeesModel->find($employee_id),
        ];

        return view('employees/edit', $data);
    }

     public function update($employee_id) {
        $employeesModel = new \App\Models\EmployeeModel();

        $employeesModel->update($employee_id, [
            'employee_name' => $this->request->getPost('employee_name'),
            'phone' => $this->request->getPost('phone'),
            'email' => $this->request->getPost('email'),
            'address' => $this->request->getPost('address'),
        ]);

        return redirect()->to('/employees')->with('success', 'Data berhasil diupdate');
    }

    public function delete($employee_id) {
        $employeesModel = new \App\Models\EmployeeModel();

        $employees = $employeesModel->find($employee_id);
        if(!$employees) {
            throw PageNotFoundException::forPageNotFound('Data Employee tidak ditemukan');
        }

        $employeesModel->delete($employee_id);
        return redirect()->to('/employees')->with('success', 'Data Employee berhasil dihapus');
    }
}
