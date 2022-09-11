<?php
if(!function_exists('reglasRegistroUsuario')) 
{
    //Reglas de validacion para usuarios clientes y administradores
    function reglasRegistroUsuario()
    {   
        return array(
            array(
                'field' => 'nombres',
                'label' => 'Nombre',
                'rules' => 'trim|required|alpha|min_length[3]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el nombre o nombres.',
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 3 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.'                    
                )
            ),
            array(
                'field' => 'apellidoPaterno',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required|alpha|min_length[4]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el primer apellido.',
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 4 caracteres.',
                    'max_length'=>'* Debe ser menos de 30 caracteres.'                    
                )
            ),
            array(
                'field' => 'apellidoMaterno',
                'label' => 'Segundo Apellido',
                'rules' => 'trim|alpha|min_length[4]|max_length[30]',
                'errors' => array(                    
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 4 caracteres.',
                    'max_length'=>'* Debe ser menos de 30 caracteres.'               
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[usuario.email]|min_length[12]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el correo electrónico.',
                    'valid_email' => '* Debe contener una dirección de correo electrónico válida.',
                    'is_unique'=>'* Este correo electrónico ya existe, por favor ingrese uno distinto.',
                    'min_length' => '* Se requiere al menos 12 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.'     
                )
            ),
            array(
                'field' => 'telefono',
                'label' => 'Telefono',
                'rules' => 'trim|required|numeric|min_length[7]|max_length[10]',
                'errors' => array(
                    'required' => '* Se requiere número de teléfono o celular.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 7 caracteres.',
                    'max_length' => '* Debe ser menos de 10 caracteres.'                    
                )
            ),           
            array(
                'field' => 'usuario',
                'label' => 'Username',
                'rules' => 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[usuario.nombreUsuario]',
                'errors' => array(
                    'required' => '* Se requiere nombre de usuario.',
                    'alpha_numeric' => '* Solo se permiten valores alfanuméricos.',
                    'min_length'=>'* Se requiere al menos 5 caracteres.',
                    'max_length'=>'* Debe ser menos de 20 caracteres.',
                    'is_unique'=>'* Este nombre de usuario ya existe, por favor ingrese uno distinto.'                    
                )
            ),            
            //contraseña
            array(
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'trim|required|alpha_numeric|min_length[8]|max_length[30]|is_unique[usuario.password]',
                'errors' => array(
                    'required' => '* Debe ingresar una contraseña.',
                    'alpha_numeric' => '* Solo se permiten valores alfanuméricos.',
                    'min_length' => '* Se requiere al menos 8 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.',                    
                    'is_unique'=>'* Esta contraseña ya existe, por favor ingrese una contraseña distinta.'
                )
            ),
            array(
                'field' => 'repassword',
                'label' => 'ConfirmarContraseña',
                'rules' => 'trim|required|alpha_numeric|min_length[8]|max_length[30]|matches[password]',
                'errors' => array(
                    'required' => '* Ingrese nuevamente la contraseña.',
                    'alpha_numeric' => '* Solo se permiten valores alfanuméricos.',
                    'matches' => '* Este campo debe de coincidir con el campo anterior.',
                    'min_length' => '* Se requiere al menos 8 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.'                    
                )
            )
        );
    }
}

if(!function_exists('reglasModificacionUsuario')) 
{
    function reglasModificacionUsuario()
    {
        return array(
            array(
                'field' => 'nombres',
                'label' => 'Nombre',
                'rules' => 'trim|required|alpha|min_length[3]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el nombre o nombres.',
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 4 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.'                 
                )
            ),
            array(
                'field' => 'apellidoPaterno',
                'label' => 'Primer Apellido',
                'rules' => 'trim|required|alpha|min_length[4]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el primer apellido.',
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 4 caracteres.',
                    'max_length'=>'* Debe ser menos de 30 caracteres.'               
                )
            ),
             array(
                'field' => 'apellidoMaterno',
                'label' => 'Segundo Apellido',
                'rules' => 'trim|alpha|min_length[4]|max_length[30]',
                'errors' => array(                    
                    'alpha' => '* Solo se permiten caracteres alfabéticos.',
                    'min_length' => '* Se requiere al menos 4 caracteres.',
                    'max_length'=>'* Debe ser menos de 30 caracteres.'                 
                )
            ),          
            array(
                'field' => 'telefono',
                'label' => 'Telefono',
                'rules' => 'trim|required|numeric|min_length[7]|max_length[10]',
                'errors' => array(
                    'required' => '* Se requiere número de teléfono o celular.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 7 caracteres.',
                    'max_length' => '* Debe ser menos de 10 caracteres.'                    
                )
            ),
            array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|min_length[12]|max_length[30]',
                'errors' => array(
                    'required' => '* Se requiere el correo electrónico.',
                    'valid_email' => '* Debe contener una dirección de correo electrónico válida.',
                    'min_length' => '* Se requiere al menos 12 caracteres.',
                    'max_length' => '* Debe ser menos de 30 caracteres.'                   
                )
            )            
        );   
    }
}
?>