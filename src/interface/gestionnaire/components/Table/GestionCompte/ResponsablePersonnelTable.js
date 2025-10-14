import React from 'react';
import '../../../../../App.css'
import Api from '../../../../../Global/ComponentsTable/Api';
 const show=[
  ["ID","id"],
//   ["Photo","photo"],
  ["Nom","nom"],
  ["Prénom","prenom"],
  ["Carte d'identité nationnale","CIN"],
  ["Numéro télèphone","numero_telephone"],
  ["E-mail","email"],
  ["Crée le","created_at"],
  ["Modifié le","updated_at"],
 ];
 const createUpdate=[
  ["ID","id"],
  ["Nom","nom"],
  ["Prénom","prenom"],
  ["Carte d'identité nationnale","CIN"],
  ["Numéro télèphone","numero_telephone"],
  ["E-mail","email"],
  ["Crée le","created_at"],
  ["Modifié le","updated_at"],
 ];
export default function ResponsablePersonnelTable() {
  const initialValue = {photo:"",nom: "", prenom: "",CIN:"", numero_telephone: "", email: "",created_at:"", updated_at:"", error_list:[]};
  const url = `${process.env.REACT_APP_API_KEY}/api/responsable-personnel`
  const columnDefs = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Photo", field: "photo", maxWidth:100, minWidth:100, cellRenderer: (params) =>
      <img  style={{height:"50px",marginLeft:"5px", width:"50px", borderRadius:"50%"}} 
          src={`${process.env.REACT_APP_API_KEY}/storage/images/responsable_personnel/${params.data.photo}`} alt="responsable personnel" />},
    { headerName: "Nom", field: "nom", maxWidth: 200 , minWidth:120},
    { headerName: "Prénom", field: "prenom", maxWidth: 200 , minWidth:120},
    { headerName: "CIN", field: "CIN", maxWidth: 200 , minWidth:120},
    { headerName: "Numéro télèphone", field: "numero_telephone", maxWidth: 200 , minWidth:160},
    { headerName: "E-mail", field: "email", maxWidth: 300 , minWidth:210},
  ]
  const columnDefsTrash = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Photo", field: "photo", maxWidth:100, minWidth:100, cellRenderer: (params) =>
      <img  style={{height:"50px",marginLeft:"5px", width:"50px", borderRadius:"50%"}} 
          src={`${process.env.REACT_APP_API_KEY}/storage/trashImages/responsable_personnel/${params.data.photo}`} alt="responsable personnel" />},
    { headerName: "Nom", field: "nom", maxWidth: 200 , minWidth:120},
    { headerName: "Prénom", field: "prenom", maxWidth: 200 , minWidth:120},
    { headerName: "CIN", field: "CIN", maxWidth: 200 , minWidth:120},
    { headerName: "Numéro télèphone", field: "numero_telephone", maxWidth: 200 , minWidth:160},
    { headerName: "E-mail", field: "email", maxWidth: 300 , minWidth:210},
  ]
  return (
    <div style={{width:"100%"}}>
        <Api tableNameSing='responsable personnel' tableNamePlu='responsables personnel' url={url} 
        initialValue={initialValue} columnDefs={columnDefs} columnDefsTrash={columnDefsTrash} 
        show={show} createUpdate={createUpdate}/> 
    </div>
  );
}


