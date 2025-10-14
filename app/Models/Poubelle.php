<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Resources\GestionPoubelleEtablissements\Poubelle as PoubelleResource;

class Poubelle extends Model{
    use HasFactory,  SoftDeletes;
    protected $fillable = [
        'bloc_poubelle_id',
        'nom',
        'QRcode',
        'type',
        'Etat',
    ];
    public function blocoubelle(){
        return $this->belongsTo(Bloc_poubelle::class);
    }
    public function Etage(){
        return $this->belongsToThrough(Etage::class, Poubelle::class);
    }
    protected $dates=['deleted_at'];
    public static function getPoubelle(){
        $poubelle = PoubelleResource::collection(Poubelle::all())->map(function ($item, $key) {
            return collect($item)->except(['deleted_at'])->toArray();
        });
        return $poubelle;
    }

    public static function getPoubelleById($id){
        $poubelle = PoubelleResource::collection(Poubelle::where('id',$id)->get());
        return $poubelle;
    }
    public static function getPoubelleByIdTrashed($id){
        $poubelle = PoubelleResource::collection(Poubelle::withTrashed()->where('id',$id )->get());
        return $poubelle;
    }
}

