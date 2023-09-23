@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.archive-subcategory.actions.edit', ['name' => $archiveSubcategory->title]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <archive-subcategory-form
                :action="'{{ $archiveSubcategory->resource_url }}'"
                :data="{{ $archiveSubcategory->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.archive-subcategory.actions.edit', ['name' => $archiveSubcategory->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.archive-subcategory.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </archive-subcategory-form>

        </div>
    
</div>

@endsection