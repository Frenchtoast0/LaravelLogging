<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /*possible model hooks (Eloquent/Concerns/HasEvents): 
                'retrieved', 'creating', 'created', 'updating', 'updated',
                'saving', 'saved', 'restoring', 'restored', 'replicating',
                'deleting', 'deleted', 'forceDeleted',
    */

    protected static function booted()
    {   
        static::created(function($model)
        {
            $model->activityLogs()->save(new ActivityLog([
                'type' => 'Data',
                'user' => 'User',//\Auth::user()->name,
                'description' => 'Created new ' . get_class($model)
            ]));

            error_log('created ' . $model->id);
        });

        static::deleting(function($model)
        {
            $model->activityLogs()->save(new ActivityLog([
                'type' => 'Data',
                'user' => 'User',//\Auth::user()->name,
                'description' => 'Deleted ' . get_class($model) . ' ' . $model->id
            ]));

            error_log('deleting ' . $model->id);
        });

        static::updated(function($model)
        {
            error_log('updated ' . $model->id);
        });

        //Doesn't work as there's no way to differentiate an index 
        //view vs a specific view
        // static::retrieved(function($model)
        // {
        //     error_log('retrieved ' . $model->id);
        // });
    }
}