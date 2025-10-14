import React from 'react'
import { Route, Routes ,Navigate} from 'react-router-dom';
import Page404 from '../Global/error-pages/Page404';
import Page401 from '../Global/error-pages/Page401';
import InterfaceInternaute from '../interface/internaute/InterfaceInternaute';
import ProfileUpdate from '../Global/AuthPage/ProfileUpdate';
import InterfaceResponsableTechnique from '../interface/responsable-technique/InterfaceResponsableTechnique';
import DashboardResponsableTechnique from '../interface/responsable-technique/pages/DashboardResponsableTechnique';
import Camion from '../interface/responsable-technique/pages/Camion';
import Mecanicien from '../interface/responsable-technique/pages/Mecanicien';
import PanneCamions from '../interface/responsable-technique/pages/PanneCamions';
import PannePoubelle from '../interface/responsable-technique/pages/PannePoubelle';
import Poubelle from '../interface/responsable-technique/pages/Poubelle';
import ReparateurPoubelle from '../interface/responsable-technique/pages/ReparateurPoubelle';
import ModifierMotDePasse from '../Global/AuthPage/ModifierMotDePasse';

export default function LinkResponsableTechnique() {
  return (
    <Routes>
      <Route path='/' element={<div><InterfaceInternaute/></div>}></Route>
      <Route path='/login' element={<Navigate to="/responsable-technique"/>}></Route>
      <Route path='/responsable-technique' element={<InterfaceResponsableTechnique/>}>	
        <Route index element={<DashboardResponsableTechnique/>}/>
        <Route path='reparateurs-poubelles' element={<ReparateurPoubelle/>}/>
        <Route path='mecanicien' element={<Mecanicien/>}/>
        <Route path='poubelles' element={<Poubelle/>}/>
        <Route path='camions' element={<Camion/>}/>
        <Route path='pannes-poubelles' element={<PannePoubelle/>}/>
        <Route path='pannes-camions' element={<PanneCamions/>}/>
        <Route path='modifier-mot-de-passe' element={<ModifierMotDePasse/>}/>
        <Route path='profile' element={<ProfileUpdate/>}/>	
      </Route>
      <Route path='/reparateur-poubelle' element={<Page401/>}>	
        <Route index element={<Page401/>}/>
        <Route path='modifier-mot-de-passe' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
      </Route>
      <Route path='/mecanicien' element={<Page401/>}>	
        <Route index element={<Page401/>}/>
        <Route path='pannes-camions' element={<Page401/>}/>
        <Route path='modifier-mot-de-passe' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
      </Route>
      <Route path='/responsable-personnel' element={<Page401/>}>	
        <Route index element={<Page401/>}/>
        <Route path='modifier-mot-de-passe' element={<Page401/>}/>
        <Route path='affectation-camions-etablissements' element={<Page401/>}/>
        <Route path='affectation-ouvriers-camions' element={<Page401/>}/>
        <Route path='camion' element={<Page401/>}/>
        <Route path='personnel/liste-gestionnaire' element={<Page401/>}/>
        <Route path='personnel/mecaniciens-camion' element={<Page401/>}/>
        <Route path='personnel/ouvriers' element={<Page401/>}/>
        <Route path='personnel/reparateurs-poubelle' element={<Page401/>}/>
        <Route path='personnel/responsable-commerciale' element={<Page401/>}/>
        <Route path='personnel/responsable-personnel' element={<Page401/>}/>
        <Route path='map' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
      </Route>
      <Route path='/client-dechets' element={<Page401/>}>
        <Route index element={<Page401/>}/>
        <Route path='reclamation' element={<Page401/>}/>				
        <Route path='panier' element={<Page401/>}/>
        <Route path='achat-dechets' element={<Page401/>}/>
        <Route path='historique-client-dechets' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>			
      </Route>
      <Route path='/responsable-etablissement' element={<Page401/>}>	
        <Route index element={<Page401/>}/>
        <Route path='dashboard' element={<Page401/>}/>
        <Route path='map' element={<Page401/>}/>
        <Route path='poubelle' element={<Page401/>}/>
        <Route path='panne-poubelle' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
        <Route path='historique-vidage-poubelle' element={<Page401/>}/>		
        <Route path='ajouter-responsable' element={<Page401/>}/>				
      </Route>
      <Route path='/gestionnaire' element={<Page401/>}>
        <Route index element={<Page401/>}/>	
        <Route path='modifier-mot-de-passe' element={<Page401/>}/>
        <Route path='map' element={<Page401/>}/>
        <Route path='poubelles' element={<Page401/>}/>
        <Route path='camions' element={<Page401/>}/>
        <Route path='personnel/ouvriers' element={<Page401/>}/>
        <Route path='personnel/reparateurs-poubelle' element={<Page401/>}/>		
        <Route path='personnel/reparateurs-camion' element={<Page401/>}/>
        <Route path='clients/responsables-etablissements' element={<Page401/>}/>
        <Route path='clients/acheteurs-dechets' element={<Page401/>}/>
        <Route path='production/fournisseurs' element={<Page401/>}/>
        <Route path='production/stock-poubelles' element={<Page401/>}/>
        <Route path='production/materiaux-primaires' element={<Page401/>}/>
        <Route path='commandes-dechets' element={<Page401/>}/>
        <Route path='pannes-poubelles' element={<Page401/>}/>
        <Route path='pannes-camions' element={<Page401/>}/>
        <Route path='calendrier' element={<Page401/>}/>
        <Route path='liste-gestionnaire' element={<Page401/>}/>
        <Route path='contact-us' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
        <Route path='historique-vidage-poubelle' element={<Page401/>}/>						
      </Route>
      <Route path='/ouvrier' element={<Page401/>}>	
          <Route index element={<Page401/>}/>
          <Route path='modifier-mot-de-passe' element={<Page401/>}/>
          <Route path='profile' element={<Page401/>}/>	
      </Route>
      <Route path='/responsable-commerciale' element={<Page401/>}>	
        <Route index element={<Page401/>}/>
        <Route path='modifier-mot-de-passe' element={<Page401/>}/>
        <Route path='profile' element={<Page401/>}/>	
      </Route>

      <Route path='*' element={<div><Navigate replace to="/page-404" /><Page404/> </div>}/>		   	
    </Routes>	
  )
}