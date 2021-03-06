<?php


namespace App\Domain\Base\Users\Activities\DeviceType\Actions;


use App\Domain\Base\Users\Activities\DeviceType\DTO\DeviceTypeDTO;
use App\Domain\Base\Users\Activities\DeviceType\Model\DeviceType;
use Illuminate\Support\Facades\Auth;

class DeviceTypeStoreAction
{

    public static function execute(
        DeviceTypeDTO $deviceTypeDTO
    ){
        $deviceType = new DeviceType($deviceTypeDTO->toArray());
        $deviceType->created_by_user_id = Auth::id();
        $deviceType->save();
        return $deviceType;
    }
}
