<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\GestionPanne\Reparation_poubelle as ReparationPoubelleResource;

class Reparation_poubelle extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'poubelle_id',
        'reparateur_poubelle_id',
        'image_panne_poubelle',
        'description_panne',
        'cout',
        'date_debut_reparation',
        'date_fin_reparation',
    ];
    public function reparationPoubelle()
    {
        return $this->belongsTo(Reparation_poubelle::class);
    }
    public function poubelle()
    {
        return $this->hasOne(Poubelle::class);
    }
    protected $dates=['deleted_at'];

    public static function getReparationPoubelle(){
        $reparationPoubelle = ReparationPoubelleResource::collection(Reparation_poubelle::all())->map(function ($item, $key) {
            return collect($item)->except(['deleted_at', 'poubelle','reparateur_poubelle'])->toArray();
        });
        return $reparationPoubelle;
    }

    public static function getReparationPoubelleById($id){
        $reparationPoubelle = ReparationPoubelleResource::collection(Reparation_poubelle::where('id',$id)->get());
        return $reparationPoubelle;
    }
    public static function getReparationPoubelleByIdTrashed($id){
        $reparationPoubelle = ReparationPoubelleResource::collection(Reparation_poubelle::withTrashed()->where('id',$id )->get());
        return $reparationPoubelle;
    }
}
