import React from 'react';
import '../../../../../App.css'
import Api from '../../../../../Global/ComponentsTable/Api';

 const show=[
  ["ID","id"],
  ["Client dechet","client_dechet_id"],

  ["Quantité plastique ","quantite_plastique"],
  ["Quantité papier","quantite_papier"],
  ["Quantité composte","quantite_composte"],
  ["Quantité canette","quantite_canette"],
  ["Prix totale plastique ","prix_plastique"],
  ["Prix totale papier ","prix_papier"],
  ["Prix totale composte ","prix_composte"],
  ["Prix totale canette ","prix_canette"],

  ["Type paiment","type_paiment"],
  ["Montant total","montant_total"],
  ["Date commande","date_commande"],
  ["Date livraison","date_livraison"],
  ["Crée le","created_at"],
  ["Modifié le","updated_at"],
 ];

 const createUpdate=[
  ["ID","id"],
  ["Client dechet","client_dechet_id"],
  ["Quantité plastique ","quantite_plastique"],
  ["Quantité papier","quantite_papier"],
  ["Quantité composte","quantite_composte"],
  ["Quantité canette","quantite_canette"],
  ["Prix totale plastique ","prix_plastique"],
  ["Prix totale papier ","prix_papier"],
  ["Prix totale composte ","prix_composte"],
  ["Prix totale canette ","prix_canette"],

  ["Type paiment","type_paiment"],
  ["Montant total","montant_total"],
  ["Date commande","date_commande"],
  ["Date livraison","date_livraison"]
 ];

 export default function CommandeDechetTable() {
  const initialValue = { client_dechet_id:"", 
  quantite_plastique:"", quantite_papier:"", quantite_composte:"", quantite_canette:"",
  prix_plastique:"", prix_papier:"", prix_composte:"", prix_canette:"",
  type_paiment:"", montant_total:"", date_commande:"", date_livraison:"",created_at:"", updated_at:"", error_list:[]};

  const url = `${process.env.REACT_APP_API_KEY}/api/commande-dechet`
  const columnDefs = [
    { headerName: "ID", field: "id", maxWidth:80, minWidth:50, pinned: 'left' },
    { headerName: "Entreprise", field: "entreprise" , maxWidth: 250 , minWidth:200},
    { headerName: "Quantité plastique", field: "quantite_plastique" , maxWidth: 250 , minWidth:200},
    { headerName: "Quantité papier", field: "quantite_papier" , maxWidth: 250 , minWidth:200},
    { headerName: "Quantité composte", field: "quantite_composte" , maxWidth: 250 , minWidth:200},
    { headerName: "Quantité canette", field: "quantite_canette" , maxWidth: 250 , minWidth:200},
    { headerName: "Prix plastique", field: "prix_plastique" , maxWidth: 250 , minWidth:200},
    { headerName: "Prix papier", field: "prix_papier" , maxWidth: 250 , minWidth:200},
    { headerName: "Prix composte", field: "prix_composte" , maxWidth: 250 , minWidth:200},
    { headerName: "Prix canette", field: "prix_canette" , maxWidth: 250 , minWidth:200},
    { headerName: "Entreprise", field: "entreprise" , maxWidth: 250 , minWidth:200},
    { headerName: "Matricule fiscale client", field: "matricule_fiscale" , maxWidth: 250 , minWidth:200},
    { headerName: "Type paiment", field: "type_paiment", maxWidth: 200 , minWidth:140},
    { headerName: "Montant total (DT)", field: "montant_total", maxWidth: 200 , minWidth:180},
    { headerName: "Date de commande", field: "date_commande", maxWidth: 200 , minWidth:180},
    { headerName: "Date de livraison", field: "date_livraison", maxWidth: 200 , minWidth:180}
  ]

  return (
    <div style={{width:"100%"}}>
        <Api  tableNameSing='commande de déchets' tableNamePlu='commandes de déchets' url={url} 
        initialValue={initialValue} columnDefs={columnDefs} columnDefsTrash={columnDefs} show={show}  
        createUpdate={createUpdate}/>  
    </div>
  );
}











