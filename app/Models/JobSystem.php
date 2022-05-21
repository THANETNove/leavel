<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSystem extends Model
{
    use HasFactory;
    protected $fillable = [
        'username',
        'phone',
        'version',
        'imei',
        'screenUnlock',
        'riskid',
        'riskCalculator',
        'another',
        'calculatedSystem',
        'calculatedTechnician',
        'priceJob',
        'notifiedWaste',
        'color',
        'device ',
        'pickUpDate',
        'checkbox1',
        'checkbox2',
        'checkbox3',
        'checkbox4',
        'checkbox5',
        'checkbox6',
        'checkbox7', 
        'checkbox8',
        'another2',
        'accessoryBrand',
        'accessoryDeviceModel',
        'accessoryModel',
        'statusJob',
        'receiptCode',
        'insurance',
        'commentBranch',
        'commentMend',
        'priceModel',
        'priceSum',
    ];
}
