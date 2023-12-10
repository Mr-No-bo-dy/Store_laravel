<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'producers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
    ];

//    /**
//     * Show all Producers.
//     */
//    public function readProducers()
//    {
//        return self::withTrashed()->get();
//    }

//    /**
//     * Show specified Producer.
//     */
//    public function showProducer($idProducer)
//    {
//        return self::findOrFail($idProducer);
//    }

//    /**
//     * Create the Producer in storage.
//     */
//    public function createProducer($data)
//    {
//        return self::create($data);
//    }

//    /**
//     * Update the Producer in storage.
//     */
//    public function updateProducer($idProducer, $data)
//    {
//        $producer = self::findOrFail($idProducer);
//
//        return $producer->update($data);
//    }

//    /**
//     * Soft-Delete the Producer in storage.
//     */
//    public function deleteProducer($idProducer)
//    {
//        $producer = self::find($idProducer);
//        $producer->delete();
//    }

//    /**
//     * Restore the Producer in storage.
//     */
//    public function restoreProducer($idProducer)
//    {
//        $producer = self::onlyTrashed()->find($idProducer);
//        $producer->restore();
//    }

//    /**
//     * True Delete the Producer from storage.
//     */
//    public function destroyProducer($idProducer)
//    {
//        $producer = self::withTrashed()->find($idProducer);
//        $producer->forceDelete();
//    }
}
