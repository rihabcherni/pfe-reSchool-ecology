import React from "react";
import { ImStatsDots } from "react-icons/im";
import { RiShoppingBasketFill } from "react-icons/ri"
import { FaMapMarkedAlt, FaTruckMoving, FaRecycle, FaTrash, FaUser, FaUserTie} from "react-icons/fa";
import { BsFillCalendarDateFill, BsTrashFill, BsTools} from "react-icons/bs";
import { VscTrash } from "react-icons/vsc";
import AutoDeleteIcon from '@mui/icons-material/AutoDelete';
export const LinkReparateurPoubelle = [
  {id: 1, name: "Dashboard",  path:"/reparateur-poubelle", icon: <ImStatsDots/>, size:"meduim"},
  {id: 2, name: "Pannes poubelles",  path:"/reparateur-poubelle/pannes-poubelles", icon: <FaTrash/>, size:"meduim"},
 ];