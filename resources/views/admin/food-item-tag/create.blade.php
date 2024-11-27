@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.food-item-tag.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <food-item-tag-form
            :action="'{{ url('admin/food-item-tags') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.food-item-tag.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.food-item-tag.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </food-item-tag-form>

        </div>

        </div>

    
@endsection