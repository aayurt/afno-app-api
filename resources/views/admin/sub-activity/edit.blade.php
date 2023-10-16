@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.sub-activity.actions.edit', ['name' => $subActivity->title]))

@section('body')

    <div class="container-xl">

            <sub-activity-form
                :action="'{{ $subActivity->resource_url }}'"
                :data="{{ $subActivity->toJsonAllLocales() }}" 
:locales="{{ json_encode($locales) }}" 
            :send-empty-locales="true"   
v-cloak inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                <div class="row">
                <div class="col">
                <div class="card">

                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.sub-activity.actions.edit', ['name' => $subActivity->title]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.sub-activity.components.form-elements')
                    </div>
                    
                    </div>          
         
         </div>
         <div class="col-md-12 col-lg-12 col-xl-3 col-xxl-4">
                    @include('admin.sub-activity.components.form-elements-right')
                </div>   

                <button type="submit" class="btn btn-primary fixed-cta-button button-save" :disabled="submiting">
                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-save'"></i>
                {{ trans('brackets/admin-ui::admin.btn.save') }}
            </button>
            <button type="submit" style="display: none" class="btn btn-success fixed-cta-button button-saved" :disabled="submiting" :class="">
                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-check'"></i>
                <span>{{ trans('brackets/admin-ui::admin.btn.saved') }}</span>
            </button>
                    
                </form>

        </sub-activity-form>

    
</div>

@endsection