<?php
if(!function_exists('reglasRegistroProducto')) 
{
    function reglasRegistroProducto()
    {   
        return array(
            array(
                'field' => 'idmodelo',
                'label' => 'Modelo',
                'rules' => 'required',
                'errors' => array(
                    'required' => '* Seleccione un elemento de la lista.'
                )
            ),
            array(
                'field' => 'color',
                'label' => 'Color',
                'rules' => 'required',
                'errors' => array(
                    'required' => '* Seleccione un elemento de la lista.'
                )
            ),
            array(
                'field' => 'descripcion',
                'label' => 'descripción',
                'rules' => 'required|min_length[9]|max_length[50]',
                'errors' => array(
                    'required' => '* Se requiere la %s del producto.',
                    'min_length' => '* Se requiere al menos 3 caracteres.',
                    'max_length' => '* Debe ser menos de 50 caracteres.'  
                )
            ),
            array(
                'field' => 'precio',
                'label' => 'precio',
                'rules' => 'trim|required|numeric|min_length[2]|max_length[4]',
                'errors' => array(
                    'required' => '* Se requiere el %s del producto.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 2 caracteres númericos.',
                    'max_length' => '* Debe ser menos de 4 caracteres númericos.'  
                )
            ),
            array(
                'field' => 'tallaN38',
                'label' => 'Talla38',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 38.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN39',
                'label' => 'Talla39',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 39.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN40',
                'label' => 'Talla40',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 40.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN41',
                'label' => 'Talla41',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 41.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN42',
                'label' => 'Talla42',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 42.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            )            
        );
    }
}

if(!function_exists('reglasModificacionProducto')) 
{
    function reglasModificacionProducto()
    {
        return array(
            array(
                'field' => 'idmodelo',
                'label' => 'Modelo',
                'rules' => 'required',
                'errors' => array(
                    'required' => '* Seleccione un elemento de la lista.'
                )
            ),
            array(
                'field' => 'color',
                'label' => 'Color',
                'rules' => 'required',
                'errors' => array(
                    'required' => '* Seleccione un elemento de la lista.'
                )
            ),
            array(
                'field' => 'descripcion',
                'label' => 'descripción',
                'rules' => 'required|min_length[9]|max_length[50]',
                'errors' => array(
                    'required' => '* Se requiere la %s del producto.',
                    'min_length' => '* Se requiere al menos 3 caracteres.',
                    'max_length' => '* Debe ser menos de 50 caracteres.'  
                )
            ),
            array(
                'field' => 'precio',
                'label' => 'precio',
                'rules' => 'trim|required|numeric|min_length[2]|max_length[6]',
                'errors' => array(
                    'required' => '* Se requiere el %s del producto.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 2 caracteres númericos.',
                    'max_length' => '* Debe ser menos de 6 caracteres númericos.'  
                )
            ),
            array(
                'field' => 'tallaN38',
                'label' => 'Talla38',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 38.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN39',
                'label' => 'Talla39',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 39.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN40',
                'label' => 'Talla40',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 40.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN41',
                'label' => 'Talla41',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 41.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            ),
            array(
                'field' => 'tallaN42',
                'label' => 'Talla42',
                'rules' => 'trim|required|numeric|min_length[1]|max_length[3]',
                'errors' => array(
                    'required' => '* Se requiere la cantidad de tallas N° 42.',
                    'numeric' => '* Solo se permiten valores númericos.',
                    'min_length' => '* Se requiere al menos 1 caracter númerico.',
                    'max_length' => '* Debe ser menos de 3 caracteres númericos.'
                )
            )            
        );
    }
}
?>