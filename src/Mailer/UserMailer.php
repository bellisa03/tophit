<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;
use Cake\Mailer\Email;

class UserMailer extends Mailer
{
	public function welcome($user)
	{
		$this
		->transport('gmail')
		->emailFormat('html')
		->attachments(['tophit.png' => ['file' => '../webroot/img/logo_tophit.png', 'contentId' => 'logo-id']])
		->to($user['email'])
		->subject(sprintf('Bienvenue sur la plateforme TopH.it, %s', $user['login']))
		->viewVars(['login' => $user['login'], 'help' => CONTACT])
		//->template: d'abord le template, ensuite le layout
		->template('welcome', 'default');
	}

	public function contact()
	{
		$this
		->to('kinet.isa@gmail.com')
		->subject('Problème de connexion');
	}
}