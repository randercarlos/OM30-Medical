<?php

if(!function_exists('getUF'))
{
    function getUF() {
        return  array(
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins'
        );
    }
}

if(!function_exists('deletePhoto'))
{
    function deletePhoto($oldPhotoPath) {
        // delete the old photo
        if ($oldPhotoPath !== null && is_file($oldPhotoPath)) {
            if (!unlink($oldPhotoPath)) {
                throw new \Exception('Falha ao excluir a foto: ' . $oldPhotoPath);
            }
        }
    }
}
