import React from 'react';
import '../../../../../App.css'
import Api from '../../../../../Global/ComponentsTable/Api';
  const show=[
            ["ID","id"],
            ["Etablissement","etablissement_id"],
            ["Bloc etablissement","nom_bloc_etablissement"],
            ["Crée le","created_at"],
            ["Modifié le","updated_at"],
           ];  
  const createUpdate=[
            ["ID","id"],
            // ["Etablissement","etablissement_id"],
            ["Bloc etablissement","nom_bloc_etablissement"],
           ];   
export default function BlocEtablissementTable() {
  const initialValue = {etablissement_id:"", nom_bloc_etablissement: "",error_list:[]};    
  const url = `${process.env.REACT_APP_API_KEY}/api/bloc-etablissement`
  const columnDefs = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Bloc etablissement", field: "nom_bloc_etablissement", cellStyle:{backgroundColor:"#f4f0ec", fontSize:"14px"} },
    { headerName: "Etablissement", field: "etablissement", cellStyle:{fontSize:"14px"} },
  ]
  return (
    <div style={{width:"100%"}}>
      <Api tableNameSing='Bloc établissement' tableNamePlu='Blocs établissements'  
      url={url} initialValue={initialValue} columnDefs={columnDefs} columnDefsTrash={columnDefs} 
      show={show} createUpdate={createUpdate}/>
    </div>
  );
}