<?php

namespace App\Models\HumanResources\Patients;

use App\Helpers\UploadHelper;
use App\Paciente;
use Illuminate\Database\Eloquent\Model;

class PatientDocument extends Model
{
    const DEFAULT_PATH = 'pacient_documents';
    protected $fillable = [
        'idpaciente',
        'name',
        'description',
        'link'
    ];

    // ******************** FUNCTIONS ****************************
    public function getLink()
    {
        return asset( 'uploads/' . self::DEFAULT_PATH . '/' . $this->attributes['link'] );
    }

    public function getDocumentoThumb()
    {
        return UploadHelper::getFullPath( self::DEFAULT_PATH ) . $this->attributes['link'];
    }
    // ******************** BELONGSTO ****************************
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'idpaciente');
    }
    // ******************** HASMANY **************************
}
