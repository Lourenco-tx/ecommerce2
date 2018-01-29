<?php
   
   namespace Hcode;

    // Exibindo todos os erros e warnings para facilitar a identificação de erros
ini_set('display_errors', true);
error_reporting(E_ALL);

	use Rain\Tpl;

	class Mailer 
	{
		const USERNAME = "lourenco.tx@gmail.com";
		const PASSWORD = "etn14025";
		const NAME_FROM = "Hcode Store";

		private $mail;

		public function __construct($toAddress, $toName, $subject, $tplName, $data = array()) 
		{
			$config = array(		    
		    "tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
		    "cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
		    "debug"         => false
			);

			Tpl::configure( $config );

			$tpl = new Tpl;

			foreach ($data as $key => $value) {
				$tpl->assign($key, $value);
			}

			$html = $tpl->draw($tplName, true);

			$tpl->tpl = new Tpl();
			
			$this->mail = new \PHPMailer;
			
			$this->mail->SMTPOptions = array(
			    'ssl' => array(
			        'verify_peer' => false,
			        'verify_peer_name' => false,
			        'allow_self_signed' => true
			    )
			 );
			
			$this->mail->isSMTP();
			$this->mail->SMTPDebug = 1;
			$this->mail->Debugoutput = 'html';
			$this->mail->Host = 'smtp.gmail.com';
			$this->mail->port = 587;
			$this->mail->SMTPSecure = 'tls';
			$this->mail->SMTPAuth = 'true';	
			$this->mail->Username = Mailer::USERNAME;
			$this->mail->Password = Mailer::PASSWORD;
			$this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

			//$this->mail->addAddress($toAddress,$toName);
			$this->mail->addAddress('lourenco.tx@gmail.com','Lourenco');
			$this->mail->Subject = $subject;
			$this->mail->msgHTML($html);				
			$this->mail->AltBody = 'This is Message Body';
		
		}

		public function send()
		{
			return $this->mail->send();
		}

}
			
?>