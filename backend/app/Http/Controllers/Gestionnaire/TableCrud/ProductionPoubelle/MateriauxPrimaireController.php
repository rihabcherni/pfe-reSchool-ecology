<?php
namespace App\Http\Controllers\Gestionnaire\TableCrud\ProductionPoubelle;

use App\Exports\ProductionPoubelle\MateriauxPrimaireExport;
use App\Http\Controllers\Globale\BaseController as BaseController;
use App\Http\Resources\ProductionPoubelle\MateriauxPrimaire as MateriauxPrimaireResource;
use App\Models\Materiau_primaire;
use App\Http\Requests\ProductionPoubelle\MateriauxPrimaireRequest;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MateriauxPrimaireController extends BaseController{
    public function index(){
        $materiauxPrimaire = Materiau_primaire::all();
        return $this->handleResponse(MateriauxPrimaireResource::collection($materiauxPrimaire), 'Affichage des materiauxPrimaire');
    }
    public function store(MateriauxPrimaireRequest $request){
        $input = $request->all();
        $materiauxPrimaire = Materiau_primaire::create($input);
        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau primaire crée!');
    }
    public function show($id){
        $materiauxPrimaire = Materiau_primaire::find($id);
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire not found!');
        }else{
            return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau Primaire existe.');
        }
    }
    public function update(MateriauxPrimaireRequest $request, Materiau_primaire $materiauxPrimaire){
        $input = $request->all();
        $materiauxPrimaire->update($input);
        return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), ' materiau Primaire modifié!');
    }
    public function destroy($id){
        $materiauxPrimaire =Materiau_primaire::find($id);
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiaux Primaire n\'existe pas!');
        }
        else{
            $materiauxPrimaire->delete();
            return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau Primaire supprimé!');
        }
    }

    public function hdelete( $id) {
        $materiauxPrimaire = Materiau_primaire::withTrashed()->where('id' ,  $id )->first();
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire n\'existe pas!');
        }else{
            $materiauxPrimaire->forceDelete();
            return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau Primaire supprimé definitivement!');
        }
    }
    public function hdeleteAll( ) {
        $materiauxPrimaires = Materiau_primaire::onlyTrashed()->get();
        foreach($materiauxPrimaires as $materiauxPrimaire){
            $materiauxPrimaire->forceDelete();
        }
        return $this->handleResponse(MateriauxPrimaireResource::collection($materiauxPrimaires), 'tous materiau primaire supprimés définitivement');
    }
    public function restore( $id) {
        $materiauxPrimaire = Materiau_primaire::withTrashed()->where('id' ,  $id )->first();
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire n\'existe pas!');
        } else{
            $materiauxPrimaire->restore();
            return $this->handleResponse(new MateriauxPrimaireResource($materiauxPrimaire), 'materiau Primaire supprimé avec retour!');
        }
    }
    public function restoreAll(){
        $materiauxPrimaires= Materiau_primaire::onlyTrashed()->get();
        foreach($materiauxPrimaires as $materiauxPrimaire){
            $materiauxPrimaire->restore();
        }
        return $this->handleResponse(MateriauxPrimaireResource::collection($materiauxPrimaires), 'tous materiaux primaires restore');
    }
    public function listeSuppression(){
        $materiauxPrimaire = Materiau_primaire::onlyTrashed()->get();
        return $this->handleResponse(MateriauxPrimaireResource::collection($materiauxPrimaire), 'affichage des materiaux primaires supprimés');
    }
    public function exportInfoExcel(){
        return Excel::download(new MateriauxPrimaireExport  , 'materiaux-primaire-liste.xlsx');
    }
    public function exportInfoCSV(){
        return Excel::download(new MateriauxPrimaireExport, 'materiaux-primaire-liste.csv');
    }
    public function pdf($id){
        $materiauxPrimaire = Materiau_primaire::find($id);
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiaux primaire n\'existe pas!');
        }else{
            $data= collect(Materiau_primaire::getMateriauxPrimaireById($id))->toArray();
            $liste = [
                'id' => $data[0]['id'],
                "fournisseur_id" => $data[0]['fournisseur_id'],
                "fournisseur" => $data[0]['fournisseur'],
                "fournisseur_nom" => $data[0]['fournisseur_nom'],
                "cin" => $data[0]['cin'],
                "fournisseur_numero_telephone" => $data[0]['fournisseur_numero_telephone'],
                "nom_materiel" => $data[0]['nom_materiel'],
                "prix_unitaire" => $data[0]['prix_unitaire'],
                "quantite" => $data[0]['quantite'],
                "prix_total" => $data[0]['prix_total'],
                "created_at" => $data[0]['created_at'],
                "updated_at" => $data[0]['updated_at'],
            ];
            $pdf = Pdf::loadView('pdf/NoDelete/unique/ProductionPoubelle/materiauxPrimaires', $liste);
            return $pdf->download('materiaux-primaire.pdf');
        }
    }
    public function pdfAll(){
        $materiauxPrimaire = Materiau_primaire::all();
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiaux primaire n\'existe pas!');
        }else{
            $p= MateriauxPrimaireResource::collection( $materiauxPrimaire);
            $data= collect($p)->toArray();
            $pdf = Pdf::loadView('pdf/NoDelete/table/ProductionPoubelle/materiauxPrimaires', [ 'data' => $data] )->setPaper('a4', 'landscape');
            return $pdf->download('materiaux-primaire.pdf');
        }
    }
    public function pdfAllTrashed(){
        $materiauxPrimaire = Materiau_primaire::onlyTrashed()->get();
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire n\'existe pas!');
        }else{
            $p= MateriauxPrimaireResource::collection( $materiauxPrimaire);
            $data= collect($p)->toArray();
            $pdf = Pdf::loadView('pdf/Delete/table/ProductionPoubelle/materiauxPrimaires', [ 'data' => $data] )->setPaper('a4', 'landscape');
            return $pdf->download('materiau-primaire-supprimes.pdf');
        }
    }
    public function pdfTrashed( $id) {
        $materiauxPrimaire = Materiau_primaire::withTrashed()->where('id' ,  $id )->first();
        if (is_null($materiauxPrimaire)) {
            return $this->handleError('materiau Primaire n\'existe pas!');
        }else{
            $data= collect(Materiau_primaire::getMateriauxPrimaireByIdTrashed($id))->toArray();
            $liste = [
                'id' => $data[0]['id'],
                "fournisseur_id" => $data[0]['fournisseur_id'],
                "fournisseur" => $data[0]['fournisseur'],
                "fournisseur_nom" => $data[0]['fournisseur_nom'],
                "cin" => $data[0]['cin'],
                "fournisseur_numero_telephone" => $data[0]['fournisseur_numero_telephone'],
                "nom_materiel" => $data[0]['nom_materiel'],
                "prix_unitaire" => $data[0]['prix_unitaire'],
                "quantite" => $data[0]['quantite'],
                "prix_total" => $data[0]['prix_total'],
                "created_at" => $data[0]['created_at'],
                "updated_at" => $data[0]['updated_at'],
                'deleted_at' => $data[0]['deleted_at'],
            ];
            $pdf = Pdf::loadView('pdf/Delete/unique/ProductionPoubelle/materiauxPrimaires', $liste);
            return $pdf->download('materiau-primaire-supprime.pdf');
            }
        }
}
