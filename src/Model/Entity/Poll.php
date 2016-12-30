<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\BU\MusicServiceAgent;

/**
 * Poll Entity
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\Time $begindate
 * @property \Cake\I18n\Time $enddate
 * @property int $status
 * @property int $musicstyleid
 */
class Poll extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
    
    public $musicGenreFullName;
    public $sumVotes;
    
    // ici fonction pour un track spécifique. l'attribut virtuel qui pourra ensuite être utilisé est $poll->music_genre_name
    public function _getMusicGenreName(){
    	$musicGenre = (new MusicServiceAgent())->getMusicGenre($this->_properties['musicstyleid']);
    	if($musicGenre != null){
    		return $musicGenre->getName();
    	}
    	else {
    		return 'inconnu';
    	}
    }
}
