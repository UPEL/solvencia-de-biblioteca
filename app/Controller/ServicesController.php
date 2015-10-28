<?php class ServicesController extends AppController {

	public function beforeFilter(){
		$this->{'Auth'}->allow(array(
			'librarySolvency'
		));
		parent::beforeFilter();
	}

	public function librarySolvency(){


	}

}
