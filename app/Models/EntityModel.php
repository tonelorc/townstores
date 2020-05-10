<?php namespace App\Models;

use CodeIgniter\Model;

class EntityModel extends Model
{
    protected $table      = 'entity';
    protected $primaryKey = 'identity';

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['category_ID', 'name', 'feed', 'description', 'logo', 'language', 'web', 'dateadded', 'visited', 'enabled'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getEntity()
    {
      return $this->from("category")->where("identity < 3 AND language='es' AND category_ID=idcategory")->find();
    }
}
