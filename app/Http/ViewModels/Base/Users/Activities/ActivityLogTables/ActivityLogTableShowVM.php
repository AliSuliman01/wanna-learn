<?php


namespace App\Http\ViewModels\Base\Users\Activities\ActivityLogTables;

use App\Domain\Base\Users\Activities\ActivityLogTables\Model\ActivityLogTable;
use Illuminate\Contracts\Support\Arrayable;


class ActivityLogTableShowVM implements Arrayable
{

    private $logTableId;

    public function __construct($props)
    {
        $this->logTableId = $props['id'] ;
    }

    private function get_LogTable(){
        return ActivityLogTable::find($this->logTableId);
    }
    public function toArray(): array
    {
        return  $this->get_LogTable()->toArray();
    }
}
