<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

class UserMailer extends Mailer
{
	public function welcome($user)
	{
		$this
		->sender('isabelle.kinet79@gmail.com')
		->to($user->email)
		->subject(sprintf('Welcome %s', $user->username))
		//->template('welcome_mail') // Par défaut le template avec le même nom que le nom de la méthode est utilisé.
		->layout('custom');
	}

	public function contact()
	{
		$this
		->to('isabelle.kinet79@gmail.com')
		->subject('Problème de connexion');
	}
}