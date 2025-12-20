<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\DashboardController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['cek_login:admin,staff,manager'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


});

Route::middleware(['cek_login:admin'])->prefix('dashboard/admin')->group(function () {

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
        Route::post('/users', [UserController::class, 'store'])->name('admin.users.store');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});



Route::middleware(['cek_login:admin'])->prefix('/dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('/banner')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('banner.update');
        Route::post('/delete/{id}', [BannerController::class, 'destroy'])->name('banner.destroy');
    });

    Route::prefix('/testimonial')->group(function () {
        Route::get('/', [TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/create', [TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('/store', [TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::post('/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
        Route::post('/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    });

    Route::group(['prefix' => '/youtube'], function () {
        Route::get('/', [YoutubeController::class, 'index'])->name('youtube.index');
        Route::get('/create', [YoutubeController::class, 'create'])->name('youtube.create');
        Route::post('/store', [YoutubeController::class, 'store'])->name('youtube.store');
        Route::get('/edit/{id}', [YoutubeController::class, 'edit'])->name('youtube.edit');
        Route::post('/update/{id}', [YoutubeController::class, 'update'])->name('youtube.update');
        Route::post('/delete/{id}', [YoutubeController::class, 'destroy'])->name('youtube.destroy');
    });


    Route::prefix('/pelatihan')->group(function () {
        Route::prefix('/bootcamp-2')->group(function () {
            Route::get('/', [BootcampDuaController::class, 'index'])->name('bootcamp2.index');
            Route::get('/create', [BootcampDuaController::class, 'create'])->name('bootcamp2.create');
            Route::post('/store', [BootcampDuaController::class, 'store'])->name('bootcamp2.store');
            Route::get('/edit/{id}', [BootcampDuaController::class, 'edit'])->name('bootcamp2.edit');
            Route::post('/update/{id}', [BootcampDuaController::class, 'update'])->name('bootcamp2.update');
            Route::post('/delete/{id}', [BootcampDuaController::class, 'destroy'])->name('bootcamp2.destroy');
        });

        Route::prefix('/bootcamp-3')->group(function () {
            Route::get('/', [BootcampTigaController::class, 'index'])->name('bootcamp3.index');
            Route::get('/create', [BootcampTigaController::class, 'create'])->name('bootcamp3.create');
            Route::post('/store', [BootcampTigaController::class, 'store'])->name('bootcamp3.store');
            Route::get('/edit/{id}', [BootcampTigaController::class, 'edit'])->name('bootcamp3.edit');
            Route::post('/update/{id}', [BootcampTigaController::class, 'update'])->name('bootcamp3.update');
            Route::post('/delete/{id}', [BootcampTigaController::class, 'destroy'])->name('bootcamp3.destroy');
        });

        Route::prefix('/online')->group(function () {
            Route::get('/', [BootcampOnlineController::class, 'index'])->name('bootonline.index');
            Route::get('/create', [BootcampOnlineController::class, 'create'])->name('bootonline.create');
            Route::post('/store', [BootcampOnlineController::class, 'store'])->name('bootonline.store');
            Route::get('/edit/{id}', [BootcampOnlineController::class, 'edit'])->name('bootonline.edit');
            Route::post('/update/{id}', [BootcampOnlineController::class, 'update'])->name('bootonline.update');
            Route::post('/delete/{id}', [BootcampOnlineController::class, 'destroy'])->name('bootonline.destroy');
        });

        Route::prefix('/ramadan')->group(function () {
            Route::get('/', [BootcampRamadanController::class, 'index'])->name('bootramadan.index');
            Route::get('/create', [BootcampRamadanController::class, 'create'])->name('bootramadan.create');
            Route::post('/store', [BootcampRamadanController::class, 'store'])->name('bootramadan.store');
            Route::get('/edit/{id}', [BootcampRamadanController::class, 'edit'])->name('bootramadan.edit');
            Route::post('/update/{id}', [BootcampRamadanController::class, 'update'])->name('bootramadan.update');
            Route::post('/delete/{id}', [BootcampRamadanController::class, 'destroy'])->name('bootramadan.destroy');
        });
    });

    Route::prefix('/unduh')->group(function () {
        Route::prefix('/category')->group(function () {
            Route::get('/', [UnduhCategoryController::class, 'index'])->name('category.index');
            Route::get('/create', [UnduhCategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [UnduhCategoryController::class, 'store'])->name('category.store');
            Route::get('/edit/{id}', [UnduhCategoryController::class, 'edit'])->name('category.edit');
            Route::post('/update/{id}', [UnduhCategoryController::class, 'update'])->name('category.update');
            Route::post('/delete/{id}', [UnduhCategoryController::class, 'destroy'])->name('category.destroy');
        });

        Route::prefix('/document')->group(function () {
            Route::get('/', [UnduhDokumenController::class, 'index'])->name('document.index');
            Route::get('/create', [UnduhDokumenController::class, 'create'])->name('document.create');
            Route::post('/store', [UnduhDokumenController::class, 'store'])->name('document.store');
            Route::get('/edit/{id}', [UnduhDokumenController::class, 'edit'])->name('document.edit');
            Route::post('/update/{id}', [UnduhDokumenController::class, 'update'])->name('document.update');
            Route::post('/delete/{id}', [UnduhDokumenController::class, 'destroy'])->name('document.destroy');
            Route::get('/dashboard/download-records', [UnduhDokumenController::class, 'downloadRecords'])->name('download.records');
        });
    });

    Route::prefix('/berita')->group(function () {
        Route::prefix('/tutorial')->group(function () {
            Route::get('/', [VideoTutorialController::class, 'index'])->name('tutorial.index');
            Route::get('/create', [VideoTutorialController::class, 'create'])->name('tutorial.create');
            Route::post('/store', [VideoTutorialController::class, 'store'])->name('tutorial.store');
            Route::get('/edit/{id}', [VideoTutorialController::class, 'edit'])->name('tutorial.edit');
            Route::post('/update/{id}', [VideoTutorialController::class, 'update'])->name('tutorial.update');
            Route::post('/delete/{id}', [VideoTutorialController::class, 'destroy'])->name('tutorial.destroy');
        });

        Route::prefix('/gallery')->group(function () {
            Route::get('/', [GalleryController::class, 'index'])->name('gallery.index');
            Route::get('/create', [GalleryController::class, 'create'])->name('gallery.create');
            Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
            Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('gallery.edit');
            Route::post('/update/{id}', [GalleryController::class, 'update'])->name('gallery.update');
            Route::post('/delete/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
        });

        Route::prefix('/faq')->group(function () {
            Route::get('/', [FaqController::class, 'index'])->name('faq.index');
            Route::get('/create', [FaqController::class, 'create'])->name('faq.create');
            Route::post('/store', [FaqController::class, 'store'])->name('faq.store');
            Route::get('/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
            Route::post('/update/{id}', [FaqController::class, 'update'])->name('faq.update');
            Route::post('/delete/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');
        });
    });

    Route::prefix('/narasumber')->group(function () {
        Route::get('/', [NarasumberController::class, 'index'])->name('narasumber.index');
        Route::get('/create', [NarasumberController::class, 'create'])->name('narasumber.create');
        Route::post('/store', [NarasumberController::class, 'store'])->name('narasumber.store');
        Route::get('/edit/{id}', [NarasumberController::class, 'edit'])->name('narasumber.edit');
        Route::post('/update/{id}', [NarasumberController::class, 'update'])->name('narasumber.update');
        Route::post('/delete/{id}', [NarasumberController::class, 'destroy'])->name('narasumber.destroy');
    });

    Route::prefix('/merch')->group(function () {
        Route::get('/', [MerchandiseController::class, 'index'])->name('merch.index');
        Route::get('/create', [MerchandiseController::class, 'create'])->name('merch.create');
        Route::post('/store', [MerchandiseController::class, 'store'])->name('merch.store');
        Route::get('/edit/{id}', [MerchandiseController::class, 'edit'])->name('merch.edit');
        Route::post('/update/{id}', [MerchandiseController::class, 'update'])->name('merch.update');
        Route::post('/delete/{id}', [MerchandiseController::class, 'destroy'])->name('merch.destroy');

        Route::prefix('/category')->group(function () {
            Route::get('/', [CategoryMerchandiseController::class, 'index'])->name('categorymerch.index');
            Route::get('/create', [CategoryMerchandiseController::class, 'create'])->name('categorymerch.create');
            Route::post('/store', [CategoryMerchandiseController::class, 'store'])->name('categorymerch.store');
            Route::get('/edit/{id}', [CategoryMerchandiseController::class, 'edit'])->name('categorymerch.edit');
            Route::post('/update/{id}', [CategoryMerchandiseController::class, 'update'])->name('categorymerch.update');
            Route::post('/delete/{id}', [CategoryMerchandiseController::class, 'destroy'])->name('categorymerch.destroy');
        });
    });

    //artikel
    Route::prefix('/post')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])->name('post.index');
        Route::get('/create', [ArtikelController::class, 'create'])->name('post.create');
        Route::post('/store', [ArtikelController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('post.edit');
        Route::put('/update/{id}', [ArtikelController::class, 'update'])->name('post.update');
        Route::delete('/delete/{id}', [ArtikelController::class, 'destroy'])->name('post.destroy');

        Route::prefix('/category')->group(function () {
            Route::get('/', [CategoryPostController::class, 'index'])->name('categorypost.index');
            Route::get('/create', [CategoryPostController::class, 'create'])->name('categorypost.create');
            Route::post('/store', [CategoryPostController::class, 'store'])->name('categorypost.store');
            Route::get('/edit/{id}', [CategoryPostController::class, 'edit'])->name('categorypost.edit');
            Route::put('/update/{id}', [CategoryPostController::class, 'update'])->name('categorypost.update');
            Route::delete('/delete/{id}', [CategoryPostController::class, 'destroy'])->name('categorypost.destroy');
        });

        Route::prefix('/tag')->group(function () {
            Route::get('/', [TagsPostController::class, 'index'])->name('tags.index');
            Route::get('/create', [TagsPostController::class, 'create'])->name('tags.create');
            Route::post('/store', [TagsPostController::class, 'store'])->name('tags.store');
            Route::get('/edit/{id}', [TagsPostController::class, 'edit'])->name('tags.edit');
            Route::put('/update/{id}', [TagsPostController::class, 'update'])->name('tags.update');
            Route::delete('/delete/{id}', [TagsPostController::class, 'destroy'])->name('tags.destroy');
        });
    });
    //

    Route::prefix('/training')->group(function () {
        Route::get('/', [TrainingController::class, 'index'])->name('training.index');
        Route::get('/create', [TrainingController::class, 'create'])->name('training.create');
        Route::post('/store', [TrainingController::class, 'store'])->name('training.store');
        Route::get('/edit/{id}', [TrainingController::class, 'edit'])->name('training.edit');
        Route::post('/update/{id}', [TrainingController::class, 'update'])->name('training.update');
        Route::post('/delete/{id}', [TrainingController::class, 'destroy'])->name('training.destroy');

        Route::prefix('/narasumber')->group(function () {
            Route::get('/', [PemateriController::class, 'index'])->name('training.narasumber.index');
            Route::get('/create', [PemateriController::class, 'create'])->name('training.narasumber.create');
            Route::post('/store', [PemateriController::class, 'store'])->name('training.narasumber.store');
            Route::get('/edit/{id}', [PemateriController::class, 'edit'])->name('training.narasumber.edit');
            Route::post('/update/{id}', [PemateriController::class, 'update'])->name('training.narasumber.update');
            Route::post('/delete/{id}', [PemateriController::class, 'destroy'])->name('training.narasumber.destroy');
        });

        Route::prefix('/webinar')->group(function () {
            Route::get('/', [WebinarController::class, 'index'])->name('training.webinar.index');
            Route::get('/create', [WebinarController::class, 'create'])->name('training.webinar.create');
            Route::post('/store', [WebinarController::class, 'store'])->name('training.webinar.store');
            Route::get('/edit/{id}', [WebinarController::class, 'edit'])->name('training.webinar.edit');
            Route::post('/update/{id}', [WebinarController::class, 'update'])->name('training.webinar.update');
            Route::post('/delete/{id}', [WebinarController::class, 'destroy'])->name('training.webinar.destroy');
        });

        Route::prefix('/member')->group(function () {
            Route::get('/', [MemberController::class, 'index'])->name('training.member.index');
            Route::get('export/', [MemberController::class, 'export'])->name('training.member.export');
        });
    });

    Route::get('/subscriber', [UserController::class, 'index'])->name('subscriber');


    Route::prefix('/kak')->group(function () {
        Route::prefix('/pelatihan')->group(function () {
            Route::get('/', [KakPelatihanController::class, 'index'])->name('kak.pelatihan.index');
            Route::get('/create', [KakPelatihanController::class, 'create'])->name('kak.pelatihan.create');
            Route::post('/store', [KakPelatihanController::class, 'store'])->name('kak.pelatihan.store');
            Route::get('/edit/{id}', [KakPelatihanController::class, 'edit'])->name('kak.pelatihan.edit');
            Route::put('/update/{id}', [KakPelatihanController::class, 'update'])->name('kak.pelatihan.update');
            Route::delete('/delete/{id}', [KakPelatihanController::class, 'destroy'])->name('kak.pelatihan.destroy');
        });
    });
});