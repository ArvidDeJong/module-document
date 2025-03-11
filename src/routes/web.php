<?php


use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'cms', 'middleware' => ['auth:staff', 'web']], function () {

    $modules = collect(cms_config('manta')['modules']);


    $item = $modules->firstWhere("name", 'document');
    $name = isset($item['routename']) ? $item['routename'] : 'document';

    Route::get("/{$name}", Darvis\ModuleDocument\Livewire\Document\DocumentList::class)->name('document.list');
    Route::get("/{$name}/toevoegen", Darvis\ModuleDocument\Livewire\Document\DocumentCreate::class)->name('document.create');
    Route::get("/{$name}/aanpassen/{document}", Darvis\ModuleDocument\Livewire\Document\DocumentUpdate::class)->name('document.update');
    Route::get("/{$name}/lezen/{document}", Darvis\ModuleDocument\Livewire\Document\DocumentRead::class)->name('document.read');
    Route::get("/{$name}/bestanden/{document}", Darvis\ModuleDocument\Livewire\Document\DocumentUpload::class)->name('document.upload');

    Route::get("/{$name}/categorieen", Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatList::class)->name('documentcat.list');
    Route::get("/{$name}/categorieen/toevoegen", Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatCreate::class)->name('documentcat.create');
    Route::get("/{$name}/categorieen/aanpassen/{documentcat}", Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatUpdate::class)->name('documentcat.update');
    Route::get("/{$name}/categorieen/lezen/{documentcat}", Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatRead::class)->name('documentcat.read');
    Route::get("/{$name}/categorieen/bestanden/{documentcat}", Darvis\ModuleDocument\Livewire\Documentcat\DocumentcatUpload::class)->name('documentcat.upload');
});
