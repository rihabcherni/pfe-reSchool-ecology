<?php

namespace App\Http\Resources\GestionPoubelleEtablissements;

use App\Models\Responsable_etablissement;
use App\Models\Zone_travail;
use Illuminate\Http\Resources\Json\JsonResource;

class Etablissement extends JsonResource{
    public function toArray($request){
        $deleted_at=null;
        if($this->deleted_at  !== null){
            $deleted_at=  $this->deleted_at->translatedFormat('H:i:s j F Y');
        }
        $zone_travail= Zone_travail::find($this->zone_travail_id)->region;
        return [
            'id' => $this->id,
            'region'=>$zone_travail,
            'zone_travail_id' => $this->zone_travail_id,
            'camion_id'=> $this->camion_id,

            'nom_etablissement' => $this->nom_etablissement,
            'niveau_etablissement' => $this->niveau_etablissement,
            'type_etablissement' => $this->type_etablissement,
            'nbr_personnes' => $this->nbr_personnes,
            'url_map'=>$this->url_map,
            'adresse' => $this->adresse,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,

            'quantite_dechets_plastique' => $this->quantite_dechets_plastique,
            'quantite_dechets_composte' => $this->quantite_dechets_composte,
            'quantite_dechets_papier' => $this->quantite_dechets_papier,
            'quantite_dechets_canette' => $this->quantite_dechets_canette,

            'quantite_plastique_mensuel' => $this->quantite_plastique_mensuel,
            'quantite_papier_mensuel' => $this->quantite_papier_mensuel,
            'quantite_composte_mensuel' => $this->quantite_composte_mensuel,
            'quantite_canette_mensuel' => $this->quantite_canette_mensuel,

            'bloc_etablissements'=>$this->bloc_etablissements,
            'etage'=>$this->etage_etablissements,
            'bloc_poubelle'=>$this->bloc_poubelles,
            'camion'=>$this->camion,

            'responsable_etablissement'=>Responsable_etablissement::where('etablissement_id',$this->id)->get(),
            'details_blocs'=>Bloc_etablissements::collection($this->bloc_etablissements),

            'created_at' => $this->created_at->translatedFormat('H:i:s j F Y'),
            'updated_at' => $this->updated_at->translatedFormat('H:i:s j F Y'),
            'deleted_at' => $deleted_at,
        ];
    }
}

