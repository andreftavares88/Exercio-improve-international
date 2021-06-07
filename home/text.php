<?php

  if(count(get_included_files()) ==1){
    exit("Direct access not permitted."); 
  }

  $html .= '<div class="container">
              <h1> Detalhes / Anexos </h1>
              <p>Conexão à BD:</p>
              <span>$dbServerName = "cp1.improveinternational.pt";</span><br>
              <span>$dbUsername = "improve_test_user";</span><br>
              <span>$dbPassword = "cyXiJ9?pL47&";</span><br>
              <span>$dbName = "improve_test_1";</span><br><br>
              
              <h2>Tarefa 1</h2>
              <p>Criação de formulário, com recolha de dados, nomeadamente, nome, número de contacto, email, checkbox para confirmar o consentimento do armazenamento dos mesmos. Todos os valores dos campos são de preenchimento obrigatório e a informação acima referida, bem como a data e hora da submissão, deverão ser guardadas na tabela “Tarefa_1” da base de dados;</p><br>
              
              <h2>Tarefa 2</h2>
              <p>Apresentação de dados (de forma visualmente apelativa) presentes na tabela “Tarefa_2” da base de dados, de forma semelhante à apresentada na imagem “Tarefa_2_img” enviada em anexo no email. (A utilização dos icons é totalmente opcional e poderá ser substituído por simples caracteres);</p><br>

              <h2>Tarefa 3</h2>
              <p>Criação de uma página que permita o download de um excel básico com a informação presente na tabela “Tarefa_3”, apresentando apenas as tabelas presentes na mesma.</p><br>';

  echo $html; 