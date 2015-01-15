<?php
namespace PhalconRest\Controllers;
use \PhalconRest\Exceptions\HTTPException;
use App\Models\Slide;

class ExampleController extends FeaturedRESTController {

	/**
	 * Sets which fields may be searched against, and which fields are allowed to be returned in
	 * partial responses. 
	 * @var array
	 */
	protected $allowedFields = array(
		'search' => array('id','controller', 'path', 'templateUrl'),
		'partials' => array('id', 'controller', 'path', 'templateUrl')
	);

	public function get(){
//		if($this->isSearch){
//			$results = $this->search('\App\Models\Slide');
//		} else {
//            $results = Slide::find();
//        }
        $results = $this->search('\App\Models\Slide');
		return $this->respond($results);
	}

	public function getOne($id){
		$id--;
		return Slide::findFirstByid($id);
	}

	public function post(){
		return array('Post / stub');
	}

	public function delete($id){
		return array('Delete / stub');
	}

	public function put($id){
		return array('Put / stub');
	}

	public function patch($id){
		return array('Patch / stub');
	}

}