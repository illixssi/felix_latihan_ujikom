<?php

namespace App\Controllers;

use App\Models\ItemModel;
use CodeIgniter\Controller;

class Items extends Controller
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    public function index()
    {
        $data['items'] = $this->itemModel->findAll();
        return view('pages/items', $data);
    }

    public function store()
    {
        $this->itemModel->save([
            'nama_item' => $this->request->getPost('nama_item'),
            'uom' => $this->request->getPost('unit_of_measure'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ]);

        return redirect()->to('/items')->with('success', 'Item berhasil ditambahkan.');
    }

    public function update()
    {
        $id = $this->request->getPost('id_item');

        $this->itemModel->update($id, [
            'nama_item' => $this->request->getPost('nama_item'),
            'uom' => $this->request->getPost('unit_of_measure'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
        ]);

        return redirect()->to('/items')->with('success', 'Item berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->itemModel->delete($id);
        return redirect()->to('/items')->with('success', 'Item berhasil dihapus.');
    }
}
