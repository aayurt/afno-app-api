@isset($lineage)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Lineage::class)->getMediaCollection('cover'),
    'media' => $lineage->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Lineage::class)->getMediaCollection('gallery'),
    'media' => $lineage->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Lineage::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>

<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Lineage::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset