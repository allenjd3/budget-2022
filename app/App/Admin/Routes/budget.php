<?php

use App\Admin\Controllers\BudgetCategoryController;
use App\Admin\Controllers\BudgetController;

Route::middleware('auth')->group(function () {
    Route::get('budget/{budget}/categories/create', [BudgetCategoryController::class, 'create'])->name('budget-category.create');
    Route::post('budget/{budget}/categories', [BudgetCategoryController::class, 'store'])->name('budget-category.store');

    Route::get('budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('budget/store', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('budget/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::get('budget/{budget}', [BudgetController::class, 'show'])->name('budget.show');
    Route::patch('budget/{budget}', [BudgetController::class, 'update'])->name('budget.update');
    Route::delete('budget/{budget}', [BudgetController::class, 'delete'])->name('budget.destroy');
});
