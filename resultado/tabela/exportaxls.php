<?php

class Export{

    public function excel($name, $fileName, $dados){
        // nome do arquivo
        $fileName = $fileName . '.xls';
        // Abrindo tag tabela e criando título da tabela
        $html = '';
        $html .= '<table border=".1">';
        $html .= '<tr>';
        $html .= '<th colspan="' . count($dados) . '">' . $name . '</th>';
        $html .= '</tr>';
        // criando cabeçalho
        $html .= '<tr>';
        foreach ($dados[0] as $k => $v){
            $html .= '<th>' . ucfirst($k) . '</th>';
        }
        $html .= '</tr>';
        // criando o conteúdo da tabela
        for($i=0; $i < count($dados); $i++){
            $html .= '<tr>';
            foreach ($dados[$i] as $k => $v){
                $html .= '<td>' . $v . '</td>';
            }
            $html .= '</tr>';
        }
        $html .= '</table>';

        // configurando header para download
        header("Content-Description: PHP Generated Data");
        header("Content-Type: application/x-msexcel");
        header("Content-Disposition: attachment; filename=\"{$fileName}\"");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Pragma: no-cache");
        // envio conteúdo
        echo $html;
        exit;
    }

    /*public function xml($dados){

    } */
}