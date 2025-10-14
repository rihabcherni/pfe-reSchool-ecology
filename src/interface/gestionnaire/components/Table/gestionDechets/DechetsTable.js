import React from 'react';
import '../../../../../App.css'
import Api from '../../../../../Global/ComponentsTable/Api';

 const show=[
  ["ID","id"],
  ["Type dechet","type_dechet"],
  ["Prix unitaire (Kg)","prix_unitaire"],
  ["Crée le","created_at"],
  ["Modifié le","updated_at"],
 ];

 const createUpdate=[
  ["ID","id"],
  ["Type dechet","type_dechet"],
  ["Prix unitaire (Kg)","prix_unitaire"],
 ];
 export default function DechetsTable() {
  const initialValue = { type_dechet:"", prix_unitaire:"",error_list:[]};

  const url = `${process.env.REACT_APP_API_KEY}/api/dechets`
  const columnDefs = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Photo", field: "photo", maxWidth:200, minWidth:150, cellRenderer: (params) =>
    <img  style={{height:"60px",marginLeft:"5px", width:"65px"}} 
        src={`${process.env.REACT_APP_API_KEY}/storage/images/dechet/${params.data.photo}`} alt="dechet image" />},
    { headerName: "Type dechet", field: "type_dechet"},
    { headerName: "Prix unitaire (Kg)", field: "prix_unitaire"},
  ]
  const columnDefsTrash = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Photo", field: "photo", maxWidth:200, minWidth:150, cellRenderer: (params) =>
    <img  style={{height:"60px",marginLeft:"5px", width:"65px"}} 
        src={`${process.env.REACT_APP_API_KEY}/storage/trashImages/dechet/${params.data.photo}`} alt="dechet image" />},
    { headerName: "Type dechet", field: "type_dechet"},
    { headerName: "Prix unitaire (Kg)", field: "prix_unitaire"},
  ]
  return (
    <div style={{width:"100%"}}>
        <Api tableNameSing='Déchet' tableNamePlu='Déchets' url={url} initialValue={initialValue} 
        columnDefs={columnDefs} columnDefsTrash={columnDefsTrash} show={show}  createUpdate={createUpdate}/> 
    </div>
  );
}











