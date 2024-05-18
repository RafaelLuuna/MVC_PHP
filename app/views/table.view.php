<?php
defined('ROOTPATH') OR exit("Access denied.");

$currentPage = Table::currentPage();
$firstPage = 1;
$lastPage = $_POST['pageCount'];
$currentPage == 1 ? $previousPage = $currentPage : $previousPage = $currentPage - 1;
$currentPage == $lastPage ? $nextPage = $currentPage : $nextPage = $currentPage + 1;

$mainElement = '';
$mainElement .= '<div class="flex column w10">';

    // Tabela
    $mainElement .= '<table>';
        $mainElement .= '<thead>';
            $mainElement .= '<tr>';
                foreach($_POST['columns'] as $key=>$column){
                    $useAltName = !empty($_POST['config']['altColumName']) && count($_POST['config']['altColumName']) == count($_POST['columns']);
                    $useAltName ? $columnName = $_POST['config']['altColumName'][$key] : $columnName = $column;
                    $mainElement .= '<th>'.$columnName.'</th>';
                }
            $mainElement .= '</tr>';
        $mainElement .= '</thead>';
        $mainElement .= '<tbody>';
            foreach($_POST['tableData'] as $row){
                $mainElement .= '<tr>';
                    foreach($row as $value){   $mainElement .= '<td>'.$value.'</td>';   }
                $mainElement .= '</tr>';
            }
        $mainElement .= '</tbody>';
                
    $mainElement .= '</table>';


    // Navegação das páginas
    function btnElement($pageNum,$currentPage){
        $pageNum == $currentPage ? $elementClass = 'page-btn selected' : $elementClass = 'page-btn';

        $element =  '<a class="'.$elementClass.'" href="'.ROOT.$_GET['url'].'&page='.$pageNum.'">
                        <p>'.$pageNum.'</p>
                    </a>';

        return $element;
    }

    $mainElement .= 
    '<div class="flex row w10">
        <div></div>
        <div class="flex row">';
            if($lastPage <= 8){

                for( $i = 1; $i <= $lastPage; $i++ ){
                    $mainElement .= btnElement($i,$currentPage);
                }

            }else{
                
                $mainElement .=    '<a class="navegation-btn" href="'.ROOT.$_GET['url'].'&page='.$firstPage.'">
                                        <p>|<</p>
                                    </a>';
                $mainElement .=    '<a class="navegation-btn" href="'.ROOT.$_GET['url'].'&page='.$previousPage.'">
                                        <p><<</p>
                                    </a>';

                $mainElement .= btnElement($firstPage,$currentPage);

                switch(true){
                    case $currentPage <= 4:
                        $mainElement .= btnElement(2,$currentPage);
                        $mainElement .= btnElement(3,$currentPage);
                        $mainElement .= btnElement(4,$currentPage);
                        $mainElement .= btnElement(5,$currentPage);
                        $mainElement .= '<span> ... </span>';
                        break;
                    
                    case $currentPage > 4 && $currentPage <= $lastPage-4:
                        $mainElement .= '<span> ... </span>';
                        $mainElement .= btnElement($previousPage,$currentPage);
                        $mainElement .= btnElement($currentPage,$currentPage);
                        $mainElement .= btnElement($nextPage,$currentPage);
                        $mainElement .= '<span> ... </span>';
                        break;
                        
                    case $currentPage > $lastPage-4:
                        $mainElement .= '<span> ... </span>';
                        $mainElement .= btnElement($lastPage-4,$currentPage);
                        $mainElement .= btnElement($lastPage-3,$currentPage);
                        $mainElement .= btnElement($lastPage-2,$currentPage);
                        $mainElement .= btnElement($lastPage-1,$currentPage);
                        break;

                }

                
                $mainElement .= btnElement($lastPage,$currentPage);

                $mainElement .=    '<a class="navegation-btn" href="'.ROOT.$_GET['url'].'&page='.$nextPage.'">
                                        <p>>></p>
                                    </a>';
                $mainElement .=    '<a class="navegation-btn" href="'.ROOT.$_GET['url'].'&page='.$lastPage.'">
                                        <p>>|</p>
                                    </a>';
                
                
            }

        $mainElement .= '</div>';

    $mainElement .= '</div>';

$mainElement .= '</div>';

echo $mainElement;