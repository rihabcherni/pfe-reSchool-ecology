import React , {useState, useEffect} from 'react';
import {Chart as ChartJS,CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend} from 'chart.js';
import { Bar } from 'react-chartjs-2';
import { TailSpin } from  'react-loader-spinner'
import '../../../../Global/CSS/Dashboard.css'
import { SommeDechetStockActuellelUrl } from '../../../../URLBackend/Client_dechet';
ChartJS.register(CategoryScale,LinearScale,BarElement,Title,Tooltip,Legend);
export const options = {
    responsive: true,
    plugins: { legend: {  position: 'top' },},
};
export default function QuantiteStockDechets() {
  var myHeaders = new Headers();
  myHeaders.append("Authorization",  `Bearer ${localStorage.getItem('auth_token')}`);   
  var requestOptions = { method: 'GET', headers: myHeaders, redirect: 'follow'}; 
  
const [tableData, setTableData] = useState(null)
const getData = () => {
fetch(SommeDechetStockActuellelUrl, requestOptions)
  .then(response => response.json())
  .then(result => setTableData(result))
  .catch(error => console.log('error', error));
}  
useEffect(() => {
  getData()
}, [])
console.log(tableData)
if(tableData!==null){
  return (
    <>
      <Bar  options={options} data={{
        labels: ['Plastique', 'Papier', 'Composte', 'Canette'],
        datasets: [
          {label:  "Quantité",
            data:  [tableData.somme_depot_actuelle_plastique,tableData.somme_depot_actuelle_papier,
              tableData.somme_depot_actuelle_composte,tableData.somme_depot_actuelle_canette],
            backgroundColor: [ '#321fdb', '#f9b115', '#2eb85c', '#e55353'],
          },
        ],
      }} />
    </>
   )
 }else{
     return (
      <div style={{margin:"10% 30% 5%", verticalAlign:"center"}}>
        <TailSpin height="150" width="150" color='green' ariaLabel='loading' />
      </div>
     );
   };
 }