<?php

namespace App\Utilities;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait UploadedImage {

    public $inputName = "avatar";
    public $filePath  = null;

    public function avatarWasUploaded(Request $request): bool {
        return $request->hasFile($this->inputName) && $request->file($this->inputName)->isValid();
    }

    public function saveAvatarFrom(Request $request, string $path = ""): void {
        if ($this->avatarWasUploaded($request)) {

            $this->deleteAvatar($path);

            $this->saveAvatar($request->file($this->inputName));
            if (strcmp($this->inputName, "avatar") != 0) {
                $this->inputName = "avatar";
            }
        }
    }

    public function saveAvatar(UploadedFile $file): void {
        $this->filePath = $file->storeAs(
            'avatars',
            $this->defaultName($file)
        );
    }

    public function defaultName(UploadedFile $file): string {
        return sprintf('avatar-%s.%s', Str::uuid(), $file->extension());
    }

    public function deleteAvatar(string $path): void {
        if ($this->existsFile($path)) {
            Storage::delete($path);
        }
    }

    public function existsFile(string $path): bool {
        return $path != "" && Storage::exists($path);
    }

}
