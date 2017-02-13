<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Mailer\Email;
use Cake\Mailer\MailerAwareTrait;


class ContactForm extends Form{
	
	use MailerAwareTrait;
	
	protected function _buildSchema(Schema $schema){
		return $schema->addField('name', 'string')
		->addField('email', ['type' => 'string'])
		->addField('body', ['type' => 'text']);
	}
	
	protected function _buildValidator(Validator $validator){
		return $validator->add('email', 'format', [
				'rule' => 'email',
				'message' => 'Une adresse email valide est requise',
		])->add('body', [
				'minLength' => [
					'rule' => ['minLength', 10],
					'message' => 'Votre message est trop court'
						],
				'maxLength' => [
					'rule' => ['maxLength', 200],
					'message' => 'Votre message est trop long'
				]		
		]);
	}
	
	protected function _execute(array $data){
		
		$this->getMailer('User')->send('contact', [$data]);
		return true;
	}
}