<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class settingModel extends Model
{
    protected $table = 'setting';
    protected $fillable = ['clinic_id', 'logo_path', 'favicon_path' ,'updated_at' ,'updated_by'];


    public function Getlogo()
    {
        if ($this->logo_path) {
            return asset('upload/clinic-logo/' . $this->logo_path);
        }
        
    }
    public function Getfavicon()
    {
        if ($this->favicon_path) {
            return asset('upload/clinic-logo/fav-icon/' . $this->favicon_path);
        }
       
    }
}
