import React from 'react';
import '../../../../../App.css'
import Api from '../../../../../Global/ComponentsTable/Api';
  const createUpdate=[
            ["ID","id"],
            ["Bloc établissement","bloc_etablissement_id"],
            ["Etage établissement","nom_etage_etablissement"],
           ]; 
  const show=[
            ["ID","id"],
            ["Bloc établissement","bloc_etablissement_id"],
            ["Etage établissement","nom_etage_etablissement"],
            ["Crée le","created_at"],
            ["Modifié le","updated_at"],
           ];     
export default function EtageEtablissementTable() {
  const initialValue = {quantite_disponible_plastique: "", quantite_disponible_canette: "",quantite_disponible_composte: "", quantite_disponible_papier: "",error_list:[]};    
  const url = `${process.env.REACT_APP_API_KEY}/api/etage-etablissement`
  const columnDefs = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Etage établissement", field: "nom_etage_etablissement", cellStyle:{backgroundColor:"#f4f0ec", fontSize:"14px", textAlign:"center"}},
    { headerName: "établissement", field: "etablissement", cellStyle:{ fontSize:"14px", textAlign:"center"} },
    { headerName: "Bloc établissement", field: "bloc_etablissement" , cellStyle:{ fontSize:"14px", textAlign:"center"}},
  ]
  return (
    <div style={{width:"100%"}}>
      <Api tableNameSing='étage établissement' tableNamePlu='étages établissements' 
      url={url} initialValue={initialValue} columnDefs={columnDefs} columnDefsTrash={columnDefs} 
      show={show} createUpdate={createUpdate}/> 
    </div>
  );
}