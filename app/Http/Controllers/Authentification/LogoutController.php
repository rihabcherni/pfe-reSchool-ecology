<?php
namespace App\Http\Controllers\Authentification;
use App\Http\Controllers\Globale\Controller;
class LogoutController extends Controller{
    public function logout(){
        $gestionnaire=auth()->guard('gestionnaire')->user();
        $responsable_etab=auth()->guard('responsable_etablissement')->user();
        $client_dechet=auth()->guard('client_dechet')->user();
        $ouvrier=auth()->guard('ouvrier')->user();
        $responsable_commerciale=auth()->guard('responsable_commercial')->user();
        $responsable_technique=auth()->guard('responsable_technique')->user();
        $reparateur_poubelle=auth()->guard('reparateur_poubelle')->user();
        $mecanicien=auth()->guard('mecanicien')->user();
        $responsable_personnel=auth()->guard('responsable_personnel')->user();
        if($gestionnaire !=null){
            $gestionnaire->tokens()->where('id', $gestionnaire->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'gestionnaire vous avez logout avec success',
            ]);
        }else if($responsable_etab !=null){
            $responsable_etab->tokens()->where('id', $responsable_etab->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'responsable etablissement vous avez logout avec success',
            ]);
        }else if($ouvrier !=null){
            $ouvrier->tokens()->where('id', $ouvrier->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'ouvrier vous avez logout avec success',
            ]);
        }else if($client_dechet !=null){
            $client_dechet->tokens()->where('id', $client_dechet->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'client dechet vous avez logout avec success',
            ]);
        }else if($responsable_commerciale !=null){
            $responsable_commerciale->tokens()->where('id', $responsable_commerciale->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'responsable commerciale vous avez logout avec success',
            ]);
        }else if($responsable_personnel !=null){
            $responsable_personnel->tokens()->where('id', $responsable_personnel->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'responsable personnel vous avez logout avec success',
            ]);
        }else if($responsable_technique !=null){
            $responsable_technique->tokens()->where('id', $responsable_technique->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'responsable technique vous avez logout avec success',
            ]);
        }else if($reparateur_poubelle !=null){
            $reparateur_poubelle->tokens()->where('id', $reparateur_poubelle->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'reparateur poubelle vous avez logout avec success',
            ]);
        }else if($mecanicien !=null){
            $mecanicien->tokens()->where('id', $mecanicien->currentAccessToken()->id)->delete();
            return response([
                'status' => 200,
                'message' =>'mecanicien vous avez logout avec success',
            ]);
        }else {
            return response([
                'messages' =>'token invalid',
            ]);
        }
    }
}
