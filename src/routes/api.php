<?php

Route::get('tracker', 'SpecimenTracker@tracker')->name('tracker');
Route::get('print-tracker/{id}', 'ILabAfrica\SpecimenTracker\Controllers\SpecimenTracker@print');