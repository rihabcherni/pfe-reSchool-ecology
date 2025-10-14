<?php
namespace App\Http\Controllers\Authentification;
use App\Http\Controllers\Globale\Controller;
use App\Models\Client_dechet;
use App\Models\Gestionnaire;
use App\Models\Mecanicien;
use App\Models\Ouvrier;
use App\Models\Reparateur_poubelle;
use App\Models\Responsable_commercial;
use App\Models\Responsable_etablissement;
use App\Models\Responsable_personnel ;
use App\Models\Responsable_technique;
use Illuminate\Support\Facades\Hash;
class QrloginController extends Controller{
    public function qrlogin($qrcode){
        $client_dechet=null;
        $gestionnaire=null;
        $responsable_etab=null;
        $responsable_commerciale=null;
        $responsable_personnel=null;
        $ouvrier=null;
        $responsable_technique=null;
        $reparateur_poubelle=null;
        $mecanicien=null;

        $all_client= Client_dechet::get();
        foreach($all_client as $cl){ if(Hash::check($qrcode ,$cl->QRcode)){ $client_dechet= $cl;}}

        $all_gestionnaire= Gestionnaire::get();
        foreach($all_gestionnaire as $gest){if(Hash::check($qrcode ,$gest->QRcode)){ $gestionnaire= $gest;}}

        $all_ouvrier= Ouvrier::get();
        foreach($all_ouvrier as $o){if(Hash::check($qrcode ,$o->QRcode)){ $ouvrier= $o;} }

        $all_responsable= Responsable_etablissement::get();
        foreach($all_responsable as $respEtab){if(Hash::check($qrcode ,$respEtab->QRcode)){ $responsable_etab= $respEtab;}}

        $all_respComm= Responsable_commercial::get();
        foreach($all_respComm as $resCom){if(Hash::check($qrcode ,$resCom->QRcode)){ $responsable_commerciale= $resCom;}}

        $all_resPer= Responsable_personnel::get();
        foreach($all_resPer as $rp){if(Hash::check($qrcode ,$rp->QRcode)){$responsable_personnel= $rp;}}

        $all_responsable_technique= Responsable_technique::get();
        foreach($all_responsable_technique as $rt){if(Hash::check($qrcode ,$rt->QRcode)){$responsable_technique= $rt;}}

        $all_mecanicien= Mecanicien::get();
        foreach($all_mecanicien as $mec){if(Hash::check($qrcode ,$mec->QRcode)){$mecanicien= $mec;}}

        $all_reparateur_poubelle= Reparateur_poubelle::get();
        foreach($all_reparateur_poubelle as $reparateurPoubelle){if(Hash::check($qrcode ,$reparateurPoubelle->QRcode)){$reparateur_poubelle= $reparateurPoubelle;}}

        if($client_dechet !== null){
            return response()->json([
                'Role'=>'client_dechet',
                'status'=>200,
                'user'=>$client_dechet,
                'token'=> $client_dechet->createToken('client-dechet-login')->plainTextToken,
                'message' =>'client dechet vous avez connecté avec success',
            ],200);
        }else if ($gestionnaire !== null){
            return response()->json([
                'Role'=>'gestionnaire',
                'status'=>200,
                'user'=>$gestionnaire,
                'token'=> $gestionnaire->createToken('gestionnaire-login')->plainTextToken,
                'message' =>'gestionnaire vous avez connecté avec success',
            ],200);
        }else if ($responsable_etab !== null){
            return response()->json([
                'Role'=>'responsable_etablissement',
                'status'=>200,
                'user'=>$responsable_etab,
                'token'=> $responsable_etab->createToken('responsable-etab-login')->plainTextToken,
                'message' =>'responsable etablissement vous avez connecté avec success',
            ],200);
        }else if ($ouvrier !== null){
            return response()->json([
                'Role'=>'ouvrier',
                'status'=>200,
                'user'=>$ouvrier,
                'token'=> $ouvrier->createToken('ouvrier-login')->plainTextToken,
                'message' =>'ouvrier vous avez connecté avec success',
            ],200);
        }else if ($responsable_commerciale !== null){
            return response()->json([
                'Role'=>'responsable_commerciale',
                'status'=>200,
                'user'=>$responsable_commerciale,
                'token'=> $responsable_commerciale->createToken('responsable-commerciale-login')->plainTextToken,
                'message' =>'responsable commerciale vous avez connecté avec success',
            ],200);
        }else if ($responsable_personnel !== null){
            return response()->json([
                'Role'=>'responsable_personnel',
                'status'=>200,
                'user'=>$responsable_personnel,
                'token'=> $responsable_personnel->createToken('responsable personnel-login')->plainTextToken,
                'message' =>'responsable personnel vous avez connecté avec success',
            ],200);
        }else if ($responsable_technique !== null){
            return response()->json([
                'Role'=>'responsable_technique',
                'status'=>200,
                'user'=>$responsable_technique,
                'token'=> $responsable_technique->createToken('responsable-technique-login')->plainTextToken,
                'message' =>'responsable technique vous avez connecté avec success',
            ],200);
        }else if ($reparateur_poubelle !== null){
            return response()->json([
                'Role'=>'reparateur_poubelle',
                'status'=>200,
                'user'=>$reparateur_poubelle,
                'token'=> $reparateur_poubelle->createToken('reparateur-poubelle-login')->plainTextToken,
                'message' =>'reparateur poubelle vous avez connecté avec success',
            ],200);
        }else if ($mecanicien !== null){
            return response()->json([
                'Role'=>'mecanicien',
                'status'=>200,
                'user'=>$mecanicien,
                'token'=> $mecanicien->createToken('mecanicien-login')->plainTextToken,
                'message' =>'mecanicien vous avez connecté avec success',
            ],200);
        }else{ return response()->json(['error' => 'Invalid Qrcode', 'status'=>401]);}
    }
}
