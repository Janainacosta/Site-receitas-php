<?php
    require ("conexao.php");
    
    function _getRanking( $user_id = null )
    {
        $sql = 'SELECT 
                `usuario`, `pontos` 
                FROM 
                `usuarios` ORDER BY `pontos` DESC';
        $query = mysql_query( $sql );
        // inicia o contador
        $cont = 0;

        while( $rows = mysql_fetch_row( $query ) )
        {
            $cont++;
            if( "$rows['0']" === "$user_id" )
            {
            return $cont;
            }
        }

        /* while( $rows = mysql_fetch_array( $query_pagina ) )
        {
            $ranking = _getRanking( $rows['id'] );
            echo $rows['nome'] . ' ranking ' . $ranking ;
        } */
    }
?>