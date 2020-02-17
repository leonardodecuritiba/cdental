<?php

namespace App\Observers\HumanResources\Patients;

use App\Helpers\UploadHelper;
use App\Models\HumanResources\Patients\PatientDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientDocumentObserver {

	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}
	/**
	 * Listen to the Provider created event.
	 *
     * @param PatientDocument $patient_document
	 *
	 *
	 * @return void
	 */
	public function creating( PatientDocument $patient_document ) {

	}


	/**
	 * Listen to the Client updating event.
	 *
     * @param PatientDocument $patient_document
	 *
	 * @return void
	 */
	public function saving( PatientDocument $patient_document ) {

	}

    /**
     * Listen to the Provider deleting event.
     *
     * @param PatientDocument $patient_document
     *
     * @return void
     */
	public function deleting( PatientDocument $patient_document ) {
        $up        = new UploadHelper();
        $up->remove( $patient_document->link, PatientDocument::DEFAULT_PATH );
	}
}
