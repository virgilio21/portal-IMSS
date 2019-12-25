<?php

namespace App\Exports;

use App\Group;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class GroupsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $groups = [];

    public function __construct($groups = null){
        $this->groups = $groups;
    }
    
    public function collection()
    {
        
        return $this->groups ?: Group::all();
    }
}
