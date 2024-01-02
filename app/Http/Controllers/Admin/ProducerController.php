<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Producer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProducerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $producers = Producer::withTrashed()->get();

        return view('admin.producer.index', compact('producers'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $idProducer
     * @return View
     */
    public function show(int $idProducer): View
    {
        $producer = Producer::findOrFail($idProducer);

        return view('admin.producer.show', compact('producer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $data = [
            'name' => $request->post('name'),
            'description' => $request->post('description'),
        ];
        Producer::create($data);

        return redirect()->route('admin.producer.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $idProducer
     * @return View
     */
    public function edit(int $idProducer): View
    {
        $producer = Producer::findOrFail($idProducer);

        return view('admin.producer.update', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
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

        return redirect()->route('admin.producer.index');
    }

    /**
     * Soft-Delete the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function delete(Request $request): RedirectResponse
    {
        if ($request->has('deleteProducer')) {
            $idProducer = $request->post('id');
            Producer::findOrFail($idProducer)->delete();
        }

        return back();
    }

    /**
     * Restore the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function restore(Request $request): RedirectResponse
    {
        if ($request->has('restoreProducer')) {
            $idProducer = $request->post('id');
            Producer::onlyTrashed()->findOrFail($idProducer)->restore();
        }

        return back();
    }

    /**
     * Delete the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->has('destroyProducer')) {
            $idProducer = $request->post('id');
            Producer::withTrashed()->findOrFail($idProducer)->forceDelete();
        }

        return back();
    }
}
