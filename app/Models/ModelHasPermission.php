<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Spatie\Permission\Models\Permission as ModelsPermission;

class ModelHasPermission extends Model
{
    public $table = 'model_has_permissions';

    public function permissiable()
    {
        return $this->morphTo();
    }

    public function user_type()
    {
      return $this->belongsTo('user_types');
    }
}
