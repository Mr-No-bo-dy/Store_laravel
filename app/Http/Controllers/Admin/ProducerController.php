<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producer;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $producers = Producer::withTrashed()->get();

        return view('admin.producer.index', compact('producers'));
    }

    /**
     * Display the specified resource.
     */
    public function show($idProducer)
    {
        $producer = Producer::findOrFail($idProducer);

        return view('admin.producer.show', compact('producer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.producer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];
        Producer::create($data);

        return redirect()->route('producers');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($idProducer)
    {
        $producer = Producer::findOrFail($idProducer);

        return view('admin.producer.update', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $idProducer = $request->post('id');
        $setProducerData = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];

        $producer = Producer::findOrFail($idProducer);
        $producer->fill($setProducerData);
        if ($producer->isDirty()) {
            $producer->save();
        }

        return redirect()->route('producers');
    }

    /**
     * Soft-Delete the specified resource in storage.
     */
    public function delete(Request $request)
    {
        if ($request->has('deleteProducer')) {
            $idProducer = $request->post('id');
            Producer::findOrFail($idProducer)->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource in storage.
     */
    public function restore(Request $request)
    {
        if ($request->has('restoreProducer')) {
            $idProducer = $request->post('id');
            Producer::onlyTrashed()->findOrFail($idProducer)->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource in storage.
     */
    public function destroy(Request $request)
    {
        if ($request->has('destroyProducer')) {
            $idProducer = $request->post('id');
            Producer::withTrashed()->findOrFail($idProducer)->forceDelete();
        }

        return back();
    }
}
