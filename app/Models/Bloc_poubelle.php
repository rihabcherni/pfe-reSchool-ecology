<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\GestionPoubelleEtablissements\Bloc_poubelle as BlocPoubelleResource;

class Bloc_poubelle extends Model{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'etage_etablissement_id',
    ];
    public function poubelles() {
        return $this->hasMany(Poubelle::class);
    }

    public function etage_etablissement(){
        return $this->belongsTo(Etage_etablissement::class);
    }
    protected $dates=['deleted_at'];
    public static function getBlocPoubelle(){
        $blocPoubelle = BlocPoubelleResource::collection(Bloc_poubelle::all())->map(function ($item, $key) {
            return collect($item)->except(['deleted_at','poubelle', 'etage_etablissement_id'])->toArray();
        });
        return $blocPoubelle;
    }

    public static function getBlocPoubelleById($id){
        $blocPoubelle = BlocPoubelleResource::collection(Bloc_poubelle::where('id',$id)->get());
        return $blocPoubelle;
    }
    public static function getBlocPoubelleByIdTrashed($id){
        $blocPoubelle = BlocPoubelleResource::collection(Bloc_poubelle::withTrashed()->where('id' ,  $id )->get());
        return $blocPoubelle;
    }
}



