<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use CodeIgniter\Controller;

class Customers extends Controller
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $data['customers'] = $this->customerModel->findAll();
        return view('pages/customers', $data);
    }

    public function create()
    {
        return view('pages/customer_form');
    }

    public function store()
    {
        $data = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
            'fax' => $this->request->getPost('fax'),
            'email' => $this->request->getPost('email')
        ];

        $this->customerModel->insert($data);
        return redirect()->to('/customers')->with('success', 'Customer added successfully.');
    }

    public function edit($id)
    {
        $data['customer'] = $this->customerModel->find($id);
        return view('pages/customer_form', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_customer');
        $data = [
            'nama_customer' => $this->request->getPost('nama_customer'),
            'alamat' => $this->request->getPost('alamat'),
            'telp' => $this->request->getPost('telp'),
            'fax' => $this->request->getPost('fax'),
            'email' => $this->request->getPost('email')
        ];

        $this->customerModel->update($id, $data);
        return redirect()->to('/customers')->with('success', 'Customer updated successfully.');
    }

    public function delete($id)
    {
        $this->customerModel->delete($id);
        return redirect()->to('/customers')->with('success', 'Customer deleted successfully.');
    }
}
