import * as React from 'react';
import Dialog from '@mui/material/Dialog';
import DialogContent from '@mui/material/DialogContent';
import DialogTitle from '@mui/material/DialogTitle';
import CloseIcon from '@mui/icons-material/Close';
import IconButton from '@mui/material/IconButton';
import { styled } from '@mui/material/styles';
import PropTypes from 'prop-types';

const BootstrapDialog = styled(Dialog)(({ theme }) => ({
  '& .MuiDialogContent-root': {
    padding: theme.spacing(2),
  },
  '& .MuiDialogActions-root': {
    padding: theme.spacing(1),
  },
}));

const BootstrapDialogTitle = (props) => {
  const { children, onClose, ...other } = props;
  return (
    <DialogTitle sx={{ m: 0, p: 2 }} {...other}>
      {children}
      {onClose ? (
        <IconButton aria-label="close" onClick={onClose} sx={{position: 'absolute',right: 8,top: 8,color: (theme) => theme.palette.grey[500]}}>
          <CloseIcon />
        </IconButton>
      ) : null}
    </DialogTitle>
  );
};
BootstrapDialogTitle.propTypes = { children: PropTypes.node, onClose: PropTypes.func.isRequired,};
export default function DialogContactUsShow({open,handleClose,data}) {
    console.log(data)
  return (
    <div>
      <BootstrapDialog
        onClose={handleClose}
        aria-labelledby="alert-dialog-title"
        open={open}
        aria-describedby="alert-dialog-description" fullWidth
      >
        <BootstrapDialogTitle id="alert-dialog-title" onClose={handleClose} sx={{fontWeight: "400",fontSize:"30px", backgroundColor: 'white', textAlign:"center", color:"green"}}>
          Affichage des données
        </BootstrapDialogTitle>
        <DialogContent sx={{backgroundColor: 'white', display: "flex" }}>
          <ul>
              <li><b>ID: </b>{data.id}</li>
              <li><b>Nom: </b>{data.nom}</li>
              <li><b>Prénom: </b>{data.prenom}</li>
              <li><b>E-Mail: </b>{data.email}</li>
              <li><b>Numero de télèphone: </b>{data.numero_telephone}</li>
              <li><b>Message: </b>{data.message}</li>
              <li><b>Crée le: </b>{data.created_at}</li>
          </ul>
        </DialogContent>
      </BootstrapDialog>
    </div>
  );
}