<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'category';
    protected $primaryKey = 'idcategory';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['category', 'qty'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
