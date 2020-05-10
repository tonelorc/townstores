<?php namespace App\Models;

use CodeIgniter\Model;

class TagModel extends Model
{
    protected $table      = 'tag';
    protected $primaryKey = 'idtag';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['tag', 'gty'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
