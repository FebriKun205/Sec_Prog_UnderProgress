<?php

use App\Http\Controllers\Admin\ForumManagementControler;
use App\Http\Controllers\Forum\CommentController;
use App\Http\Controllers\Forum\CreateForumController;
use App\Http\Controllers\Forum\EditForumController;
use App\Http\Controllers\Forum\ForumController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Middleware\CheckIfAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Public routes (no authentication required)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authenticated routes
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Home route with logic to redirect based on user role (admin or regular user)
    Route::get('/home', function () {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Redirect based on role
        if (Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('forum');
        }
    })->name('home');

    // Admin routes (protected by CheckIfAdmin middleware)
    Route::middleware([CheckIfAdmin::class])->group(function () {
        // Admin dashboard
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

        // Forum management for admins
        Route::get('/admin/forum-management', [ForumManagementControler::class, 'index'])->name('forum-management');

        // User management for admins
        Route::get('/admin/user-management', [UserManagementController::class, 'index'])->name('user-management');
    });

    // User routes (accessible to both regular users and admins)
    Route::prefix('forum')->group(function () {
        // View all forums
        Route::get('/', [ForumController::class, 'index'])->name('forum');

        // Create a new forum (view page)
        Route::get('/create', [CreateForumController::class, 'index'])->name('forum.create');

        // Edit a forum (view page)
        Route::get('/edit'  , [EditForumController::class, 'index'])->name('forum.edit');
        // Route::get('/edit/{forumId}', [EditForumController::class, 'index'])->name('forum.edit');

        // Store a newly created forum
        Route::post('/store', [CreateForumController::class, 'store'])->name('forum.store');

        // View a specific forum along with its comments and replies
        Route::get('/{forumId}', [ForumController::class, 'show'])->name('forum.show');

        // Add a comment to a forum
        Route::post('/{forumId}/comment', [CommentController::class, 'store'])->name('comment.store');

        // Reply to a comment (if you need it as a separate route)
        Route::post('/{forumId}/comment/{commentId}/reply', [CommentController::class, 'store'])->name('reply.store');
    });
});
