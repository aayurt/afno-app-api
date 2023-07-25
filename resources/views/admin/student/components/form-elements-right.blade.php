@isset($student)
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('cover'),
    'media' => $student->getThumbs200ForCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('pdf'),
    'media' => $post->getThumbs200ForCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('gallery'),
    'media' => $student->getThumbs200ForCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@else
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('cover'),
    'label' => 'Cover'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('pdf'),
    'label' => 'PDF appendix'
    ])
</div>
<div class="card">
    @include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Student::class)->getMediaCollection('gallery'),
    'label' => 'Gallery'
    ])
</div>
@endisset