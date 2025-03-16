<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id_item';
    protected $allowedFields = ['nama_item', 'uom', 'harga_beli', 'harga_jual'];
}
