<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventPhotoRequest;
use App\Models\Event;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventPhotoController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|string
     */
    public function index(Event $event)
    {
        // $event = \App\Models\Event::find($event);
        return view('admin.events.photos', compact('event'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventPhotoRequest $request, Event $event)
    {
        // $uploadPhotos = [];

        // iterar nestas fotos e realizar o upload
//        foreach ($request->file('photos') as $photo) {
//            $uploadPhotos[] = ['photo'=> $photo->store('events/photos', 'public')];
//        }
        $uploadPhotos = $this->multipleFilesUpload($request->file('photos'), 'events/photos','photo');

        // salvar as referências para o evento em questão
        // $event = \App\Models\Event::find($event);

        $event->photos()->createMany($uploadPhotos);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event, $photo)
    {
        $photo = $event->photos()->find($photo);

        if (!$photo) {
            return redirect()->route('admin.events.index');
        }

        if (Storage::disk('public')->exists($photo->photo)){
            Storage::disk('public')->delete($photo->photo);
        }
        // Remover da base e remover do diretorio
        $photo->delete();

        return redirect()->back();
    }
}
