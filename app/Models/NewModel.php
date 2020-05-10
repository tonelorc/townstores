<?php namespace App\Models;

use CodeIgniter\Model;

class NewModel extends Model
{
    protected $table      = 'new';
    protected $primaryKey = 'idnew';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['feed_Id', 'title', 'text', 'link', 'dateadded', 'visited', 'enabled'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
