<?php

namespace App\Observers\HumanResources\Patients;

use App\Helpers\UploadHelper;
use App\Models\HumanResources\Patients\PatientImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientImageObserver {

	protected $request;

	public function __construct( Request $request ) {
		$this->request = $request;
	}
	/**
	 * Listen to the Provider created event.
	 *
     * @param PatientImage $patient_image
	 *
	 *
	 * @return void
	 */
	public function creating( PatientImage $patient_image ) {

	}


	/**
	 * Listen to the Client updating event.
	 *
     * @param PatientImage $patient_image
	 *
	 * @return void
	 */
	public function saving( PatientImage $patient_image ) {

	}

    /**
     * Listen to the Provider deleting event.
     *
     * @param PatientImage $patient_image
     *
     * @return void
     */
	public function deleting( PatientImage $patient_image ) {
        $up        = new UploadHelper();
        $up->remove( $patient_image->link, PatientImage::DEFAULT_PATH );
	}
}
