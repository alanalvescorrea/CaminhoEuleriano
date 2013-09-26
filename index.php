<?php

// retorna false se não achar ou retorna o numero da linha se achar
function pesquisa($arquivo, $palavra) {
    $file = fopen($arquivo, 'r');
    $achou = false;
    $linha_count = 0;
    while (($linha = fgets($file)) and ($achou == false)) {
        $linha_count++;
        if (stripos($linha, $palavra) !== false)
            $achou = $linha_count;
    }
    fclose($file);
    return $achou;
}
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <script>
            $(document).ready(function() {
                $('#windowTitleDialog').bind('show', function() {
                    document.getElementById("xlInput").value = document.title;
                });
            });
            function closeDialog() {
                $('#windowTitleDialog').modal('hide');
            }
            ;
            function okClicked() {
                document.title = document.getElementById("xlInput").value;
                closeDialog();
            }
            ;
        </script>
        <style>
            .divDemoBody  {
                width: 60%;
                margin-left: auto;
                margin-right: auto;
                margin-top: 100px;
            }
            .divDemoBody p {
                font-size: 18px;
                line-height: 140%;
                padding-top: 12px;
            }
            .divDialogElements input {
                font-size: 18px;
                padding: 3px; 
                height: 32px; 
                width: 500px; 
            }
            .divButton {
                padding-top: 12px;
            }
        </style>
        <!-- JQUERY --> <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> <script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script> <!-- TWITTER BOOTSTRAP CSS --> <link href="css/bootstrap.css" rel="stylesheet" type="text/css" /> <!-- TWITTER BOOTSTRAP JS --> <script src="js/bootstrap.min.js"></script>

        <meta charset="UTF-8">

        <title></title>
    </head>
    <body>
        <!--Sorry About the Heavy CSS But its neaded for the components make it external for quicker load time :) -->

        <div class="container">
            <div class="row">
                <div class="span12 offset0 well-large">
                    <legend>Desafio Euleriano</legend>

                    <div id="windowTitleDialog" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="windowTitleLabel" aria-hidden="true">
                        <div class="modal-header">
                            <a href="#" class="close" data-dismiss="modal">&times;</a>
                            <h3>Sobre</h3><br>
                            Aplicativo desenvolvido para a disciplina de Inteligência Artificial, no curso de Licenciatura em Informática 2013/2 - FACOS<br>
                            Acadêmicos: Alan Correa, Luis Carvalho<br>
                            Professor: Andrio Pinto dos Santos<br>
                        </div>

                        <div class="modal-footer">
                            <br><a href="#" class="btn btn-primary" onclick="closeDialog()">OK</a>
                        </div>
                    </div>
                    <div class="divButtons">
                        <a data-toggle="modal" href="#windowTitleDialog" class="btn btn-primary btn-mini">Sobre</a><br>
                    </div>
                    <!-- -->
                    <br>
                    <div class="well">

                        <a class="close" data-dismiss="alert" href="#"></a>
                        <center><img src="casinha_1.gif"></center><br>
                        <p align="justify">Problema do desenho da casa:
                            Uma criança, desenvolveu o desenho abaixo e disse à professora que o fez, colocando a 
                            ponta do lápis numa das bolinhas, sem retirar o lápis do papel, nem retroceder nos 
                            caminhos já percorridos, traçando cada linha uma única vez.</p>
                        <p align="justify">A professora sem acreditar, achou que a criança estava trapaceando, pois não encontrou 
                            nenhuma sequência que pudesse lhe levar a resolução encontrada pelo aluno. 
                            E você, concorda com esta professora? </p>
                        <p align="justify">Se você desconcorda com esta professora, tente!</p>
                        <?php
                        $hidden = $_POST['campo_hidden'];

                        if ($hidden == 1) {

                            /* ---------------------------REALIZANDO OS TESTES---------------------------------------- */

                            $caminho1 = mysql_real_escape_string(strtoupper($_POST['1']));
                            $caminho2 = mysql_real_escape_string(strtoupper($_POST['2']));
                            $caminho3 = mysql_real_escape_string(strtoupper($_POST['3']));
                            $caminho4 = mysql_real_escape_string(strtoupper($_POST['4']));
                            $caminho5 = mysql_real_escape_string(strtoupper($_POST['5']));
                            $caminho6 = mysql_real_escape_string(strtoupper($_POST['6']));
                            $caminho7 = mysql_real_escape_string(strtoupper($_POST['7']));
                            $caminho8 = mysql_real_escape_string(strtoupper($_POST['8']));
                            $caminho9 = mysql_real_escape_string(strtoupper($_POST['9']));
                            $caminho10 = mysql_real_escape_string(strtoupper($_POST['10']));
                            $caminho11 = mysql_real_escape_string(strtoupper($_POST['11']));

                            $soma_caminhos = $caminho1 + $caminho2 + $caminho3 + $caminho4 + $caminho5 + $caminho6 + $caminho7 + $caminho8 + $caminho9 + $caminho10 + $caminho11;

                            echo '<hr>Caminho percorrido: ' . $caminho1, $caminho2, $caminho3, $caminho4, $caminho5, $caminho6, $caminho7, $caminho8, $caminho9, $caminho10, $caminho11 . '<br>';
                            echo 'Soma dos caminhos: ' . $soma_caminhos . '<BR>';
                            if ($caminho1 != $caminho11) {
                                if ($caminho1 == 5 || $caminho1 == 6) {
                                    if ($caminho11 == 5 || $caminho11 == 6) {
                                        if ($soma_caminhos == 41) {
                                            $documento = "$caminho1$caminho2$caminho3$caminho4$caminho5$caminho6$caminho7$caminho8$caminho9$caminho10$caminho11\r\n";

                                            //PESQUISA NO BANCO
                                            if ($linha = pesquisa('base_conhecimento.txt', $documento)) {
                                                //echo 'Você acertou, mas essa resposta já está na base de conhecimento, na linha: ' . $linha;
                                                $comparacao = 'igual';
                                            }
                                            //TERMINA PESQUISA
                                            if (!$comparacao) {
                                                //Agora atribuímos tudo para uma variável só.
                                                //Aqui você coloca o nome do arquivo que será gravado
                                                $arquivo = "base_conhecimento.txt";

                                                //Abrimos o arquivo que será gravado.
                                                $abrir = fopen($arquivo, "a+", 0);

                                                //Gravamos no arquivo
                                                $gravar = fwrite($abrir, $documento);

                                                //Testa se foi gravado
                                                if ($gravar) {
                                                    echo'<br><span class="label label-success">:) Legal, você acertou!</span>';
                                                    echo '<br><br><a href="index.php">Oba...quero jogar novamente!</a>';
                                                } else {
                                                    echo"<br>Não gravado!";
                                                }
                                            } else /* REGISTRO EXISTENTE NA BASE */ {
                                                echo '<br>';
                                                echo '<span class="label label-warning">Você acertou, mas essa resposta já está na base de conhecimento, na linha: ' . $linha . '</span>';
                                                echo '<br><br><a href="index.php">Ah não! Quero tentar novamente!</a>';
                                            }
                                        } else /* SOMA DOS CAMINHOS DIFERENTE DE 41 */ {
                                            echo '<br>';
                                            echo '<span class="label label-important">:( Ops, Não foi dessa vez!</span>';
                                            echo '<br><br><a href="index.php">Oba...quero jogar novamente!</a>';
                                        }
                                    } else /* CAMINHO 11 NÃO COMEÇAM POR 5 E NEM POR 6 */ {
                                        echo '<br>';
                                        echo '<span class="label label-important">:( Ops, Não foi dessa vez!</span>';
                                        echo '<br><br><a href="index.php">Oba...quero jogar novamente!</a>';
                                    }
                                } else /* CAMINHO 1 NÃO COMEÇAM POR 5 E NEM POR 6 */ {
                                    echo '<br>';
                                    echo '<span class="label label-important">:( Ops, não foi dessa vez!</span>';
                                    echo '<br><br><a href="index.php">Oba...quero jogar novamente!</a>';
                                }
                            } else /* CAMINHO 1 E 11 REPETEN */ {
                                echo '<br>';
                                echo '<span class="label label-important">:( Ops, Há caminhos repetidos!</span>';
                                echo '<br><br><a href="index.php">Oba...quero jogar novamente!</a>';
                            }
                        } else /* else do $hidden == 1 */ {
                            echo '<br>Vamos lá...tente!';
                        }
                        ?>


                    </div>
                    <form method="POST" action="" accept-charset="UTF-8">
                        <input name="campo_hidden" type="hidden" id="campo_hidden" value="1">
                        <input type="text"  class="span2" name="1" placeholder="caminho 1" required="">
                        <input type="text"  class="span2" name="2" placeholder="caminho 2" required="">
                        <input type="text"  class="span2" name="3" placeholder="caminho 3" required="">
                        <input type="text"  class="span2" name="4" placeholder="caminho 4" required="">
                        <input type="text"  class="span2" name="5" placeholder="caminho 5" required="">
                        <input type="text"  class="span2" name="6" placeholder="caminho 6" required="">
                        <input type="text"  class="span2" name="7" placeholder="caminho 7" required="">
                        <input type="text"  class="span2" name="8" placeholder="caminho 8" required="">
                        <input type="text"  class="span2" name="9" placeholder="caminho 9" required="">
                        <input type="text"  class="span2" name="10" placeholder="caminho 10" required="">
                        <input type="text"  class="span2" name="11" placeholder="caminho 11" required="">

                        <br> <button type="submit" name="submit" class="btn btn-success">Enviar Solução</button>
                        <button type="reset" value="Reset!" class="btn btn-info">Limpar</button><br>



                    </form>    
                </div>
            </div>
        </div>
    </body>
</html>