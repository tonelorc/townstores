<?php namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
  protected $table      = 'test';
  protected $primaryKey = 'id';

  protected $returnType     = 'array';
  protected $useSoftDeletes = false;

  protected $allowedFields = ['test'];

  protected $useTimestamps = false;
  protected $createdField  = 'created_at';
  protected $updatedField  = 'updated_at';
  protected $deletedField  = 'deleted_at';

  protected $validationRules    = [];
  protected $validationMessages = [];
  protected $skipValidation     = false;

}
