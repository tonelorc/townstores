<?php namespace App\Models;

use CodeIgniter\Model;

class LogModel extends Model
{
    protected $table      = 'log';
    protected $primaryKey = 'idlog';

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['date', 'feed_id', 'status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;
}
