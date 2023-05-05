<?php

use App\Enums\SupportStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\{SupportController};

//Route::get('', [])->name('');

/*delete */
Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
/* Atualizar informações */
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
/* Editar dúvida */
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
/*formulário de <cadastro>*/
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
/* ver * interações do suporte */
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
/* Submit formulário */
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
/* listagem */
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

Route::get('/contato', [SiteController::class, 'contact']);

Route::get('/', function () {
    return view('welcome');
});




