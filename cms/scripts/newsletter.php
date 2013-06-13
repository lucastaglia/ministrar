<?

$nome      = $_POST['nome'];
$email     = $_POST['email'];

$table = new nbrTablePost();
$table->table = 'cusEmails';
$table->AddFieldString('Nome', $nome);
$table->AddFieldString('Email', $email);
$table->AddFieldDateTime('DataCadastro', date('Y-m-d H:i:s'));
$table->Execute();

$msg = 'Seu e-mail foi adicionado com êxito ao nosso banco de dados.';
$msg = urlencode($msg);
$msg = base64_encode($msg);
header('location:' . $router->GetLink('mensagem/' . $msg));
?>