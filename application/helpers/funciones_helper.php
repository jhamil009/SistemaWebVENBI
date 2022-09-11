<?php
function formatearFecha($fecha)
{
    if(!empty($fecha))
    {
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);
        $hora=substr($fecha,11,5);
    
        $fechaformateada=$dia.'/'.$mes.'/'.$anio.' '.$hora;
        return $fechaformateada;
    }
    else
    {
        return "";
    }   
}
function formatoArchivo($fecha)
{
    if(!empty($fecha))
    {
        $dia=substr($fecha,8,2);
        $mes=substr($fecha,5,2);
        $anio=substr($fecha,0,4);            
        $hora=substr($fecha,11,2);
        $min=substr($fecha,14,2);
        $seg=substr($fecha,17,2);
        $nombreArchivo=$dia.$mes.$anio.'-'.$hora.$min.$seg;
        return $nombreArchivo;
    }
    else
    {
        return "";
    }   
}
function responder($status,$mensaje)
{    
    //cabecera del mensaje
    header("HTTP/1.1 $status $mensaje");

    //array asociativo response
    $response['status']=$status;
    $response['mensaje']=$mensaje;

    //construccion y retorno del objeto json
    $json_response=json_encode($response);
    echo $json_response;
}
?>