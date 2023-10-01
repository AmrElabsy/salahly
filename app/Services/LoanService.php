<?php

namespace App\Services;

use App\Models\Loan;
use Illuminate\Database\Eloquent\Model;

class LoanService implements IResourceService
{
    
    public function store( $data )
    {
        $loan = new Loan();
        
        $loan->quantity = $data['quantity'];
        $loan->month = $data['month'];
        $loan->user_id = $data['user_id'];
        
        $loan->save();
        
        return $loan;
    }
    
    public function update( $data, Model $resource )
    {
        $resource->quantity = $data['quantity'];
        $resource->month = $data['month'];
        $resource->user_id = $data['user_id'];
        
        $resource->save();
        
        return $resource;
    }
    
    public function delete( Model $resource )
    {
        // TODO: Implement delete() method.
    }
}