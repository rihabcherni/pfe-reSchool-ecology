<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Http\Resources\GestionCompte\Mecanicien as MecanicienResource;

class Responsable_technique extends Authenticatable{
    use HasApiTokens, SoftDeletes,HasFactory, Notifiable;

    protected $fillable = [
        'nom',
        'prenom',
        'CIN',
        'photo',
        'numero_telephone',
        'email',
        'mot_de_passe',
        'adresse',
        'QRcode',
    ];
    protected $dates=['deleted_at'];

    public static function getResponsableTechnique(){
        $mecanicien = MecanicienResource::collection(Mecanicien::all())->map(function ($item, $key) {
            return collect($item)->except(['deleted_at','mot_de_passe','Liste_camions_repares'])->toArray();
        });
        return $mecanicien;
    }

    public static function getResponsableTechniqueById($id){
        $mecanicien = MecanicienResource::collection(Mecanicien::where('id',$id)->get());
        return $mecanicien;
    }
    public static function getResponsableTechniqueByIdTrashed($id){
        $mecanicien = MecanicienResource::collection(Mecanicien::withTrashed()->where('id',$id )->get());
        return $mecanicien;
    }
}
