<?
$nome      = $_POST['nome'];
$email     = $_POST['email'];
$telefone  = $_POST['telefone'];
$msg       = $_POST['texto'];

$html  = '<p>Uma nova mensagem foi enviado a você do formulário de Contato<p>';
$html .= '<ul>';
$html .= '  <li><b>Nome:</b> ' . $nome . '</li>';
$html .= '  <li><b>E-mail:</b> ' . $email . '</li>';
$html .= '  <li><b>Telefone:</b> ' . $telefone . '</li>';
$html .= '  <li><b>Mensagem:</b> ' . $msg . '</li>';
$html .= '</ul>';

$mail = new nbrMail();
if($mail->SendTemplate($html, 'Mensagem do site - ' . $nome . ' (' . $email . ')', 'tiago@novabrazil.art.br', null, null, 'tihh.gon@gmail.com')){
  $msg  = 'Sua mensagem foi enviada a nossa equipe com sucesso.<br>Embreve entraremos em contato.';

} else 
  $msg .= 'Ocorreu um pequeno erro técnico ao tentar enviar esta mensagem a nossa equipe.';

echo($msg);
?>