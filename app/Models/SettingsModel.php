<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table              = 'settings';
    protected $primaryKey         = 'id';
    protected $returnType         = 'App\Entities\SettingEntity';
    protected $useSoftDeletes     = false;
    protected $allowedFields      = ['name', 'value'];
    protected $useTimestamps      = false;
    protected $validationRules    = [
        'name'   => 'required|is_unique[settings.name]',
    ];
    protected $validationMessages = [
        'name' => [
            'required'   => 'Ayarlarma adı alanı zorunludur!.',
            'is_unique'  => 'Bu ayarlama zaten kayıtlı!.'
        ]
    ];
    protected $skipValidation     = false;

    /*
     * Public Functions
     */

    public function get(string $name) : string
    {
      $setting = $this->select('value')->where('name', clean_string($name))->first();
      return $setting->value ?? null;
    }

    /*
     * Priavtae Functions
     */
}
