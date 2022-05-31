<?php

use App\Admin\Controllers\BudgetCategoryController;
use App\Admin\Controllers\BudgetController;
use App\Admin\Controllers\BudgetItemController;
use App\Admin\Controllers\BudgetTransactionController;

Route::middleware('auth')->group(function () {
    Route::post('budget/{budget}/transactions', [BudgetTransactionController::class, 'store'])->name('budget-transactions.store');
    Route::get('budget/{budget}/categories/create', [BudgetCategoryController::class, 'create'])->name('budget-category.create');
    Route::patch('/categories/{category}', [BudgetCategoryController::class, 'update'])->name('budget-category.update');
    Route::post('budget/{budget}/categories', [BudgetCategoryController::class, 'store'])->name('budget-category.store');
    Route::delete('/categories/{category}', [BudgetCategoryController::class, 'delete'])->name('budget-category.delete');
    Route::get('/categories/{category}/items/create', [BudgetItemController::class, 'create'])->name('budget-item.create');
    Route::post('/categories/{category}/items', [BudgetItemController::class, 'store'])->name('budget-item.store');
    Route::get('items/{item}/edit', [BudgetItemController::class, 'edit'])->name('budget-item.edit');
    Route::patch('/items/{item}', [BudgetItemController::class, 'update'])->name('budget-item.update');

    Route::get('budget', [BudgetController::class, 'index'])->name('budget.index');
    Route::get('budget/create', [BudgetController::class, 'create'])->name('budget.create');
    Route::post('budget/store', [BudgetController::class, 'store'])->name('budget.store');
    Route::get('budget/{budget}/edit', [BudgetController::class, 'edit'])->name('budget.edit');
    Route::get('budget/{budget}', [BudgetController::class, 'show'])->name('budget.show');
    Route::patch('budget/{budget}', [BudgetController::class, 'update'])->name('budget.update');
    Route::delete('budget/{budget}', [BudgetController::class, 'delete'])->name('budget.destroy');
});
