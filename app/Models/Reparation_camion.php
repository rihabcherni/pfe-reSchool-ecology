<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\GestionPanne\Reparation_camion as ReparationCamionResource;

class Reparation_camion extends Model
{
    use HasFactory ,  SoftDeletes;

    protected $fillable = [
        'camion_id',
        'mecanicien_id',
        'image_panne_camion',
        'description_panne',
        'cout',
        'date_debut_reparation',
        'date_fin_reparation',
    ];
    public function reparationPoubelle()
    {
        return $this->belongsTo(Reparation_poubelle::class);
    }
    public function camion()
    {
        return $this->hasOne(Camion::class);
    }
    protected $dates=['deleted_at'];

    public static function getReparationCamion(){
        $reparationCamion = ReparationCamionResource::collection(Reparation_camion::all())->map(function ($item, $key) {
            return collect($item)->except(['deleted_at','camion','mecanicien'])->toArray();
        });
        return $reparationCamion;
    }

    public static function getReparationCamionById($id){
        $reparationCamion = ReparationCamionResource::collection(Reparation_camion::where('id',$id)->get());
        return $reparationCamion;
    }
    public static function getReparationCamionByIdTrashed($id){
        $reparationCamion = ReparationCamionResource::collection(Reparation_camion::withTrashed()->where('id',$id )->get());
        return $reparationCamion;
    }
}
