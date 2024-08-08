<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Repository\RoomRepository;
use App\Repository\RoomTypeRepository;
use DomainException;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;

class RoomAdminController extends Controller
{
    private const VIEW_BASE_PATH = 'admin/room/';
    private const BASE_URL = '/admin/rooms';
    private const IMAGE_PATH = 'photos/rooms';

    public function __construct(
        private RoomRepository $roomRepository,
        private RoomTypeRepository $roomTypeRepository
    ) {
    }

    public function list(): View
    {
        $data = $this->roomRepository->findAll(withRelations: true);

        return view(self::VIEW_BASE_PATH.'/list', [
            'data' => $data,
        ]);
    }

    public function store(Request $request): View|RedirectResponse
    {
        if (false === $request->isMethod('post')) {
            return $this->redirectToAddView();
        }

        $exists = Room::where('name', $request->input('name'))->first();
        if (null !== $exists) {
            $request->session()->flash('error', 'Sala já existe');

            return $this->redirectToAddView();
        }

        try {
            $uuid = Uuid::uuid4()->toString();
            $file = $request->file('image');
            if (null === $file) {
                throw new DomainException('Imagem é obrigatória.');
            }

            if (false === in_array($file->getMimeType(), ['image/png', 'image/jpeg'])) {
                throw new DomainException('Arquivo inválido.');
            }

            $imageUrl = $this->saveImageFile($file, $uuid);
            $roomType = $this->roomTypeRepository->find((int) $request->input('room_type_id'));

            $object = new Room();
            $object->id = $uuid;
            $object->name = $request->input('name');
            $object->room_type_id = $roomType->id;
            $object->image_url = $imageUrl;

            $this->roomRepository->save($object);
        } catch (DomainException $exception) {
            $request->session()->flash('error', $exception->getMessage().' São permitidos [png, jpeg]');

            return $this->redirectToAddView();
        } catch (Exception) {
            $this->removeImageFile($object);
            $request->session()->flash('error', 'Houve um erro ao criar nova sala');

            return $this->redirectToAddView();
        }

        $request->session()->flash('success', 'Nova Sala inserida');

        return redirect(self::BASE_URL);
    }

    private function redirectToAddView(): View
    {
        $data = $this->roomTypeRepository->findAll();

        return view(self::VIEW_BASE_PATH.'add', [
            'data' => $data,
        ]);
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $room = $this->roomRepository->find($id);
            $this->removeImageFile($room);
            $this->roomRepository->remove($room->id);
            session()->flash('success', 'Sala removida');
        } catch (Exception) {
            session()->flash('error', 'Houve um erro ao excluir a sala');
        }

        return redirect(self::BASE_URL);
    }

    public function edit(Request $request, string $id): View|RedirectResponse
    {
        if (false === $request->isMethod('post')) {
            $data = $this->roomRepository->find($id);
            $roomTypes = $this->roomTypeRepository->findAll();

            return view(self::VIEW_BASE_PATH.'edit', [
                'data' => $data,
                'roomTypes' => $roomTypes,
            ]);
        }

        try {
            $object = $this->roomRepository->find($id);
            $file = $request->file('image');
            if ($file) {
                $this->removeImageFile($object);
                $imageUrl = $this->saveImageFile($file, $object->id);
                $object->image_url = $imageUrl;
            }

            $object->name = $request->input('name');
            $object->room_type_id = $request->input('room_type_id');

            $this->roomRepository->save($object);

            $request->session()->flash('success', 'Sala atualizada');
        } catch (Exception $exception) {
            $request->session()->flash('error', 'Houve um erro ao salvar a sala. '.$exception->getMessage());
        }

        return redirect(self::BASE_URL);
    }

    private function saveImageFile(UploadedFile $file, string $id): string
    {
        if (false === in_array($file->getMimeType(), ['image/png', 'image/jpeg'])) {
            throw new DomainException('Arquivo inválido');
        }

        $imagePath = self::IMAGE_PATH.'/'.$id;
        $filename = strtolower($file->getClientOriginalName());
        $file->move(public_path().'/'.$imagePath, $filename);

        return url("/{$imagePath}/{$filename}");
    }

    private function removeImageFile(Room $room): bool
    {
        $fileDirectoryPath = public_path(self::IMAGE_PATH.'/'.$room->id);
        if (false === File::exists($fileDirectoryPath)) {
            return false;
        }

        return File::deleteDirectory($fileDirectoryPath);
    }
}
