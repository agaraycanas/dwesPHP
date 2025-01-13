<?php

function conjugar($verbo)
{
    $desinencias = [
        'ar' => [
            'yo' => 'o',
            'tu' => 'as',
            'él' => 'a',
            'nosotros' => 'amos',
            'vosotros' => 'ais',
            'ellos' => 'an'
        ],
        'er' => [
            'yo' => 'o',
            'tu' => 'es',
            'él' => 'e',
            'nosotros' => 'emos',
            'vosotros' => 'eis',
            'ellos' => 'en'
        ],
        'ir' => [
            'yo' => 'o',
            'tu' => 'es',
            'él' => 'e',
            'nosotros' => 'imos',
            'vosotros' => 'is',
            'ellos' => 'en'
        ]
    ];

    $html = '';
    $conjugacion = substr($verbo, - 2, 2);
    $raiz = substr($verbo, 0, - 2);
    $html .= "<select>\n";
    foreach ($desinencias[$conjugacion] as $pronombre => $desinencia) {
        $html .= '<option>' . $pronombre.' '.$raiz . $desinencia . "</option>\n";
    }
    $html .= "</select>\n";
    return $html;
}

function num_conjugacion($infinitivo)
{
    $num = 0;
    switch (substr($infinitivo, - 2, 2)) {
        case 'ar':
            $num = 1;
            break;
        case 'er':
            $num = 2;
            break;
        case 'ir':
            $num = 3;
            break;
    }
    return $num;
}


