<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />


  <title>Agência busca certa</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
      <link rel="stylesheet" href="../framework-front-end/foundation5/css/foundation.css" />
    <script src="../framework-front-end/foundation5/js/modernizr.js"></script>

</head>
<body>
  <h2>Aproximando pessoas</h2>

<?php
//variaveis que recebe os dados do formulário
  $primeiro_nome = $_POST['primeironome'];
  $segundo_nome = $_POST['segundonome'];
  $email = $_POST['email'];
  $ultimo_lugar = $_POST['ultimolugar'];
  $ultimo_contato = $_POST['ultimocontato'];
  $qual_motivo = $_POST['motivo'];
  $descreva_pessoa = $_POST['descrevapessoa'];
  $liga_pessoa = $_POST['ligapessoa'];
  $reencontro_desfavoravel = $_POST['reencontrodesfavoravel'];
  $mais = $_POST['mais'];

  // abaixo no mysqli_connect tem a seguintes informações: endereço do servidor, usuario, senha (vazia), nome do banco de dados.
  $dbc = mysqli_connect('localhost', 'root', '', 'desencontrosdatabase')
    or die('Erro ao conectar ao MySQL server.'); //se algo der errado essa mensagem será enviada.

//A query SQL INSERT adiciona dados ao banco
  $query = "INSERT INTO desencontros (primeiro_nome, segundo_nome, email, ultimo_lugar, ultimo_contato, " .
    "qual_motivo, descreva_pessoa, liga_pessoa, reencontro_desfavoravel, mais) " .
    "VALUES ('$primeiro_nome', '$segundo_nome', '$email', '$ultimo_lugar', '$ultimo_contato', '$qual_motivo', " .
    "'$descreva_pessoa', '$liga_pessoa', '$reencontro_desfavoravel', '$mais')";

//comunicação com o servidor MYSQL. O código armazenado na variável $query é SQL.
  $result = mysqli_query($dbc, $query)
    or die('Erro na procura do database.');

//fechando a conexão
  mysqli_close($dbc);

  echo 'Obrigado por enviar sua solicitação.<br />';
  echo 'Seu nome: ' . $primeiro_nome . ' ' . $segundo_nome . '<br />';
  echo 'Seu email: ' . $email . '<br />';
  echo 'Ultimo lugar que se encontraram ' . $ultimo_lugar;
  echo ', e o ultimo contato foi ' . $ultimo_contato . '.'.'<br />';
  echo 'O motivo do afastamento: ' . $qual_motivo . '<br />';
  echo 'Descreva a pessoa: ' . $descreva_pessoa . '<br />';
  echo 'Sua ligação com a pessoa: ' . $liga_pessoa . '<br />';
  echo 'Deseja reencontrá-la mesmo e situação desfavorável? ' . $reencontro_desfavoravel . '<br />';
  echo 'Mais a acrencentar: ' . $mais;

?>

</body>
</html>
