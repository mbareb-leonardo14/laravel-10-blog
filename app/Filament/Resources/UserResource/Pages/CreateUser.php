<?php

namespace App\Filament\Resources\UserResource\Pages;

use Filament\Pages\Actions;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['email_verified_at'] = Carbon::now();
        $data['password'] = bcrypt($data['password']);

        return $data;
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['email_verified_at'] = Carbon::now();
        /** @var \App\Models\User $user */
        $user = parent::handleRecordCreation($data);
        $user->assignRole('admin');

        return $user;
    }
}
