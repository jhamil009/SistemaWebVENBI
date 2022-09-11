<?php
//Admin
if(!function_exists('reglasLoginAdmin')) 
{
    function reglasLoginAdmin()
    {   
        return array(
            //nombre usuario
            array(
                'field' => 'login',
                'label' => 'Username',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '* Ingrese su nombre de usuario.'                
                )
            ),            
            //contraseña
            array(
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '* Ingrese su contraseña.',
                )
            )            
        );
    }
}
//Cliente
if(!function_exists('reglasLoginCliente')) 
{
    function reglasLoginCliente()
    {   
        return array(
            //nombre usuario
            array(
                'field' => 'login',
                'label' => 'Username',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '* Ingrese su nombre de usuario o su correo electrónico.'
                )
            ),            
            //contraseña
            array(
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'trim|required',
                'errors' => array(
                    'required' => '* Ingrese su contraseña.',
                )
            )            
        );
    }
}
?>