import React, { useState, useEffect } from 'react'
import '../../../../css/dechetCard.css'
import Card from '@mui/material/Card'
import Typography from '@mui/material/Typography'
import {StyledTypography} from '../../../../../../style'

const DechetsURL = `${process.env.REACT_APP_API_KEY}/api/internaute/quantite-dechete-totale-collecte`

export default function DechetCollecteDepot() {
    const [dechets, setDechets] = useState([])
    useEffect(() => {
        ;(async function getStatus() {
          const vdata = await fetch(DechetsURL)
          const vjson = await vdata.json()
    
          setTimeout(getStatus, 60000)
          setDechets(vjson)
        })()
      }, [])

    return (
    <>        
        <StyledTypography className='title'>Quantité totale de déchets collectés</StyledTypography>
        <div className='card-container4'>
            <Card sx={{backgroundColor:"#321fdb" , textAlign:"center", fontSize:"18px",padding:"10px",color:"white"}}  className='text-white mb-3' style={{ maxWidth: '18rem' }}>
                <Typography>Quantité Totale Plastique</Typography>
                <Typography>
                    {dechets.qt_dechet_plastique} Kg
                </Typography>
            </Card>
            <Card sx={{backgroundColor:"#f9b115", textAlign:"center", fontSize:"18px",padding:"10px",color:"white"}} className='text-white mb-3' style={{ maxWidth: '18rem' }}>
                <Typography>Quantité Totale Papier</Typography>
                <Typography>
                    {dechets.qt_dechet_papier} Kg
                </Typography>
            </Card>
            <Card sx={{backgroundColor:"#2eb85c", textAlign:"center", fontSize:"18px",padding:"10px",color:"white"}} className='text-white mb-3' style={{ maxWidth: '18rem' }}>
                <Typography>Quantité Totale Composte</Typography>
                <Typography>
                    {dechets.qt_dechet_composte} Kg
                </Typography>
            </Card>
            <Card sx={{backgroundColor:"#e55353", textAlign:"center", fontSize:"18px",padding:"10px",color:"white"}} className='text-white mb-3' style={{ maxWidth: '18rem' }}>
                <Typography>Quantité Totale Canette</Typography>
                <Typography>
                    {dechets.qt_dechet_canette} Kg
                </Typography>
            </Card> 
         
        </div>
        <br/>
    </>
    )
}