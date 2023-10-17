
@isset($restaurant)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Restaurant::class)->getMediaCollection('cover'),
    'media' => $restaurant->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Restaurant::class)->getMediaCollection('gallery'),
    'media' => $restaurant->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Restaurant::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Restaurant::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset