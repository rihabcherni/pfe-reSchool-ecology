<?php

namespace App\Http\Controllers\ResponsableEtablissement;

use App\Http\Controllers\Globale\Controller;
use App\Models\Etablissement;
use App\Models\Reparation_poubelle;
use Illuminate\Http\Request;
class ResponsableController extends Controller{
    public function BlocEtablissementResponsable(){
        $etab_id=auth()->guard('responsable_etablissement')->user()->etablissement_id;
        $etablissement=  Etablissement::find($etab_id);
            $blocetabs= $etablissement->bloc_etablissements;
            foreach($blocetabs as $blocetab){
                $etageetabs= $blocetab->etage_etablissements;
                foreach($etageetabs as $etageetab){
                    $blocpoubelles= $etageetab->bloc_poubelles;
                    foreach($blocpoubelles as $blocpoubelle){
                        $poubelles= $blocpoubelle->poubelles;
                    }
                }
            }
        return ['bloc_etablissement'=>$blocetabs];
    }

    // public function panneetablissementPoubelle(Request $resquest){
    //     $etab_id=auth()->guard('responsable_etablissement')->user()->etablissement_id;
    //     $etablissement= Etablissement::find($etab_id);
    //     $poubelleEtab= $etablissement->poubelles;

    //     $poubelles=[];
    //     foreach($poubelleEtab as $poub){
    //         array_push($poubelles,$poub->id);
    //     }

    //     $pannesEtab=[];
    //     foreach($poubelles as $ppoub){
    //         $poubellePanneetab=Reparation_poubelle::where("poubelle_id", $ppoub)->first();
    //         if($poubellePanneetab !== null){
    //             array_push($pannesEtab,$poubellePanneetab);
    //         }
    //     }

    //     return $pannesEtab;
    // }
}
