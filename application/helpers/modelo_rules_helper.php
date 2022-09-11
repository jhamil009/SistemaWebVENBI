<?php
if(!function_exists('reglasRegistroModelo')) 
{
    function reglasRegistroModelo()
    {   
        return array(            
            array(
                'field' => 'nombreModelo',
                'label' => 'Modelo',
                'rules' => 'trim|required|min_length[3]|max_length[15]|is_unique[modelo.nombreModelo]',
                'errors' => array(
                    'required' => '* Se requiere el nombre del modelo.',
                    'min_length' => '* Se requiere al menos 3 caracteres.',
                    'max_length' => '* Debe ser menos de 15 caracteres.',
                    'is_unique' => '* El nombre del modelo ya exite.'
                )
            )
        );
    }
}
if(!function_exists('reglasModificacionModelo')) 
{
    function reglasModificacionModelo()
    {
        return array(
            array(
                'field' => 'nombreModelo',
                'label' => 'Modelo',
                'rules' => 'trim|required|min_length[3]|max_length[15]',
                'errors' => array(
                    'required' => '* Se requiere el nombre del modelo.',
                    'min_length' => '* Se requiere al menos 3 caracteres.',
                    'max_length' => '* Debe ser menos de 15 caracteres.'
                )
            )              
        );
    }
}
?>