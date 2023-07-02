<?php

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Blade::directive('livewire', function ($expression) {
    return "<?php echo (new App\Livewire)->initialRender({$expression}); ?>";
});
Route::post('/livewire', function () {
    $component = (new App\Livewire())->fromSnapshot(request('snapshot'));

    if ($method = request('callMethod')) {
        (new App\Livewire())->callMethod($component, $method);
    }

    [$html, $snapshot] = (new App\Livewire())->toSnapshot($component);

    return [
        'html' => $html,
        'snapshot' => $snapshot,
    ];
});
